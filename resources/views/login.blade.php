@extends('layouts.layout_basico')

@section('titulo', 'Pagina Principal')
@section('conteudo')
    
    <div class="conteudo-principal-login">
        <form action="{{ route('login-screen') }}" method="post" class="login-form">
            <h3>Realize seu login!</h3>
            @csrf
            <input type="text" name="usuario" placeholder="Digite seu usuário">
            <input type="password" name="password" placeholder="Digite sua senha">
            <button class="btn btn-primary">Logar</button>
        </form>
        <a href="{{ route('index') }}">Não possui conta? Cadastra-se agora mesmo!</a>
    </div>

@endsection