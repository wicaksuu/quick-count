<div>
    <div class="flex flex-wrap items-center gap-2 mt-5 lg:mt-0 lg:justify-end">
        @if ($this->key=='Pileg')
            <div>
                <select wire:model="pilihDapil" wire:click='GetDataDapil'
                    class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                    <option value="">Pilih Dapil</option>
                        @foreach ($dapils as $dapil)
                            <option value="{{ $dapil->id }}">{{ $dapil->nama }}</option>
                        @endforeach
                </select>
            </div>
        @endif
        <div>
            <select  wire:model="pilihKecamatan" wire:click='GetDataKecamatan'
                class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                    @endforeach
            </select>
        </div>
        <div>
            <select wire:model="pilihDesa" wire:click='GetDataDesa'
                class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                <option value="">Pilih Desa</option>
                    @foreach ($desas as $desa)
                        <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                    @endforeach
            </select>
        </div>
        <div>
            <select wire:model="pilihtps" wire:click='GetDataDesa'
                class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                <option value="">Pilih Desa</option>
                    @foreach ($tpss as $tps)
                        <option value="{{ $tps->id }}">{{ $tps->nama }}</option>
                    @endforeach
            </select>
        </div>
    </div>
</div>
