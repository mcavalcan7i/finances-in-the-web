@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Home de Usuário')
@section('conteudo')
    <div class="conteudo-principal-home">
        <h3>Hoje é {{ $informacoes['data_atual'] }}</h3>
        <h3>Seja bem vindo {{ $informacoes['nome_usuario'] }}</h3>
        <h3>Seu status é de R$: {{ $informacoes['capital_total'] }}</h3>

        <a href=" {{ route('app.deslogar') }} " class="btn btn-danger">Deslogar</a>
    </div>
@endsection