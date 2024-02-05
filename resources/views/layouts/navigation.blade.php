<!-- leftbar-tab-menu -->
<nav
    class="fixed top-0 left-0 right-0 z-10 flex items-center bg-white border-b border-slate-100 dark:bg-zinc-800 print:hidden dark:border-zinc-700">

    <div class="flex items-center justify-between w-full">
        <div class="flex items-center topbar-brand">
            <div
                class="navbar-brand flex items-center justify-between shrink px-5 h-[70px] border-r bg-slate-50 border-r-gray-50 dark:border-zinc-700 dark:bg-zinc-800">
                <a href="#" class="flex items-center text-lg font-bold dark:text-white">
                    <img src="{{ url('assets/images/logo-sm.svg') }}" alt="" class="inline-block h-6 mt-1 ltr:mr-2 rtl:ml-2" />
                    <span class="hidden align-middle xl:block">Wicaksu</span>
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
                <div class="relative dropdown ">
                    <div class="relative">
                        <button type="button"
                            class="btn border-0 h-[70px] dropdown-toggle px-4 text-gray-500 dark:text-gray-100"
                            aria-expanded="false" data-dropdown-toggle="notification">
                            <i data-feather="bell" class="w-5 h-5"></i>
                        </button>
                        <span
                            class="absolute text-xs px-1.5 bg-red-500 text-white font-medium rounded-full left-6 top-2.5">5</span>
                    </div>
                    <div class="absolute z-50 hidden list-none bg-white rounded shadow dropdown-menu w-80 dark:bg-zinc-800 "
                        id="notification">
                        <div class="border rounded border-gray-50 dark:border-gray-700" aria-labelledby="notification">
                            <div class="grid grid-cols-12 p-4">
                                <div class="col-span-6">
                                    <h6 class="m-0 text-gray-700 dark:text-gray-100"> Notifications </h6>
                                </div>
                                <div class="col-span-6 justify-self-end">
                                    <a href="#!" class="text-xs underline dark:text-gray-400"> Unread (3)</a>
                                </div>
                            </div>
                            <div class="max-h-56" data-simplebar>
                                <div>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                            <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                <img src="{{ url('assets/images/users/avatar-3.jpg') }}" class="w-8 h-8 rounded-full"
                                                    alt="user-pic">
                                            </div>
                                            <div class="flex-grow">
                                                <h6 class="mb-1 text-gray-700 dark:text-gray-100">James Lemire</h6>
                                                <div class="text-gray-600 text-13">
                                                    <p class="mb-1 dark:text-gray-400">It will seem like simplified
                                                        English.</p>
                                                    <p class="mb-0"><i
                                                            class="mdi mdi-clock-outline dark:text-gray-400"></i>
                                                        <span>1 hour ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                            <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                <div class="w-8 h-8 text-center rounded-full bg-violet-500">
                                                    <i class="text-xl leading-relaxed text-white bx bx-cart"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow">
                                                <h6 class="mb-1 text-gray-700 dark:text-gray-100">Your order is
                                                    placed</h6>
                                                <div class="text-gray-600 text-13">
                                                    <p class="mb-1 dark:text-gray-400">If several languages coalesce
                                                        the grammar</p>
                                                    <p class="mb-0"><i
                                                            class="mdi mdi-clock-outline dark:text-gray-400"></i>
                                                        <span>3 min ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                            <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                <div class="w-8 h-8 text-center bg-green-500 rounded-full">
                                                    <i class="text-xl leading-relaxed text-white bx bx-badge-check"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow">
                                                <h6 class="mb-1 text-gray-700 dark:text-gray-100">Your item is
                                                    shipped</h6>
                                                <div class="text-gray-600 text-13">
                                                    <p class="mb-1 dark:text-gray-400">If several languages coalesce
                                                        the grammar</p>
                                                    <p class="mb-0"><i
                                                            class="mdi mdi-clock-outline dark:text-gray-400"></i>
                                                        <span>3 min ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="text-reset notification-item">
                                        <div class="flex px-4 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50">
                                            <div class="flex-shrink-0 ltr:mr-3 rtl:ml-3">
                                                <img src="{{url('assets/images/users/avatar-6.jpg')}}" class="w-8 h-8 rounded-full"
                                                    alt="user-pic">
                                            </div>
                                            <div class="flex-grow">
                                                <h6 class="mb-1 text-gray-700 dark:text-gray-100">Salena Layfield
                                                </h6>
                                                <div class="text-gray-600 text-13">
                                                    <p class="mb-1 dark:text-gray-400">As a skeptical Cambridge
                                                        friend of mine occidental.</p>
                                                    <p class="mb-0"><i
                                                            class="mdi mdi-clock-outline dark:text-gray-400"></i>
                                                        <span>1 hour ago</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid p-1 border-t border-gray-50 dark:border-zinc-600 justify-items-center">
                                <a class="border-0 btn text-violet-500" href="javascript:void(0)">
                                    <i class="mr-1 mdi mdi-arrow-right-circle"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <div class="relative dropdown ltr:mr-4 rtl:ml-4">
                    <button type="button"
                        class="flex items-center px-4 py-5 border-x border-gray-50 bg-gray-50/30 dropdown-toggle dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100"
                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">
                        <img class="w-8 h-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2"
                            src="{{ url('assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                        <span class="hidden fw-medium xl:block">{{ Auth::user()->name }}</span>
                        <i class="hidden align-bottom mdi mdi-chevron-down xl:block"></i>
                    </button>
                    <div class="absolute top-0 z-50 hidden w-40 list-none bg-white rounded shadow dropdown-menu ltr:-left-3 rtl:-right-3 dark:bg-zinc-800"
                        id="profile/log">
                        <div class="border border-gray-50 dark:border-zinc-600" aria-labelledby="navNotifications">
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="block px-3 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"
                                    href="apps-contacts-profile.html">
                                    <i class="mr-1 align-middle mdi mdi-face-man text-16"></i> Profile
                                </a>
                            </div>
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="block px-3 py-2 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"
                                    href="lock-screen.html">
                                    <i class="mr-1 align-middle mdi mdi-lock text-16"></i> Lock Screen
                                </a>
                            </div>
                            <hr class="border-gray-50 dark:border-gray-700">
                            <div class="dropdown-item dark:text-gray-100">

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a class="block p-3 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50"  href="{{ route('logout') }}" @click.prevent="$root.submit();">>
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
