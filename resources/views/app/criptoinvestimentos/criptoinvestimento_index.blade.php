@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Cadastro de Criptoinvestimento')
@section('conteudo')
    <div class="conteudo-principal-home">
        <h2>Cadastre um Criptoinvestimento</h2>
        <form action="{{ route('app.criptoinvestimento.create') }}" method="POST" class="login-form">
            @csrf
            <input type="hidden" name="user_id" value="{{ $_SESSION['id_usuario'] }}">
            <input type="number" name="valor_real" placeholder="Digite o valor desse invesimento em R$">
            <select name="moeda">
                <option value="">Informe o tipo da movimentação</option>
                <option value="BTC">Bitcoin</option>
                <option value="ETH">Ethereum</option>
                <option value="LTC">Litecoin</option>
                <option value="LINK">Chainlink</option>
            </select>
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection