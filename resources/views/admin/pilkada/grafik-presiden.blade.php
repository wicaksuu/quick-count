<div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
    <div class="col-span-4">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="pb-0 card-body">
                <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Perolehan Suara Presiden</h6>
            </div>
            <div class="flex flex-wrap gap-3 card-body">
                <canvas id="GrafikPresiden"></canvas>
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="pb-0 card-body">
                <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Sebaran Suara Presiden</h6>
            </div>
            <div class="flex flex-wrap gap-3 card-body" style="height: 275px;">
                <canvas id="PiePresiden"></canvas>
                <div class="col-span-6 p-3">
                    <div class="mb-2 mt-sm-0">
                        <div>
                            <p class="mb-2 dark:text-zinc-100">
                                <i class="mdi mdi-circle align-middle text-10 mr-2 text-red-500 "></i>
                                <span id="Presiden1"></span>
                            </p>
                            <h6 class="text-gray-800 dark:text-gray-100 pl-6">
                                <div id="SuaraPresiden1"></div>
                            </h6>
                        </div>
                        <div class="mb-2 pt-2">
                            <p class="mb-2 dark:text-zinc-100">
                                <i class="mdi mdi-circle align-middle text-10 mr-2 text-blue-500 "></i>
                                <span id="Presiden2"></span>
                            </p>
                            <h6 class="text-gray-800 dark:text-gray-100  pl-6">
                                <span id="SuaraPresiden2"></span>
                            </h6>
                        </div>
                        <div class="mb-2 pt-2">
                            <p class="mb-2 dark:text-zinc-100">
                                <i class="mdi mdi-circle align-middle text-10 mr-2 text-green-500"></i>
                                <span id="Presiden3"></span>
                            </p>
                            <h6 class="text-gray-800 dark:text-gray-100  pl-6">
                                <span id="SuaraPresiden3"></span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewire('admin.grafik-presiden')
