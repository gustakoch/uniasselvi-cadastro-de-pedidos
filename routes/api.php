<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pedidos/produto', [PedidoController::class, 'consultaProduto']);
Route::get('/pedidos/produtos', [PedidoController::class, 'todosProdutos']);
