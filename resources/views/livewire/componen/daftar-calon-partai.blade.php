<div>
    <div class="grid grid-cols-1 ">
        <div class="grid items-stretch grid-cols-12 mb-4">
            <div class="self-center col-span-12 lg:col-span-6">
                <h5 class="text-gray-600 text-15 dark:text-gray-100">Jumlah Calon <span class="ml-2 font-normal text-gray-500 dark:text-zinc-100">({{ count($data) }})</span></h5>
            </div>
            <div class="col-span-12 lg:col-span-6">
                 <div class="flex flex-wrap items-center gap-2 mt-5 lg:mt-0 lg:justify-end">
                    <div>
                        <select wire:model="selectedYear" wire:click='updateSelectedYear' class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                            <option value="">Pilih Tahun</option>
                            @foreach ($tahuns as $tahun)
                                <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($type == 'DPRD')

                        <div>
                            <select wire:model="pilihdapil" wire:click='updateDapil' class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                <option value="">Pilih Dapil</option>
                                @foreach ($dapils as $dapilx)
                                    @if (isset($dapilx->dapil->id))
                                        <option value="{{ $dapilx->dapil->id }}">{{ $dapilx->dapil->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    @endif
                    <div>
                        <button wire:click="openModal()" wire:loading.attr="disabled"
                            class="btn bg-gray-50 border-gray-50 dark:bg-zinc-600/50 dark:border-zinc-600 dark:text-gray-100"><i
                                class="bx bx-plus me-1"></i>
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
            @foreach ($data as $dat )
                    <div class="col-span-12 md:col-span-6 xl:col-span-3">
                        <div class="mb-0 card dark:bg-zinc-800 dark:border-zinc-600">
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <div class="relative dropstart text-start">
                                        <span class="badge font-medium bg-blue-500 text-white text-11 px-1.5 py-[1.5px] rounded">{{ $dat->no }}</span>
                                    </div>
                                    <div class="relative dropstart text-end">
                                        <span class="inline-block font-medium @if($dat->is_active == true) bg-green-500 @else bg-red-500 @endif text-white text-11 px-1.5 py-0.5 rounded ltr:ml-0 rtl:ml-2">@if($dat->is_active) <i class="align-middle bx bx-check-double text-16 "></i> @else <i class="align-middle bx bx-block text-16"></i> @endif</span>
                                        <span class="badge font-medium bg-violet-500 text-white text-11 px-1.5 py-[1.5px] rounded">{{ $dat->tahun }}</span>
                                        @php
                                        $suara = App\Models\Calon::where('key', $dat->key)->sum('suara');
                                        @endphp
                                        <span class="badge font-medium @if($suara>0) bg-green-500 @else bg-red-500 @endif text-white text-11 px-1.5 py-[1.5px] rounded-full">{{ $suara }}</span>

                                    </div>
                                </div>
                                <div class="mb-4">
                                    @if ($dat->foto == null)
                                        <img src="{{ asset('storage/' . $partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                    @else
                                        <img src="{{ asset('storage/' . $dat->foto) }}" alt="null" class="h-20 mx-auto rounded">
                                    @endif
                                </div>

                                <div class="text-center">
                                    <h5 class="mb-1 text-gray-700 text-16"><p  class="dark:text-gray-100">{{ $dat->nama }}</p></h5>
                                    @if ($type == 'DPRD')
                                        <p class="mb-2 text-gray-500 dark:text-zinc-100">
                                            @if (isset($dat->dapil->nama))
                                                {{ $dat->dapil->nama }}
                                            @else
                                                {{ 'Dapil Telah Dirubah' }}
                                            @endif
                                        </p>
                                        @foreach ($dat->kecamatans as $kecamatan)
                                            <div class="text-11 bg-violet-50/50 hover:bg-violet-50 cursor-pointer transition-all duration-300 inline-block text-violet-500 px-1 py-[1px] rounded font-medium dark:bg-violet-500/20 dark:text-violet-300">
                                                {{ $kecamatan->nama }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="inline-flex w-full rounded-md" role="group">
                                <button type="button" wire:click="openModal('{{ $dat->key }}')"  wire:loading.attr="disabled" class="w-full px-4 py-2 text-sm border rounded rounded-r-none btn border-gray-50 hover:bg-green-200 dark:border-zinc-600 dark:hover:bg-green-600 dark:text-gray-100">
                                    <i class="block text-sm text-green-600 mdi mdi-pencil">
                                    </i>
                                </button>
                                <button type="button" wire:click="openDell('{{ $dat->key }}')" class="w-full px-4 py-2 text-sm border border-l-0 rounded rounded-l-none btn border-gray-50 hover:bg-red-200 dark:border-zinc-600 dark:hover:bg-red-600 dark:text-gray-100">
                                    <i class="block text-sm text-red-600 mdi mdi-trash-can">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>

            @endforeach

        </div>
    </div>


    <x-dialog-modal wire:model.live="isOpen">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <div class="space-y-4">
                    @error('foto')@php Toaster::error($message); $foto = null; @endphp @enderror

                    <div class="pt-5">
                        <div class="inline-flex items-center space-x-4">
                            @if ($foto)
                                <img class="w-auto h-20 rounded rtl:ml-3" src="{{ $foto->temporaryUrl() }}" alt="">
                            @endif
                            @if ($tmp)
                                <img class="w-auto h-20 rounded rtl:ml-3" src="{{ asset('storage/' . $tmp) }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="file" wire:model="foto" class="w-full" wire:loading.attr="disabled">
                        </div>

                        <label for="tps"
                            class="block pt-5 mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                            Nama Calon
                        </label>
                        <input type="text" wire:model="nama"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="Nama Calon" required>
                    </div>
                    <div>
                        <div class="flex">
                            <div class="p-1">
                                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                    Status
                                </label>
                                <input wire:model='status' type="checkbox" id="square-switch3" switch="bool">
                                <label for="square-switch3" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            <div class="w-full pl-4">
                                <label for="no"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                                    Nomor Urut
                                </label>
                                <input type="number" wire:model="no"
                                    class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                                    placeholder="Nomor Urut" required>
                            </div>
                            <div class="w-full pl-4">
                                <label for="tahun"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                                    Tahun Pemilu
                                </label>
                                <input type="text" wire:model="tahun"
                                    class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                                    placeholder="Tahun Pemilu" required>
                            </div>
                        </div>
                    </div>
                    @if ($type == 'DPRD')

                        <div>
                            <label for="kursi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                                Pilih Dapil
                            </label>
                            @if ($dapil)
                                <div class="pb-2">
                                    <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <span
                                                    class="inline-block font-medium bg-green-500 text-white text-11 px-1.5 py-0.5  rounded">
                                                    {{ $dapil['nama'] }}
                                                    <button wire:click="hapusdapil()">
                                                        <i class="align-middle mdi mdi-close"></i>
                                                    </button>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            @endif
                            <input type="text" wire:model.lazy="query" wire:keydown="refresh()"
                                class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                                placeholder="Ketik Dapil">
                        </div>

                        <div class="mt-1 position-absolute w-100">
                            @if (!empty($query))
                                @if (isset($results->id))
                                    <div wire:click="selectResult('{{ $results->id }}')" class="p-2 text-sm cursor-pointer">
                                        {{ $results->nama }} </div>
                                @endif
                            @endif

                        </div>

                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="closeModal()" wire:loading.attr="disabled"
                class="text-white bg-yellow-500 border-yellow-500 rounded-full btn hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600">
                Cancel
            </button>
            <button type="button" wire:click="save" wire:loading.attr="disabled"
                class="text-white bg-green-500 border-green-500 rounded-full ms-3 btn hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600">
                {{ $button }}
            </button>
        </x-slot>
    </x-dialog-modal>


<!-- Delete calon -->
<x-dialog-modal wire:model.live="isDell">
    <x-slot name="title">
        {{ __('Delete Calon') }}
    </x-slot>

    <x-slot name="content">
        {{ 'Apakah anda yakin akan menghapus calon '. $nama .' ? data yang telah di hapus akan hilang secara
        permanen.'}}

    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3" wire:click="Hapus()" wire:loading.attr="disabled">
            {{ __('Delete Calon') }}
        </x-danger-button>
    </x-slot>
</x-dialog-modal>
</div>
