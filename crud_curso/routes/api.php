<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::prefix('realstate')->group(function () {
    Route::get('/', [\App\Http\Controllers\RealStatPhotoController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\RealStatPhotoController::class, 'store']);
    Route::get('/{id}', [\App\Http\Controllers\RealStatPhotoController::class, 'show']);
    Route::put('/{id}', [\App\Http\Controllers\RealStatPhotoController::class, 'update']);
});


Route::prefix('user')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\UserController::class, 'store']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    //Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update']);
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});


Route::prefix('products')->group(function () {
    Route::get('/', \App\Http\Controllers\Produto\IndexProdutoController::class);
    Route::post('/',  \App\Http\Controllers\Produto\StoreProdutoController::class);
    Route::get('/{id}', \App\Http\Controllers\Produto\ShowProdutoController::class);
    Route::put('/{id}', \App\Http\Controllers\Produto\UpdateProdutoController::class);
    // Route::delete('/{id}', \App\Http\Controllers\Produto\DestroyProdutoController::class);
});
