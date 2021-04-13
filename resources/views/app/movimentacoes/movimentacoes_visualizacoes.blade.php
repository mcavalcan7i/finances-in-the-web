@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Visualização de Movimentações')
@section('conteudo')
    <div class="conteudo-principal-movimentacoes">
        <div class="cima">
            <h3>Informe os parametros para a busca</h3>
            <form action="{{ route('app.movimentacao.visualizacaoParams') }}" method="post">
                @csrf
                <div class="teste">
                    <div class="datas-container">
                        <label for="">Data de Inicio</label>
                        <input type="date" name="data_inicio">
                    </div>

                    <div class="datas-container">
                        <label for="">Data final</label>
                        <input type="date" name="data_final">
                    </div>
                </div>

                <select name="tipo_busca">
                    <option value="">Digite o tipo de movimentacao</option>
                    <option value="1">Credito</option>
                    <option value="2">Debito</option>
                </select>
                {{ $errors->has('tipo_busca') ? $errors->first() : '' }}

                <button class="btn btn-light">Pesquisar</button>
            </form>
        </div>
        <div class="baixo">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nome da Movimentação</th>
                        <th>Valor da Movimentação</th>
                        <th>Tipo da movimentação</th>
                        <th>Descrição da Movimentação</th>
                        <th>Data da Movimentação</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody class="tbody-classe">
                    @foreach ($movimentacoes as $valor)
                        <tr>
                            <td>{{ $valor->nome_movimentacao }}</td>
                            @if ($valor->tipo_movimentacao == 1)
                                <td> + {{ $valor->valor_movimentacao }}</td>
                                <td> Renda</td>
                            @else
                                <td> - {{ $valor->valor_movimentacao }}</td>
                                <td> Despesa</td>
                            @endif
                            <td>{{ $valor->descricao_movimentacao }}</td>
                            <td>{{ $valor->data_movimentacao }}</td>

                            <td><a href=" {{ route('app.movimentacao.editar', $valor->id) }} " class="btn btn-success">Editar</a></td>
                            <td><a href=" {{ route('app.movimentacao.excluir', $valor->id) }} " class="btn btn-danger">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
