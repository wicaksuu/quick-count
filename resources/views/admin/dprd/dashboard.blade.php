<div>
    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-3">
        @foreach ($dapils as $dapil)
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="nav-tabs border-b-tabs">
                <div class="flex pb-2 border-b card-body border-gray-50 dark:border-zinc-700">
                    <h5 class="flex-grow mr-2 text-gray-800 text-15 dark:text-gray-100">DPRD {{ $dapil->nama }}</h5>
                    <div class="flex-shrink-0">
                        <h5 class="flex-grow mr-2 text-gray-800 text-15 dark:text-gray-100">{{ $dapil->kursi }} Kursi</h5>
                    </div>
                </div>
                <div class="px-0 card-body">
                    <div class="tab-content">
                        <div class="block tab-pane" id="all-tab1" role="tabpanel">
                            <div class="px-3" data-simplebar style="max-height: 352px;">
                                @livewire('admin.dprd-tabel-dapil',['dapil'=>$dapil])
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
