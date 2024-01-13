<div>
    <div class="grid grid-cols-1 ">
        <div class="grid items-stretch grid-cols-12">
            <div class="self-center col-span-12 lg:col-span-6">
                <h5 class="text-gray-600 text-15 dark:text-gray-100">
                    List Dapil
                    <span class="ml-2 font-normal text-gray-500 dark:text-zinc-100">({{ count($data) }})</span>
                </h5>
                <h5 class="text-gray-600 text-15 dark:text-gray-100">
                    Jumlah Kursi
                    <span class="ml-2 font-normal text-gray-500 dark:text-zinc-100">({{ $totalKursi }})</span>
                </h5>
            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="flex flex-wrap items-center gap-2 mt-5 lg:mt-0 lg:justify-end">
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

        <div class="relative mt-5 overflow-x-auto">
            <table class="w-full">
                <thead class="border-b cursor-pointer border-gray-50 dark:border-zinc-600">
                    <tr class="text-gray-700 dark:text-gray-100">
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Nama Dapil
                        </th>
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Jumlah Kursi
                        </th>
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Kota/Kab
                        </th>
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Kecamatan
                        </th>
                        <th class="relative p-4 w-28 text-start dark:text-gray-100">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datas)
                        <tr class="text-gray-600 border-b border-gray-50 dark:border-zinc-600">
                            <td class="inline-flex items-center p-4">
                                {{ $datas->nama }}
                            </td>
                            <td class="p-4 dark:text-zinc-50">{{ $datas->kursi }} Kursi</td>
                            <td class="p-4 dark:text-zinc-50">{{ $datas->kota->nama }}</td>
                            <td class="flex flex-wrap gap-1 p-4">
                                @foreach ($datas->kecamatans as $keca)
                                    <div
                                        class="text-11 bg-violet-50/50 hover:bg-violet-50 cursor-pointer transition-all duration-300 inline-block text-violet-500 px-1 py-[1px] rounded font-medium dark:bg-violet-500/20 dark:text-violet-300">
                                        {{ $keca->nama }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex">
                                    <div class="m-1">
                                        <button wire:click="openModal({{ $datas->id }})" wire:loading.attr="disabled"
                                            type="button" class="px-3 text-white bg-green-600 border-0 btn">
                                            <i class="block text-sm mdi mdi-pencil">
                                            </i>
                                        </button>
                                    </div>
                                    <div class="m-1">
                                        <button wire:click="openDell({{ $datas->id }})" wire:loading.attr="disabled"
                                            type="button" class="px-3 text-white bg-red-400 border-0 btn">
                                            <i class="block text-sm mdi mdi-trash-can">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <x-dialog-modal wire:model.live="isOpen">
        <x-slot name="title">
            {{ $title }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <div class="space-y-4">
                    <div>
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                            Nama Dapil
                        </label>
                        <input type="text" wire:model="nama"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="Dapil 1" required>
                    </div>
                    <div>
                        <label for="kursi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                            Jumlah Kursi
                        </label>
                        <input type="number" wire:model="kursi"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="1-100" required>
                    </div>
                    <div>
                        <label for="kursi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100 ltr:text-left rtl:text-right">
                            Kecamatan ({{ count($kecamatan) }})
                        </label>
                        @if (count($kecamatan) > 0)

                            <div class="pb-2">

                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($kecamatan as $kec)
                                        <div>
                                            <span
                                                class="inline-block font-medium bg-green-500 text-white text-11 px-1.5 py-0.5  rounded">
                                                {{ $kec['kota'] }} | {{ $kec['nama'] }}
                                                <button wire:click="hapusKec({{ $kec['id'] }})">
                                                    <i class="align-middle mdi mdi-close"></i>
                                                </button>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <input type="text" wire:model.lazy="query" wire:keydown="refresh()"
                            class="bg-gray-800/5 border border-gray-100 text-gray-900 dark:text-gray-100 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder-gray-400 dark:placeholder:text-zinc-100/60 dark:text-"
                            placeholder="Ketik Kecamatan">
                    </div>
                    <div class="mt-1 position-absolute w-100">
                        @if (!empty($query))
                            @if (isset($results->id))
                                <div wire:click="selectResult({{ $results->id }})" class="p-2 text-sm cursor-pointer">
                                    {{ $results->kota->nama }} | {{ $results->nama }} </div>
                            @endif
                        @endif

                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button type="button" wire:click="closeModal()" wire:loading.attr="disabled"
                class="text-white bg-yellow-500 border-yellow-500 rounded-full btn hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600">
                Cancel
            </button>
            <button type="button" wire:click="tambahDapil" wire:loading.attr="disabled"
                class="text-white bg-green-500 border-green-500 rounded-full ms-3 btn hover:bg-green-600 hover:border-green-600 focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-500/30 active:bg-green-600 active:border-green-600">
                {{ $button }}
            </button>
        </x-slot>
    </x-dialog-modal>

    <!-- Delete dapil -->
    <x-dialog-modal wire:model.live="isDell">
        <x-slot name="title">
            {{ __('Delete Dapil') }}
        </x-slot>

        <x-slot name="content">
            {{ 'Apakah anda yakin akan menghapus dapil ' .
                $nama .
                ' ? data yang telah di hapus akan hilang secara
                    permanen.' }}

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="deleteDapil()" wire:loading.attr="disabled">
                {{ __('Delete Dapil') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>
