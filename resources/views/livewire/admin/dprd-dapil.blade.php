<div>
    @if (count($suaras)>0)
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($suaras as $suara)
                <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                    <div class="nav-tabs border-b-tabs">
                        <div class="flex pb-2 border-b card-body border-gray-50 dark:border-zinc-700">
                            <h5 class="flex-grow mr-2 text-gray-800 text-15 dark:text-gray-100">DPRD {{ $suara['dapil']->nama }}</h5>
                            <div class="flex-shrink-0">
                                <h5 class="flex-grow mr-2 text-gray-800 text-15 dark:text-gray-100">{{ $suara['dapil']->kursi }} Kursi</h5>
                            </div>
                        </div>
                        <div class="px-0 card-body">
                            <div class="tab-content">
                                <div class="block tab-pane" id="all-tab1" role="tabpanel">
                                    <div class="px-3" data-simplebar style="max-height: 352px;">
                                        <table class="table w-full">
                                            <tbody>
                                                @foreach ($suara['calon'] as $calon)
                                                    <tr>
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
                                                                <h5 class="mb-0 text-sm text-gray-700 dark:text-gray-100">{{ $calon['total_suara'] }} Suara</h5>
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
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div wire:poll='load'>
    </div>
</div>
