<div>
    @if ($set == null)
        <div class="text-xl font-semibold">Silahkan Pilih</div>
        <div class="items-center grid-cols-1 text-center sm:grid md:grid-cols-4">
            <div
                class="mx-3 mt-6 flex flex-col self-start rounded-lg bg-gray-500 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <button wire:click="updateSelect('Presiden')"  class="m-2">
                    <img class="rounded-t-lg" src="{{ url('assets/images/presiden.png') }}"
                        alt="Hollywood Sign on The Hill" />
                    <div class="p-4">
                        <h5 class="mb-2 text-xl font-bold leading-tight text-white">
                            Presiden dan Wakil Presiden
                        </h5>
                        <p class="text-sm text-white">
                            Pemilu Presiden dan Wakil Presiden
                        </p>
                    </div>
                </button>
            </div>

            <div
                class="mx-3 mt-6 flex flex-col self-start rounded-lg bg-green-500 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <button wire:click="updateSelect('DPRD')"  class="m-2">
                    <img class="rounded-t-lg" src="{{ url('assets/images/presiden.png') }}"
                        alt="Hollywood Sign on The Hill" />
                    <div class="p-4">
                        <h5 class="mb-2 text-xl font-bold leading-tight text-white">
                            Calon Legeslatif Kabupaten
                        </h5>
                        <p class="text-sm text-white">
                            Pemilu DPRD
                        </p>
                    </div>
                </button>
            </div>

        </div>
    @else
        <div>

            <div class="flex items-center space-x-4">
                <div>
                     <x-label for="kehadiran" value="{{ __('Jumlah Kehadiran') }}" />
                    <x-input wire:loading.attr="disabled" type="number" id="kehadiran"
                    wire:model="kehadiran" wire:change="updateKehadiran()" class="w-30"/>
                </div>
                <div class="pt-7">
                    <button wire:click="updateSelect('Replace')" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Ganti
                    </button>
                </div>

            </div>

            <div class="max-w-full pt-5 mx-auto">

                <table class="w-full bg-white border border-gray-300 rounded table-auto">
                    <thead>
                        <tr>
                            <th class="items-center py-6 text-center border-b " colspan='4'>
                                <div class="text-extrabold">Input Suara {{ $set }}</div>

                                @if (isset($part->logo))
                                    <img src="{{ asset('storage/' . $part->logo) }}" alt="null"
                                        class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ asset('storage/' . $logo) }}" alt="null"
                                        class="h-20 mx-auto rounded">
                                @endif
                                @isset($calons[0]->dapil->nama)
                                    <p>{{ $calons[0]->dapil->nama }}</p>
                                @endisset
                                <p>{{ $dataTPS->nama }} ({{ $kecamatan->nama }},{{ $desa->nama }})</p>

                            </th>
                        </tr>
                        <tr class="{!! $collor !!} text-white">
                            <th class="py-2 border-b">No. Urut</th>
                            <th class="py-2 border-b">Foto</th>
                            <th class="px-4 py-2 border-b">Nama Calon</th>
                            <th class="px-4 py-2 border-b">Suara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calons as $calon)
                            @if ($calon->no == 0)
                                <tr class="bg-fuchsia-300">
                                    <td class="py-2 text-center border-b">-</td>
                                    <td class="py-2 font-extrabold border-b">
                                        @if ($calon->foto == null)
                                            <img src="{{ asset('storage/' . $part->logo) }}" alt="null"
                                                class="h-10 mx-auto rounded">
                                        @else
                                            <img src="{{ asset('storage/' . $calon->foto) }}" alt="null"
                                                class="h-10 mx-auto rounded">
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 font-extrabold border-b">{{ $calon->nama }}</td>
                                    <td class="items-center px-4 py-2 text-center border-b">
                                        @livewire('desa.componen.input-cild', ['calon' => $calon], key($calon->id))
                                    </td>
                                </tr>
                                <tr class="py-2">
                                    <td colspan="4" class="items-center text-center">
                                        <br>
                                        <hr>
                                        <br>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="py-2 text-center border-b">{{ $calon->no }}</td>
                                    <td class="py-2 font-extrabold border-b">
                                        @if ($calon->foto == null)
                                            <img src="{{ asset('storage/' . $part->logo) }}" alt="null"
                                                class="h-10 mx-auto rounded">
                                        @else
                                            <img src="{{ asset('storage/' . $calon->foto) }}" alt="null"
                                                class="h-10 mx-auto rounded">
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 font-extrabold border-b">{{ $calon->nama }}</td>
                                    <td class="items-center px-4 py-2 text-center border-b">
                                        @livewire('desa.componen.input-cild', ['calon' => $calon], key($calon->id))
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr class="bg-fuchsia-300">
                            <th class="py-2 border-b text-end " colspan="3">Total Perolehan Suara</th>
                            <th class="items-center px-4 py-2 text-center border-b">
                                <x-input wire:loading.attr="disabled" type="number" disabled class="w-20"
                                    wire:model="TotalSuara" />
                            </th>
                        </tr>
                    </tbody>
                </table>

                @if ($verifikasi == true)
                    <div class="items-center pt-10 pb-10 text-center">
                        <p class="p-5"><i class="text-yellow-400 text-semibold">Setelah data yang anda input telah
                                selesai dan benar silahkan menekan tombol di bawah ini, setelah melakukan verifikasi
                                data maka data tidak akan bisa dirubah</i></p>
                        <x-danger-button wire:click="OpenModal()" wire:loading.attr="disabled">
                            {{ __('Verifikasi Data') }}
                        </x-danger-button>
                    </div>

                    <x-dialog-modal wire:model.live="ModalIsOpen">
                        <x-slot name="title">
                            {{ __('Verifikasi Data') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __('Apakah anda yakin akan melakukan verifikasi data ?, sebelum melanjutkan mohon cek kembali data yang telah anda input. ketika data telah di validasi anda tidak akan dapat melakukan perubahan data !.') }}
                        </x-slot>

                        <x-slot name="footer">
                            <x-secondary-button wire:click="CloseModal()" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ms-3" wire:click="Verifikasi()" wire:loading.attr="disabled">
                                {{ __('Verifikasi Data') }}
                            </x-danger-button>
                        </x-slot>
                    </x-dialog-modal>
                @endif
            </div>


        </div>
    @endif

</div>
