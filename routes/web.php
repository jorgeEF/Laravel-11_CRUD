<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// empresas
Route::get('/empresas/', [App\Http\Controllers\empresaController::class, 'index']);
Route::get('/empresas/{id}', [App\Http\Controllers\empresaController::class, 'show']);
Route::post('/empresas', [App\Http\Controllers\empresaController::class, 'store']);
Route::put('/empresas/{id}', [App\Http\Controllers\empresaController::class, 'update']);
Route::patch('/empresas/{id}', [App\Http\Controllers\empresaController::class, 'updatePartial']);
Route::delete('/empresas/{id}', [App\Http\Controllers\empresaController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
