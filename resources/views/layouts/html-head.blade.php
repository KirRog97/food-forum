<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('page_title')</title>
  <link rel="icon" href="{{ URL::asset('/favicon.png') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css')  }}" defer>
  <script src="{{ URL::asset('/js/app.js')  }}" defer></script>
</head>