<div>

    <li>
        <a href="javascript: void(0);" wire:click="asd" aria-expanded="false"
            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
            <i data-feather="grid"></i>

            <span data-key="t-apps" > Gubernur</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('dashboard-over-view',['id'=>'gubernur']) }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('setting-calon-gubernur',['id'=>'pilkada']) }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    Paslon
                </a>
            </li>
        </ul>
    </li>
</div>
