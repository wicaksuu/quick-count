<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
</head>

<body data-mode="light" data-sidebar-size="lg">
    @include('layouts.navigation')
    @include('layouts.nav')
    <div class="main-content">

        <div class="min-h-screen page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        @yield('page')
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    @stack('modals')

    @livewireScripts

    <x-toaster-hub />
    <script src="{{ url('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>

    @yield('js')
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
