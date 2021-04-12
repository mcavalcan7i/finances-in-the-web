<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    
    public function index() {
        return view('login');
    }

    // Função responsável por cadastrar o usuário no BD
    public function createUser (Request $request) {

        $rules = [
            'name' => 'required',
            'usuario' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $feedback = [
            'required' => 'Este campo precisa estar preenchido'
        ];

        $request->validate($rules, $feedback);
        $user = new User();
        
        $user->name = $request->get('name');
        $user->usuario = $request->get('usuario');
        $user->email = $request->get('email');
        $user->password = md5($request->get('password'));
        $user->capital_total = $request->get('capital_total');

        $user->save();

        return redirect()->route('login-screen');

    }

    // Responsável por validar o Login do Usuário
    public function loginUser(Request $request) {
        $login = $request->get("usuario");
        $password = md5($request->get("password"));
    
        $user = new User();
        $usuario = $user->where("usuario", $login)->where("password", $password)->get()->first();

        if (isset($usuario)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['usuario'] = $usuario->usuario;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['id_usuario'] = $usuario->id;
            // $_SESSION['capital_total'] = $usuario->capital_total;

            return redirect()->route('app.index');
        } else {
            return redirect()->route('login-screen');
        }
    }

}
