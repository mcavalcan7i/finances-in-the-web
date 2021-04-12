<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriptoinvestimentoController extends Controller
{
    
    public function index() {
        return view('app.criptoinvestimentos.criptoinvestimento_index');
    }

    public function createCriptoInvestimento(Request $request) {
        $moeda = $request->get('moeda');
        $valorReais = $request->get('valor_real');


        // Consumindo a API do mercado Bitcoin para conseguir a cotação
        $url = "https://www.mercadobitcoin.net/api/{$moeda}/ticker/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch));

        // Organizando os dados
        $tickerHigh = round($resultado->ticker->high, 0);
        $saldoEmCripto = strval($valorReais/$tickerHigh);

        echo $saldoEmCripto;
        
    }

}
