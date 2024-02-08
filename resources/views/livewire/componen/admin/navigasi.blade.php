<div>
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
            <li class="menu-heading px-4 py-3.5 text-xs font-medium text-gray-500 cursor-default"
                data-key="t-menu">
                Menu</li>

            <li>
                <a href="{{ route('dashboard') }}"
                    class="pl-6 pr-4 py-3 block text-sm font-medium @if (Route::currentRouteName() == 'dashboard') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500  dark:active:text-white dark:hover:text-white">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard"> Dashboard</span>
                </a>
            </li>
            <livewire:componen.admin.navigasi.presiden />
            <livewire:componen.admin.navigasi.d-p-r-r-i  :partais="$partais" />
            <livewire:componen.admin.navigasi.d-p-d-r-i  :partais="$partais" />
            <livewire:componen.admin.navigasi.d-p-r-d-prov  :partais="$partais" />
            <livewire:componen.admin.navigasi.d-p-r-d  :partais="$partais" />
            <livewire:componen.admin.navigasi.gubernur   />
            <livewire:componen.admin.navigasi.bupati   />
            <livewire:componen.admin.navigasi.walikota   />







            <li>
                <a href="javascript: void(0);" aria-expanded="false"
                    class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    <i class="mdi mdi-database-settings-outline"></i>
                    <span data-key="t-auth">General Setting</span>
                </a>
                <ul class="mm-collapse">
                    <li>
                        <a href="{{ route('setting-global') }}"
                            class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-global') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            Setting
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('setting-tps') }}"
                            class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-tps') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            Setting TPS
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('setting-partai') }}"
                            class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-partai') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            Setting Partai
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</div>
