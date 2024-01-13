<div>
    <div class="card-body">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-6">
                <div class="mb-4">
                    <div class="square-switch">
                        <div class="flex">
                            <div class="p-1">
                                <label
                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                    DPRD
                                </label>
                                <input type="checkbox" id="square-switch3" switch="bool" checked>
                                <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                            <div class="p-1">
                                <label
                                    class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                    Presiden
                                </label>
                                <input type="checkbox" id="square-switch3" switch="bool" checked>
                                <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="mb-4">
                    <label for="example-text-input"
                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                        Tambah Tahun
                    </label>
                        <input
                        class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100"
                        type="number"
                        wire:model="tahun"
                        wire:keydown.enter="addTahun"
                        placeholder="Tahun"
                    >
                </div>
                <div class="mb-4">
                    <label for="example-text-input"
                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                        Daftar Tahun
                    </label>
                    <div class="flex">
                        @foreach ($data as $tahun)
                            @if ($tahun->key == 'tahun')

                                <div class="space-x-2 p-1">
                                    <span class="inline-block font-medium rounded bg-violet-500 text-white text-xs px-2 py-1">
                                        {{ $tahun->nama }}
                                        <button wire:click="hapusTahun({{ $tahun->id }})">
                                            <i class="mdi mdi-close align-middle text-13"></i>
                                        </button>
                                    </span>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
