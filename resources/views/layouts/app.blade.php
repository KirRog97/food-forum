<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="app">
        <el-container>
            <el-aside width="64px">
                <sidebar></sidebar>
                <sidebar-drawer></sidebar-drawer>
            </el-aside>
            <el-container>
                <el-header>
                    @include('layouts.nav')
                </el-header>
                <el-main>
                    <vue-snotify></vue-snotify>
                    <backtop></backtop>
                    @include('components.message')
                    @yield('content')
                </el-main>
                <el-footer height="fit-content">
                    @include('layouts.footer')
                </el-footer>
            </el-container>
        </el-container>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
