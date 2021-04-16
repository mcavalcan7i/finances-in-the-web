<?php

namespace App\Http\Controllers;

use App\Models\CredenciaisContato;
use Illuminate\Http\Request;
// use \App\Models\CredenciaisContato;
use \App\Models\Mensagem;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    
    public function create(Request $request) {
        $email = $request->get('email');
        $mensagem = $request->get('mensagem');

        $msng = new Mensagem();
        $credencialContato = DB::table('credenciais_contato')->where('email_credencial_contato', $email)->get();

        if ($credencialContato->count() > 0) {
            $id = $credencialContato[0]->id;
            $msng->credenciais_contato_id = $id;
            $msng->mensagem_usuario = $mensagem;
            
            $msng->save();
            return redirect()->route('index');
        } else {
            $nome = $request->get('nome');

            $credenciais = new CredenciaisContato();
            $credenciais->nome_credencial_contato = $nome;
            $credenciais->email_credencial_contato = $email;
            $credenciais->save();

            $credencialContato = DB::table('credenciais_contato')->where('email_credencial_contato', $email)->get();
            $id = $credencialContato[0]->id;

            $msng->credenciais_contato_id = $id;
            $msng->mensagem_usuario = $mensagem;

            $msng->save();
            return redirect()->route('index');
        }

    }
}
