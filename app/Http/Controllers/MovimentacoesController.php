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
        $movimentacoes = Movimentacoes::all();
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

}
