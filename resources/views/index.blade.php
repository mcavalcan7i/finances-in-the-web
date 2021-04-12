@extends('layouts.layout_basico')

@section('titulo', 'Pagina Principal')
@section('conteudo')

    <div class="conteudo-principal">
        <div class="esquerda">
            <h2>A salvação da sua vida financeira!</h2>
            <div class="chamada">
                <img src="{{ asset('img/check.png') }}">
                <span class="texto-branco">Tenha controle de sua renda</span>
            </div>
            <div class="chamada">
                <img src="{{ asset('img/check.png') }}">
                <span class="texto-branco">Mantenha suas despesas e rendas sob o controle</span>
            </div>
            <div class="chamada">
                <img src="{{ asset('img/check.png') }}">
                <span class="texto-branco">Registre seus Criptoinvestimentos mensais</span>
            </div>
            <div class="entre-em-contato">
                <h2>Entre em contato conosco!</h2>
                <form action="#" method="post">
                    <input type="text" name="nome" placeholder="Nos informe seu nome" class="form-control">
                    <input type="email" name="email" placeholder="Seu email" class="form-control">
                    <textarea class="form-control" name="mensagem" rows="3"></textarea>
                    <button class="btn btn-light"> Entrar em contato! </button>
                </form>
            </div>
        </div>
        <div class="direita">
            <h2>Não possui conta?</h2>
            <p>Cadastre-se agora mesmo na nossa plataforma <br>e comece a utilizar nossos serviços!</p>
            @component('components.form_create')
                
            @endcomponent
        </div>
    </div>

@endsection
