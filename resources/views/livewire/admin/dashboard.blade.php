<div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">
        @isset($presiden['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $presiden['calon']->no }}) {{ $presiden['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $presiden['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($presiden['calon']->foto == null)
                                <img src="{{ asset('storage/' . $presiden['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                            @else
                                <img src="{{ asset('storage/' . $presiden['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-gray-50/60 text-gray-500 rounded font-medium dark:bg-gray-500/30">Presiden</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset
        @isset($dpr_ri['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $dpr_ri['calon']->no }}) {{ $dpr_ri['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $dpr_ri['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($dpr_ri['calon']->foto == null)
                                @if (isset($dpr_ri['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $dpr_ri['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $dpr_ri['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-yellow-50/60 text-yellow-500 rounded font-medium dark:bg-yellow-500/30">DPR RI</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset
        @isset($dpd_ri['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $dpd_ri['calon']->no }}) {{ $dpd_ri['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $dpd_ri['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($dpd_ri['calon']->foto == null)
                                @if (isset($dpd_ri['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $dpd_ri['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $dpd_ri['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-red-50/60 text-red-500 rounded font-medium dark:bg-red-500/30">DPD RI</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset
        @isset($dprd_provinsi['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $dprd_provinsi['calon']->no }}) {{ $dprd_provinsi['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $dprd_provinsi['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($dprd_provinsi['calon']->foto == null)
                                @if (isset($dprd_provinsi['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $dprd_provinsi['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $dprd_provinsi['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-blue-50/60 text-blue-500 rounded font-medium dark:bg-blue-500/30">DPRD Provinsi</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset
        @isset($dprd['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $dprd['calon']->no }}) {{ $dprd['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $dprd['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($dprd['calon']->foto == null)
                                @if (isset($dprd['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $dprd['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $dprd['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">DPRD Kabupaten/Kota</span>
                    @if (isset($dprd['calon']->dapil->nama))
                        <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">{{ $dprd['calon']->dapil->nama }}</span>
                    @else
                        <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                    @endif
                </div>
            </div>
        </div>
        @endisset
        @isset($gubernur['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $gubernur['calon']->no }}) {{ $gubernur['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $gubernur['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($gubernur['calon']->foto == null)
                                @if (isset($gubernur['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $gubernur['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $gubernur['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">Gubernur</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset
        @isset($bupati['calon'])
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="card-body">
                <div>
                    <div class="grid items-center grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <span class="text-gray-700 dark:text-zinc-100">({{ $bupati['calon']->no }}) {{ $bupati['calon']->nama }}</span>
                            <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                <span class="counter-value" data-target="865.2">{{ $bupati['total_suara'] }}</span>
                                Suara
                            </h4>
                        </div>
                        <div class="col-span-6">
                            @if ($bupati['calon']->foto == null)
                                @if (isset($bupati['calon']->partai->logo))
                                    <img src="{{ asset('storage/' . $bupati['calon']->partai->logo) }}" alt="null" class="h-20 mx-auto rounded">
                                @else
                                    <img src="{{ url('assets/images/indonesian.webp') }}" alt="null" class="h-20 mx-auto rounded">
                                @endif
                            @else
                                <img src="{{ asset('storage/' . $bupati['calon']->foto) }}" alt="null" class="h-20 mx-auto rounded">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center pt-2">
                    <span class="text-xs py-[1px] px-1 bg-green-50/60 text-green-500 rounded font-medium dark:bg-green-500/30">Bupati</span>
                    <span class="ltr:ml-1.5 rtl:mr-1.5 text-gray-700 text-13 dark:text-zinc-100">Kabupaten Madiun</span>
                </div>
            </div>
        </div>
        @endisset

    </div>
    <div wire:poll='load'>
    </div>
</div>
