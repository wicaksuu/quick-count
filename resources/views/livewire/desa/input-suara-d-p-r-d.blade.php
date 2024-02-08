<div>
    <div class="flex items-center space-x-4">
        <select wire:model="set" wire:click="updateSelectPartai" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            @foreach ($setting as $settings)
                <option value="{{ $settings->nama }}">{{ $settings->nama }}</option>
            @endforeach
        </select>
        <select wire:model="SelectPartai" wire:click="updateSelectPartai" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            @foreach ($partai as $partais)
                <option value="{{ $partais->id }}">{{ $partais->nama }}</option>
            @endforeach
        </select>
        <select wire:model="SelectTPS" wire:click="updateSelectTPS" class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            @foreach ($tps as $tpss)
                <option value="{{ $tpss->id }}">{{ $tpss->nama }}</option>
            @endforeach
        </select>
        <x-button class="ml-auto" wire:click='export'>
            {{ __('Export') }}
        </x-button>
    </div>



    <div class="max-w-full pt-5 mx-auto">
        <table class="w-full bg-white border border-gray-300 rounded table-auto">
          <thead>
            <tr>
              <th class="items-center py-6 text-center border-b {{ $collor }}" colspan='4'>
                    <div class="text-extrabold">Input Suara {{ $set }}</div>
                    @isset($part->logo)
                        <img src="{{ asset('storage/' . $part->logo) }}" alt="null" class="h-20 pt-3 mx-auto rounded">
                        <div class="text-extrabold">{{ $part->nama }}</div>
                    @endisset
                    @isset($calons[0]->dapil->nama)
                        <p>{{ $calons[0]->dapil->nama }}</p>
                    @endisset
                    <p>{{ $dataTPS->nama }} ({{ $kecamatan->nama }},{{ $desa->nama }})</p>

              </th>
            </tr>
            <tr>
              <th class="py-2 border-b">No. Urut</th>
              <th class="py-2 border-b">Foto</th>
              <th class="px-4 py-2 border-b">Nama Calon</th>
              <th class="px-4 py-2 border-b">Suara</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($calons as $calon )
                <tr>
                    <td class="py-2 text-center border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 font-extrabold border-b">
                        @if ($calon->foto == null)
                            <img src="{{ asset('storage/' . $part->logo) }}" alt="null" class="h-10 mx-auto rounded">
                        @else
                            <img src="{{ asset('storage/' . $calon->foto) }}" alt="null" class="h-10 mx-auto rounded">
                        @endif
                    </td>
                    <td class="px-4 py-2 font-extrabold border-b">{{ $calon->nama }}</td>
                    <td class="items-center px-4 py-2 text-center border-b">
                        @livewire('desa.componen.input-cild', ['calon' => $calon], key($calon->id))
                    </td>
                 </tr>
            @endforeach
            <tr>
                <th class="py-2 border-b text-end" colspan="3">Total Perolehan Suara</th>
                <th class="items-center px-4 py-2 text-center border-b" >
                    <x-input type="number" disabled class="w-20" wire:model="TotalSuara"/>
                </th>
             </tr>
          </tbody>
        </table>
      </div>

</div>
