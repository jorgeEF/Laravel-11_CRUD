<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpresaController;

/* Route::get('/user', function (Request $request) {
    return $request->user();E})->middleware('auth:sanctum'); */

Route::get('empresas', [EmpresaController::class, 'index']);

Route::get('empresas/{id}', [EmpresaController::class, 'show']);

Route::post('empresas', [EmpresaController::class, 'store']);

Route::put('empresas/{id}', [EmpresaController::class, 'update']);

Route::patch('empresas/{id}', [EmpresaController::class, 'updatePartial']);

Route::delete('empresas/{id}', [EmpresaController::class, 'delete']);
