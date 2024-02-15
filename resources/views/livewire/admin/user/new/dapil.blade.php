<div>
    <div class="flex flex-col gap-2 md:flex-row md:items-start md:space-x-4">

        <select wire:model="SelectPartai" wire:click="updateSelectPartai"
            class="dark:bg-zinc-800 dark:border-zinc-700 rounded border-gray-300 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
            
            <option value="">Pilih Partai</option>
            @foreach ($partai as $partais)
                <option value="{{ $partais->id }}">{{ $partais->nama }}</option>
            @endforeach
        </select>
        <div>
            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">{{ $update }}</p>

            
        </div>
    </div>
    <hr>
    <table class="table w-full">
        <tbody>
            @foreach ($suara as $calon)
                <tr>
                    <td class="p-3">
                        #{{ $loop->iteration }}
                    </td>
                    <td class="p-3">
                        <div>
                            @if ($calon['calon']->foto == null)
                                <img src="{{ asset('storage/' . $calon['calon']->partai->logo) }}" alt="null"
                                    class="h-10 mx-auto rounded">
                            @else
                                <img src="{{ asset('storage/' . $calon['calon']->foto) }}" alt="null"
                                    class="h-10 mx-auto rounded">
                            @endif

                        </div>
                    </td>

                    <td class="p-3">
                        <div>
                            <h5 class="mb-1 text-sm text-gray-700 dark:text-gray-100">({{ $calon['calon']->no }})
                                {{ $calon['calon']->nama }}</h5>
                            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">{{ $calon['calon']->partai->nama }}
                            </p>
                        </div>
                    </td>

                    <td class="p-3">
                        <div class="text-end">
                            <h5 class="mb-0 text-sm text-gray-700 dark:text-gray-100">
                                {{ $calon['total_suara'] }}/{{ $calon['jumlah_suara'] }} Suara</h5>
                            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">Perolehan Suara</p>
                        </div>
                    </td>

                    <td class="p-3">
                        <div class="text-end">
                            <h5 class="mb-0 text-sm text-gray-500 dark:text-zinc-100">{{ $calon['persentase_suara'] }}%
                            </h5>
                            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">Persentase</p>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div wire:poll='loadDprd'>
    </div>
</div>
