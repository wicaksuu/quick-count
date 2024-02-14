<div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
    <div class="col-span-12 xl:col-span-4">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
            <div class="card-body">
                <div class="flex flex-wrap items-center mb-2">
                    <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Sebaran Suara Presiden</h6>
                </div>
                <div class="grid grid-cols-12 gap-5 justify-items-end">
                    <div class="col-span-6 justify-self-start">
                        <canvas id="PiePresiden"></canvas>
                    </div>
                    <div class="col-span-6">
                        <div class="mt-4 mt-sm-0">
                            <div>
                                <p class="mb-2 dark:text-zinc-100">
                                    <i class="mr-2 text-green-500 align-middle mdi mdi-circle text-10"></i>
                                    <span id="Presiden1"></span>
                                </p>
                                <h6 class="pl-6 text-gray-800 dark:text-gray-100">
                                    <div id="SuaraPresiden1"></div>
                                </h6>
                            </div>
                            <div class="pt-2 mt-4">
                                <p class="mb-2 dark:text-zinc-100">
                                    <i class="mr-2 text-blue-500 align-middle mdi mdi-circle text-10 "></i>
                                    <span id="Presiden2"></span>
                                </p>
                                <h6 class="pl-6 text-gray-800 dark:text-gray-100">
                                    <span id="SuaraPresiden2"></span>
                                </h6>
                            </div>
                            <div class="pt-2 mt-4">
                                <p class="mb-2 dark:text-zinc-100">
                                    <i class="mr-2 text-red-500 align-middle mdi mdi-circle text-10 "></i>
                                    <span id="Presiden3"></span>
                                </p>
                                <h6 class="pl-6 text-gray-800 dark:text-gray-100">
                                    <span id="SuaraPresiden3"></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-6">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-10">
                <div class="card dark:bg-zinc-800 dark:border-zinc-600 card-h-100">
                    <div class="card-body">
                        <div class="flex flex-wrap items-center mb-2">
                            <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Perolehan Suara Presiden</h6>
                            <span id="updateTerakhir"></span>
                        </div>
                        <div class="m-10">
                            <canvas id="GrafikPresiden"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@livewire('admin.grafik-presiden')
