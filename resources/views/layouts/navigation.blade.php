<!-- leftbar-tab-menu -->
<nav
    class="fixed top-0 left-0 right-0 z-10 flex items-center bg-white border-b border-slate-100 dark:bg-zinc-800 print:hidden dark:border-zinc-700">

    <div class="flex items-center justify-between w-full">
        <div class="flex items-center topbar-brand">
            <div
                class="navbar-brand flex items-center justify-between shrink px-5 h-[70px] border-r bg-slate-50 border-r-gray-50 dark:border-zinc-700 dark:bg-zinc-800">
                <a href="#" class="flex items-center text-lg font-bold dark:text-white">
                    <img src="{{ url('assets/images/logo-sm.svg') }}" alt="" class="inline-block h-6 mt-1 ltr:mr-2 rtl:ml-2" />
                    <span class="hidden align-middle xl:block">{{ ENV('APP_NAME','Wicaksu') }}</span>
                </a>
            </div>
            <button type="button"
                class="text-gray-600 dark:text-white h-[70px] ltr:-ml-10 ltr:mr-6 rtl:-mr-10 rtl:ml-10 vertical-menu-btn"
                id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="flex items-center">

            <div>
                <button type="button"
                    class="light-dark-mode text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 hidden sm:block ">
                    <i data-feather="moon" class="block w-5 h-5 dark:hidden"></i>
                    <i data-feather="sun" class="hidden w-5 h-5 dark:block"></i>
            </div>


            <div>
                <div class="relative dropdown ltr:mr-4 rtl:ml-4">
                    <button type="button"
                        class="flex items-center px-4 py-5 border-x border-gray-50 bg-gray-50/30 dropdown-toggle dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100"
                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">
                        <img class="w-8 h-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2"
                            src="{{ Auth::user()->profile_photo_url }}" alt="Header Avatar">
                        <span class="hidden fw-medium xl:block">{{ Auth::user()->name }}</span>
                        <i class="hidden align-bottom mdi mdi-chevron-down xl:block"></i>
                    </button>
                    <div class="absolute top-0 z-50 hidden w-40 list-none bg-white rounded shadow dropdown-menu ltr:-left-3 rtl:-right-3 dark:bg-zinc-800"
                        id="profile/log">
                        <div class="border border-gray-50 dark:border-zinc-600" aria-labelledby="navNotifications">
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="block px-3 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"
                                    href="{{ route('profile.show') }}">
                                    <i class="mr-1 align-middle mdi mdi-face-man text-16"></i> Profile
                                </a>
                            </div>
                            <hr class="border-gray-50 dark:border-gray-700">
                            <div class="dropdown-item dark:text-gray-100">

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a class="block p-3 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"  href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    <i class="mr-1 align-middle mdi mdi-logout text-16"></i> Logout
                                </a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
