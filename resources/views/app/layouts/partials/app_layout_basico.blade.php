<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>FITW - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body>
</body>
    @include('app.layouts.partials.app_topo')
    @yield('conteudo')
</html>
