<!doctype html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Fonts -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">


</head>
<body class="has-navbar-fixed-top">
<div id="app">
        @yield('body')
    @if(session()->has('toast'))
        <toast message="{{ session()->get('toast')['message'] }}" title="{{ session()->get('toast')['title'] }}"
               type="{{ session()->get('toast')['type'] }}"
               @isset(session()->get('toast')['position'])
               position="{{session()->get('toast')['position']}}"
            @endisset
        ></toast>
    @endif
</div>
<script src="{{ mix('/js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
