<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\MovimentacoesController;
use \App\Http\Controllers\CriptoinvestimentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota para renderizar a pagina inicial
Route::get('/', [IndexController::class, "index"])->name('index');

// Rota para a criação de Usuário
Route::post('/createuser', [LoginController::class, "createUser"])->name('index.create');

// Rota para renderizar a tela de Login
Route::get('/login', [LoginController::class, "index"])->name('login-screen');

// Rota responsável por processar o formulário de login
Route::post('/login', [LoginController::class, "loginUser"])->name('login-screen');

// Grupo de rotas com validação de login através do Middleware
Route::middleware('autenticacao')->prefix('app')->group(function() {
    
    // Metodo /
    Route::get('/home', [HomeController::class, "index"])->name('app.index');

    // Rota de Movimentacoes
    
    // Rota para renderizar e processar o formulário de cadastro de movimentação
    Route::get('/movimentacoes', [MovimentacoesController::class, "index"])->name("app.movimentacoes.index");
    Route::post('/movimentacoes', [MovimentacoesController::class, "createMovimentacao"])->name('app.movimentacoes.create');
    
    // Rota para renderizar e processar o formulário de visualização de movimentações
    Route::get('/movimentacoes/visualizacao', [MovimentacoesController::class, "visualizacao"])->name('app.movimentacao.visualizacao');
    Route::post('/movimentacoes/visualizacao', [MovimentacoesController::class, "visualizacaoParams"])->name('app.movimentacao.visualizacaoParams');

    // Rota para renderizar o formulário de criptoinvestimento
    Route::get('/criptoinvestimento', [CriptoinvestimentoController::class, "index"])->name("app.criptoinvestimento.index"); 
    Route::post('/criptoinvestimento', [CriptoinvestimentoController::class, "createCriptoInvestimento"])->name("app.criptoinvestimento.create"); 

});