<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @component('sistema.navbar')
    @endcomponent
    @component('sistema.message')
    @endcomponent

    @yield('body')
    @yield('script')
</body>
</html>
