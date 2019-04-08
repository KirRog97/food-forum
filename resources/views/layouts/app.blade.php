<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>


    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-auto col-lg-2 sidebar">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-12 col-md-10 col-lg-10">
                    <div class="page">
                        @include('layouts.nav')

                        @include('components.message')

                        @yield('content')
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        </div>

        {{-- Vue div down here --}}
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
