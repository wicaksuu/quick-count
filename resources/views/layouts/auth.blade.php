<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
</head>

<body data-mode="light" data-sidebar-size="lg">
    @include('layouts.navigation')
    <div class="main-content">
        <div class="page-content dark:bg-zinc-700 min-h-screen">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
    <x-toaster-hub />
    @yield('js')
    <script src="assets/libs/@popperjs/core/umd/popper.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>