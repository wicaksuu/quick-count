<div>
    <div class="grid grid-cols-1 ">
        <div class="grid items-stretch grid-cols-12">
            <div class="self-center col-span-12 lg:col-span-6">
            </div>
            <div class="col-span-12 lg:col-span-6">
                @livewire('admin.pileg.select-dapil-kec-desa',['type'=>$data,'key'=>$type])
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="flex flex-wrap items-center mb-2">
            <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Simulasi Grafik {{ $data }}</h6>
        </div>
        <div style="height: 50vh; max-height: 50vh; overflow: hidden;">
            <canvas id="GrafikOverView" style="width: 100%; height: 100%;"></canvas>
        </div>
    </div>


    <div class="relative mt-5 overflow-x-auto">
        <table class="w-full">
            <thead class="border-b cursor-pointer border-gray-50 dark:border-zinc-600">
                <tr class="text-gray-700 dark:text-gray-100">
                    @if ($type == 'Pileg')
                        @if ($key == 'dprd')
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Dapil
                        </th>
                        @endif
                        <th class="relative p-4 text-start dark:text-gray-100">
                            Partai
                        </th>
                    @endif
                    <th class="relative p-4 text-start dark:text-gray-100">
                        Nama
                    </th>
                    <th class="relative p-4 text-start dark:text-gray-100">
                        Suara
                    </th>
                </tr>
            </thead>
            <tbody id="ViewColonSuara">
            </tbody>
        </table>
    </div>
    @livewire('admin.pileg.view-tabel-pileg',['type'=>$data,'key'=>$type])
</div>
