@php
    $partais = App\Models\DaftarPartai::get();
    $dapils = App\Models\dapilDPRD::get();
@endphp
<div
    class="fixed bottom-0 z-10 h-screen border-r vertical-menu rtl:right-0 ltr:left-0 top-16 bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">

    <div data-simplebar class="h-full">
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
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> Presiden</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'presiden']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting-calon-presiden', ['id' => 'pilkada']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Paslon
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> DPR RI</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'dpr-ri']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                @if (isset($partais[0]))
                                    <a href="javascript: void(0);" aria-expanded="false"
                                        class="block py-2 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu pl-14 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <span data-key="t-calon">Calon</span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($partais as $partai)
                                        <li>
                                            <a href="{{ route('setting-calon-dpr-ri', ['id' => $partai->id]) }}"
                                                class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                                {{ $partai->nama }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> DPD RI</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'dpd-ri']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting-calon-dpd-ri', ['id' => 'pilkada']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Paslon
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> DPRD Prov</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'dprd-provinsi']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                @if (isset($partais[0]))
                                    <a href="javascript: void(0);" aria-expanded="false"
                                        class="block py-2 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu pl-14 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <span data-key="t-calon">Calon</span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($partais as $partai)
                                        <li>
                                            <a href="{{ route('setting-calon-dprd-provinsi', ['id' => $partai->id]) }}"
                                                class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                                {{ $partai->nama }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> DPRD</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'dprd']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                @if (isset($dapils[0]))
                                    <a href="javascript: void(0);" aria-expanded="false"
                                        class="block py-2 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu pl-14 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <span data-key="t-calon">Dapil View</span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($dapils as $dapil)
                                        <li>
                                            <a href="{{ route('view-calon-dprd', ['id' => $dapil->id]) }}"
                                                class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                                {{ $dapil->nama }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                @if (isset($partais[0]))
                                    <a href="javascript: void(0);" aria-expanded="false"
                                        class="block py-2 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu pl-14 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                        <span data-key="t-calon">Calon</span>
                                    </a>
                                @endif
                                <ul>
                                    @foreach ($partais as $partai)
                                        <li>
                                            <a href="{{ route('setting-calon-dprd', ['id' => $partai->id]) }}"
                                                class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
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
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> Gubernur</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'gubernur']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting-calon-gubernur', ['id' => 'pilkada']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Paslon
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> Bupati</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'bupati']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting-calon-bupati', ['id' => 'pilkada']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Paslon
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu dark:text-gray-300 hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                            <i data-feather="grid"></i>

                            <span data-key="t-apps"> Walikota</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('dashboard-over-view', ['id' => 'walikota']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting-calon-walikota', ['id' => 'pilkada']) }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                                    Paslon
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-3 pl-6 pr-4 text-sm font-medium text-gray-700 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <i class="mdi mdi-database-settings-outline"></i>
                            <span data-key="t-auth">General Setting</span>
                        </a>
                        <ul class="mm-collapse">
                            {{-- <li>
                                <a href="{{ route('setting-global') }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-global') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                                    Setting
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('setting-tps') }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'setting-tps') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                                    Setting TPS
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('daftar-tps') }}"
                                    class="pl-14 pr-4 py-2 block text-[13.5px] font-medium @if (Route::currentRouteName() == 'daftar-tps') text-blue-700 dark:text-blue-300 @else text-gray-700 dark:text-gray-300 @endif transition-all duration-150 ease-linear hover:text-violet-500 dark:active:text-white dark:hover:text-white">
                                    Daftar TPS
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

    </div>
</div>
<!-- Left Sidebar End -->
