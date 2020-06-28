<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Radio Cast - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon"/>
@section('styles')
    <!--Styles-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    @show
</head>
<body>
@yield('content')

@section('scripts')
    <!--Scripts-->
@show
</body>
</html>
