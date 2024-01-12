<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.head')
</head>

<body data-mode="light" data-sidebar-size="lg">

    @yield('content')
    
    @stack('modals')
    @livewireScripts
    <x-toaster-hub />

    @yield('js')
<script src="{{ url('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ url('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>