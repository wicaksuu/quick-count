<div>

    <li>
        <a href="javascript: void(0);" wire:click="asd" aria-expanded="false"
            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
            <i data-feather="grid"></i>

            <span data-key="t-apps" > DPRD</span>
        </a>
        <ul>
            <li>
                <a href="{{ route('dashboard-over-view',['id'=>'dprd']) }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    Dashboard
                </a>
            </li>
            <li>
                @if (isset($partais[0]))
                    <a href="javascript: void(0);" aria-expanded="false" class="block py-2 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu pl-14 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <span data-key="t-calon">Calon</span>
                    </a>
                @endif
                <ul>
                        @foreach ($partais as $partai)
                            <li>
                                <a href="{{ route('setting-calon-dprd',['id'=>$partai->id]) }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    {{ $partai->nama }}
                                </a>
                            </li>
                        @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('setting-dprd-madiunkab') }}"
                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-dprd-madiunkab') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                    Setting Dapil
                </a>
            </li>
        </ul>
    </li>
</div>
