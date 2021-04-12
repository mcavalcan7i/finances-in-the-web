<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Criptoinvestimentos;

class CriptoinvestimentoController extends Controller
{
    
    public function index() {
        return view('app.criptoinvestimentos.criptoinvestimento_index');
    }

    public function createCriptoInvestimento(Request $request) {

        $rules = [
            'valor_real' => 'required',
            'moeda' => 'required',
            'data_criptoinvestimento' => 'required'
        ];

        $feedback = [
            'required' => 'Esse campo é obrigatório'
        ];

        $request->validate($rules, $feedback);

        $moeda = $request->get('moeda');
        $valorReais = $request->get('valor_real');
        $userId = $request->get("user_id");
        $dataAtual = $request->get('data_criptoinvestimento');

        // Consumindo a API do mercado Bitcoin para conseguir a cotação
        $url = "https://www.mercadobitcoin.net/api/{$moeda}/ticker/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));

        // Organizando os dados
        $cotacaoDia = round($resultado->ticker->high, 2);
        $saldoEmCripto = strval($valorReais/$cotacaoDia);
        echo $saldoEmCripto;

        $criptoinvestimento = new Criptoinvestimentos();
        
        $criptoinvestimento->nome_criptoinvestimento = $moeda;
        $criptoinvestimento->valor_real = $valorReais;
        $criptoinvestimento->valor_cripto = $saldoEmCripto;
        $criptoinvestimento->data_criptoinvestimento = $dataAtual;
        $criptoinvestimento->cotacao_dia = $cotacaoDia;
        $criptoinvestimento->user_id = $userId;

        $criptoinvestimento->save();
        return redirect()->route('app.criptoinvestimento.index');

    }

}
