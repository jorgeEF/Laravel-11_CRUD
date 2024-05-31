<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\empresaController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::get('empresas', [empresaController::class, 'index']);

Route::get('empresas/{id}', [empresaController::class, 'show']);

Route::post('empresas', [empresaController::class, 'store']);

Route::put('empresas/{id}', [empresaController::class, 'update']);

Route::patch('empresas/{id}', [empresaController::class, 'updatePartial']);

Route::delete('empresas/{id}', [empresaController::class, 'delete']);
