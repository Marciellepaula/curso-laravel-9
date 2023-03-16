<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::prefix('Api')->group(function () {
    Route::get('/', 'ProductController@index');
});






Route::prefix('products')->group(function () {
    Route::get('/', \App\Http\Controllers\Produto\IndexProdutoController::class);
    Route::post('/',  \App\Http\Controllers\Produto\StoreProdutoController::class);
    Route::get('/{id}', \App\Http\Controllers\Produto\ShowProdutoController::class);
    // Route::put('/{id}', \App\Http\Controllers\Produto\UpdateProdutoController::class);
    // Route::delete('/{id}', \App\Http\Controllers\Produto\DestroyProdutoController::class);
});
