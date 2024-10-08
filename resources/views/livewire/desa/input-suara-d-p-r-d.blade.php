<div>
    <div class="flex flex-col gap-2 md:flex-row md:items-start md:space-x-4">
        <select wire:model="set" wire:click="updateSelectPartai" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            
            <option value="{{ route('dashboard') }}">Pilih</option>
            @foreach ($setting as $settings)
                <option value="{{ $settings->nama }}">{{ $settings->nama }}</option>
            @endforeach
        </select>
        @if ($pemilu == 'Pileg')
            <select wire:model="SelectPartai" wire:click="updateSelectPartai" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                <option value="{{ route('dashboard') }}">Pilih</option>
            
                @foreach ($partai as $partais)
                    <option value="{{ $partais->id }}">{{ $partais->nama }}</option>
                @endforeach
            </select>
        @endif
        <select wire:model="SelectTPS" wire:click="updateSelectTPS" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            
            <option value="{{ route('dashboard') }}">Pilih</option>
            @foreach ($tps as $tpss)
                <option value="{{ $tpss->id }}">{{ $tpss->nama }}</option>
            @endforeach
        </select>
                <!-- Settings Dropdown -->
                <div class="relative ms-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-button class="ml-auto" class="mt-1">
                                {{ __('Export') }}
                            </x-button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Pilih Menu') }}
                            </div>

                            <x-dropdown-link target="__blank" href="{{ route('export',['type'=>$set,'tps_dapil'=>$SelectTPS.'-'.$SelectPartai,'opsi'=>'view-kosong']) }}">
                                {{ __('Tampilkan Tanpa Suara') }}
                            </x-dropdown-link>
                            <x-dropdown-link target="__blank" href="{{ route('export',['type'=>$set,'tps_dapil'=>$SelectTPS.'-'.$SelectPartai,'opsi'=>'view-isi']) }}">
                                {{ __('Tampilkan Dengan Suara') }}
                            </x-dropdown-link>
                            <div class="border-t border-gray-200"></div>
                            <x-dropdown-link href="{{ route('export',['type'=>$set,'tps_dapil'=>$SelectTPS.'-'.$SelectPartai,'opsi'=>'download-kosong']) }}">
                                {{ __('Download Tanpa Suara') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('export',['type'=>$set,'tps_dapil'=>$SelectTPS.'-'.$SelectPartai,'opsi'=>'download-isi']) }}">
                                {{ __('Download Dengan Suara') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
    </div>



    <div class="max-w-full pt-5 mx-auto">
        <table class="w-full bg-white border border-gray-300 rounded table-auto">
          <thead>
            <tr>
              <th class="items-center py-6 text-center border-b " colspan='4'>
                    <div class="text-extrabold">Input Suara {{ $set }}</div>

                    @if (isset($part->logo))
                        @if($part->logo)
                            <img src="{{ asset('storage/' . $part->logo) }}" alt="null" class="h-20 mx-auto rounded">
                        @endif
                    @else
                        @if ($logo!='indonesia.svg')
                            <img src="{{ asset('storage/' . $logo) }}" alt="null" class="h-20 mx-auto rounded">
                        @else
                            <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                        @endif
                    @endif
                    @isset($calons[0]->dapil->nama)
                        <p>{{ $calons[0]->dapil->nama }}</p>
                    @endisset
                    <p>{{ $dataTPS->nama }} ({{ $kecamatan->nama }},{{ $desa->nama }})</p>

              </th>
            </tr>
            <tr class="text-white {!! $collor !!}">
              <th class="py-2 border-b">No. Urut</th>
              <th class="py-2 border-b">Foto</th>
              <th class="px-4 py-2 border-b">Nama Calon</th>
              <th class="px-4 py-2 border-b">Suara</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($calons as $calon )
                @if ($calon->no==0)
                    <tr class="bg-fuchsia-300">
                        <td class="py-2 text-center border-b">-</td>
                        <td class="py-2 font-extrabold border-b">
                            @if ($calon->foto == null)
                            @if (isset($part->logo))
                                @if ($part->logo)
                                    <img src="{{ asset('storage/' . $part->logo) }}" alt="null" class="h-10 mx-auto rounded">
                                @endif
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $calon->foto) }}" alt="null" class="h-10 mx-auto rounded">
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
                            @if (isset($part->logo))
                                @if($part->logo)
                                    <img src="{{ asset('storage/' . $part->logo) }}" alt="null" class="h-10 mx-auto rounded">
                                @endif
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $calon->foto) }}" alt="null" class="h-10 mx-auto rounded">
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
                <th class="items-center px-4 py-2 text-center border-b" >
                    <x-input wire:loading.attr="disabled" type="number" disabled class="w-20" wire:model="TotalSuara"/>
                </th>
             </tr>
          </tbody>
        </table>

        @if ($verifikasi == true)
            <div class="items-center pt-10 pb-10 text-center">
                <p class="p-5"><i class="text-yellow-400 text-semibold">Setelah data yang anda input telah selesai dan benar silahkan menekan tombol di bawah ini, setelah melakukan verifikasi data maka data tidak akan bisa dirubah</i></p>
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
