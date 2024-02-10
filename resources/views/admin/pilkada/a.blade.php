<div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

    <div class="m-2 lg:col-span-1">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="pb-0 card-body">
                <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Perolehan Suara Presiden</h6>
            </div>
            <div>
                <canvas class="p-20" style="height: 100px" id="PiePresiden"></canvas>
            </div>
            <div class="flex flex-wrap gap-3 card-body">
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-red-500 "></i>
                        <span id="Presiden1"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100 pl-6">
                        <div id="SuaraPresiden1"></div>
                    </h6>
                </div>
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-blue-500 "></i>
                        <span id="Presiden2"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100  pl-6">
                        <span id="SuaraPresiden2"></span>
                    </h6>
                </div>
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-green-500"></i>
                        <span id="Presiden3"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100 pl-6">
                        <span id="SuaraPresiden3"></span>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="m-2 lg:col-span-2">
        <div class="card dark:bg-zinc-800 dark:border-zinc-600">
            <div class="pb-0 card-body">
                <h6 class="mb-1 text-gray-600 text-15 dark:text-gray-100">Perolehan Suara Presiden</h6>
            </div>
            <div>
                <canvas class="p-20" id="GrafikPresiden"></canvas>
            </div>
            <div class="flex flex-wrap gap-3 card-body">
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-red-500 "></i>
                        <span id="Presiden1"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100 pl-6">
                        <div id="SuaraPresiden1"></div>
                    </h6>
                </div>
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-blue-500 "></i>
                        <span id="Presiden2"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100  pl-6">
                        <span id="SuaraPresiden2"></span>
                    </h6>
                </div>
                <div class="mb-2">
                    <p class="mb-2 dark:text-zinc-100">
                        <i class="mdi mdi-circle align-middle text-10 mr-2 text-green-500"></i>
                        <span id="Presiden3"></span>
                    </p>
                    <h6 class="text-gray-800 dark:text-gray-100 pl-6">
                        <span id="SuaraPresiden3"></span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>

@livewire('admin.grafik-presiden')
