<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cidade\CidadeController;
use App\Http\Controllers\Endereco\EnderecoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('cidades', CidadeController::class)->only(['index']);
Route::apiResource('enderecos', EnderecoController::class)->parameters(['enderecos' => 'endereco']);
