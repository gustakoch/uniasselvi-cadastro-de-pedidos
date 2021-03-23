<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['check.user.authenticated']);
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/novousuario', [HomeController::class, 'novoUsuario'])->name('novousuario');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/login/authenticate', [LoginController::class, 'authenticateGet']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['check.user.authenticated'])->group(function () {
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::post('/clientes/edit/{id}', [ClienteController::class, 'update']);
    Route::get('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->name('clientes.delete');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::post('/produtos/edit/{id}', [ProdutoController::class, 'update']);
    Route::get('/produtos/delete/{id}', [ProdutoController::class, 'destroy'])->name('produtos.delete');

    Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos/edit/{id}', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::post('/pedidos/edit/{id}', [PedidoController::class, 'update']);
    Route::get('/pedidos/delete/{id}', [PedidoController::class, 'destroy'])->name('pedidos.delete');
});
