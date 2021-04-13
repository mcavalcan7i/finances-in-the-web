@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Cadastro de Movimentação')
@section('conteudo')
    <div class="conteudo-principal-home">
        <h2>Atualize uma movimentação</h2>
        <form action="{{ route('app.movimentacao.update') }}" method="POST" class="login-form">
            @csrf
            <input type="hidden" name="user_id" value="{{ $_SESSION['id_usuario'] }}">
            <input type="hidden" name="id" value="{{ $dados[0]->id }}">
            <input type="text" name="nome_movimentacao" value="{{ $dados[0]->nome_movimentacao }}">
            <input type="number" name="valor_movimentacao" value="{{ $dados[0]->valor_movimentacao }}">
            <input type="text" name="descricao_movimentacao" value="{{ $dados[0]->descricao_movimentacao }}">
            <select name="tipo_movimentacao">
                <option value="">Informe o tipo da movimentação</option>
                <option value="1">Renda</option>
                <option value="2">Despesa</option>
            </select>
            <input type="date" name="data_movimentacao" value="{{ $dados[0]->data_movimentacao }}">
            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection