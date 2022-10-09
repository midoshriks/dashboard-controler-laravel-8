<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- @mido_shriks use btn animation by sweetalert2 --}}
    <!-- sweet alerts -->
    <link href="{{ asset('dashboard/src/js/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
    {{-- @mido_shriks use btn animation by sweetalert2 --}}

    {{-- @mido_shriks datatable --}}



    {{-- Style Dashboard --}}
    @if (app()->getLocale() == 'en')
        <!-- CSS files -->
        <link href="{{ asset('dashboard/dist/css/tabler.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/demo.min.css') }}" rel="stylesheet" />
    @else
        <!-- CSS files -->
        <link href="{{ asset('dashboard/dist/css/tabler.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/dist/css/demo.rtl.min.css') }}" rel="stylesheet" />
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- @mido_shriks libry datatable css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/datatables/datatables.min.css') }}" />
    {{-- // cdn --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sl-1.4.0/datatables.min.css"/> --}}





</head>

<body>
    <div class="page">
        {{-- header --}}
        @include('layouts.dashboard.header')
        {{-- Navbar --}}
        @include('layouts.dashboard.navbar')
        {{-- Body --}}
        <div class="page-wrapper">
            @yield('content')
        </div>
        {{-- Footer --}}
        @include('layouts.dashboard.footer')
    </div>
    {{-- Scripr File Js & Function --}}
    @include('layouts.dashboard.script')
    {{-- Sweetalret2 install laravel --}}
    @include('vendor.sweetalert.alert')
</body>

</html>
