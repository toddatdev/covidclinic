<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Covid Clinic | @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->

    @stack('stylesheets')

</head>
<body>


@yield('content')


<script src="{{asset('js/app.js')}}"></script>

@stack('scripts')

</body>
</html>




