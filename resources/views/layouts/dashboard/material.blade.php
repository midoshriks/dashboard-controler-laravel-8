<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

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
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div class="page">
            {{-- Body  --}}
            <div class="page-wrapper">
                @yield('content')
            </div>
        {{-- Footer --}}
        @include('layouts.dashboard.footer')
    </div>

    {{-- Scripr File Js & Function --}}
    @include('layouts.dashboard.script')
</body>

</html>
