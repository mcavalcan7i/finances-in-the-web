@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Cadastro de Movimentação')
@section('conteudo')
    <div class="conteudo-principal-home">
        <h2>Cadastre uma movimentação</h2>
        <form action="{{ route('app.movimentacoes.create') }}" method="POST" class="login-form">
            @csrf
            <input type="hidden" name="user_id" value="{{ $_SESSION['id_usuario'] }}">
            <input type="text" name="nome_movimentacao" placeholder="Digite o nome dessa movimentação">
            <input type="number" name="valor_movimentacao" placeholder="Digite o valor da movimentação">
            <input type="text" name="descricao_movimentacao" placeholder="Digite a descrição da movimentação">
            <select name="tipo_movimentacao">
                <option value="">Informe o tipo da movimentação</option>
                <option value="1">Renda</option>
                <option value="2">Despesa</option>
            </select>
            <input type="date" name="data_movimentacao" placeholder="Digite a data dessa movimentação">
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection