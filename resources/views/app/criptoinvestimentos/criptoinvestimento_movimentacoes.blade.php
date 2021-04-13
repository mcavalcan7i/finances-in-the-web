@extends('app.layouts.partials.app_layout_basico')

@section('titulo', 'Cadastro de Criptoinvestimento')
@section('conteudo')
    <div class="conteudo-principal-home">
        <h2>Visualização dos Criptoinvestimentos</h2>

        <div class="teste2">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nome da Criptomoeda</th>
                        <th>Data da Compra</th>
                        <th>Cotação no dia da Compra</th>
                        <th>Valor pago em R$</th>
                        <th>Valor em Criptomoeda</th>
                    </tr>
                </thead>
                <tbody class="tbody-classe">
                    @foreach ($criptoinvestimentos as $criptoinvestimento)
                        <tr>
                            <td>{{ $criptoinvestimento->nome_criptoinvestimento }}</td>
                            <td>{{ $criptoinvestimento->data_criptoinvestimento }}</td>
                            <td>{{ $criptoinvestimento->cotacao_dia }}</td>
                            <td>{{ $criptoinvestimento->valor_real }}</td>
                            <td>{{ round(floatval($criptoinvestimento->valor_cripto), 8, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
