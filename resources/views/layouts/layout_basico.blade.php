<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>FITW - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body>
</body>
    @include('layouts.partials.topo')
    @yield('conteudo')
</html>
