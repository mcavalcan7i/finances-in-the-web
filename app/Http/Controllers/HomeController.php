<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class HomeController extends Controller
{
    public function index() {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8');
        $dataAtualFormatada = ucfirst(strftime("%d de %B de %Y", strtotime('now')));
        $user = User::find($_SESSION['id_usuario']);

        $data = [
            "nome_usuario" => $_SESSION['nome'],
            "capital_total" => $user->capital_total,
            "data_atual" => $dataAtualFormatada
        ];

        return view('app.home.home', ["informacoes" => $data]);
    }

    public function deslogar() {
        session_destroy();
        return redirect()->route('index');
    }
}
