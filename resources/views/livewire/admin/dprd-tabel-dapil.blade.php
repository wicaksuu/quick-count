<div>
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
                                <img src="{{ asset('storage/' . $calon['calon']->partai->logo) }}" alt="null" class="h-10 mx-auto rounded">
                            @else
                                <img src="{{ asset('storage/' . $calon['calon']->foto) }}" alt="null" class="h-10 mx-auto rounded">
                            @endif

                        </div>
                    </td>

                    <td class="p-3">
                        <div>
                            <h5 class="mb-1 text-sm text-gray-700 dark:text-gray-100">({{ $calon['calon']->no }}) {{ $calon['calon']->nama }}</h5>
                            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">{{ $calon['calon']->partai->nama }}</p>
                        </div>
                    </td>

                    <td class="p-3">
                        <div class="text-end">
                            <h5 class="mb-0 text-sm text-gray-700 dark:text-gray-100">{{ $calon['total_suara'] }}/{{ $calon['jumlah_suara'] }} Suara</h5>
                            <p class="mb-0 text-xs text-gray-600 dark:text-zinc-100">Perolehan Suara</p>
                        </div>
                    </td>

                    <td class="p-3">
                        <div class="text-end">
                            <h5 class="mb-0 text-sm text-gray-500 dark:text-zinc-100">{{ $calon['persentase_suara'] }}%</h5>
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
