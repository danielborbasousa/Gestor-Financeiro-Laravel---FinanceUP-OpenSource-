<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcoesController;
use App\Http\Controllers\adicionarController;
use App\Http\Controllers\cadastroController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\listaController;
use App\Http\Controllers\resumoController;
use App\Http\Middleware\CheckUser;

//rotas comum
Route::middleware('guest')->group(function () {
    Route::get('/login', function(){
        return view('index');
    })->name('login');
    Route::post('/login', [cadastroController::class, 'login'])->name('post.login');

    Route::get('/cadastro', [cadastroController::class, 'index'])->name('cadastro');
    Route::post('/cadastro', [cadastroController::class, 'store'])->name('post.cadastro');
});

//rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    Route::get('/adicionar-transacao', [adicionarController::class, 'index'])->name('adicionar-transacao');
    Route::post('/adicionar-transacao', [adicionarController::class, 'create'])->name('post.trancacao'); 

    Route::get('/resumo-mensal', [resumoController::class, 'index'])->name('resumo-mensal');
    Route::post('/resumo-mensal', [resumoController::class, 'filter'])->name('post.resumo-mensal');

    Route::get('/lista-transacoes', [listaController::class, 'index'])->name('lista-transacoes');
    Route::post('/lista-transacoes', [listaController::class, 'index'])->name('post.lista-transacoes');
    Route::post('/transacao/{id}/delete', [listaController::class, 'destroy'])->name('transacao.delete');


    Route::get('/logout', [cadastroController::class, 'logout'])->name('logout');

    Route::get('/noticias', function () {
        return view('noticias');
    })->name('noticias');
    Route::get('/acoes', [AcoesController::class, 'buscarAcoes']);

});


