<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Movimentacoes;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MovimentacoesController extends Controller
{
    
    public function index() {
        return view('app.movimentacoes.movimentacoes_index');
    }

    public function createMovimentacao(Request $request) {
        Movimentacoes::create($request->all());
        $user = User::find($request['user_id']);
        $total = $user->capital_total;

        if ($request['tipo_movimentacao'] == 1) {
            // Renda
            $total += $request['valor_movimentacao'];
            $user->capital_total = $total;
        } else {
            // Despesa
            $total -= $request['valor_movimentacao'];
            $user->capital_total = $total;
        }

        $user->save();
        return redirect()->route('app.index');
    }

    public function visualizacao() {
        $idUsuario = $_SESSION['id_usuario'];
        $movimentacoes = DB::table('movimentacoes')->where('user_id', $idUsuario)->get();
        return view('app.movimentacoes.movimentacoes_visualizacoes', ['movimentacoes' => $movimentacoes]);
    }

    public function visualizacaoParams(Request $request) {
        $dataInicio = $request->get('data_inicio');
        $dataFinal = $request->get('data_final');
        $tipoBusca = $request->get('tipo_busca');

        $rules = [
            'tipo_busca' => 'required'
        ];

        $feedback = [
            'required' => "Esse campo é obrigatório"
        ];

        $request->validate($rules, $feedback);

        if ($dataFinal == null) {
            $dataFinal = '3001-12-31';
        }

        $movimentacoes = DB::table('movimentacoes')->where('data_movimentacao', '>=', $dataInicio)->where('data_movimentacao', '<=', $dataFinal)->where('tipo_movimentacao', $tipoBusca)->get();
        return view('app.movimentacoes.movimentacoes_visualizacoes', ['movimentacoes' => $movimentacoes]);
    }

    public function excluir($id) {
        $movimentacao = Movimentacoes::find($id);
        $valor = $movimentacao->valor_movimentacao;
        $usuarioAssociado = $movimentacao->user_id;

        $usuario = User::find($usuarioAssociado);
        
        if ($movimentacao->tipo_movimentacao == 2) {
            $usuario->capital_total += $valor;
        } else {
            $usuario->capital_total -= $valor;
        }

        $usuario->save();
        Movimentacoes::find($id)->delete();

        return redirect()->route('app.movimentacao.visualizacao');
    }

    public function editar($id) {
        $movimentacao = DB::table('movimentacoes')->where('id', $id)->get();
        return view('app.movimentacoes.movimentacoes_editar', ['dados' => $movimentacao]);
    }

    public function update(Request $request) {
        $id = $request->get('id');
        $idUsuario = $request->get('user_id');

        $movimentacao = Movimentacoes::find($id);
        $usuario = User::find($idUsuario);

        // valor update
        $valor = $movimentacao->valor_movimentacao;

        if ($movimentacao->tipo_movimentacao == 2) {
            $usuario->capital_total += $valor;
        } else {
            $usuario->capital_total -= $valor;
        }

        if ($request->get('tipo_movimentacao') == 2) {
            $usuario->capital_total -= $request->get('valor_movimentacao');
        } else {
            $usuario->capital += $request->get('valor_movimentacao');
        }

        $usuario->save();
        
        Movimentacoes::find($id)->update($request->all());
        return redirect()->route('app.movimentacao.visualizacao');
    }

}
