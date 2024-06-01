<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/', function () {
    return view('welcome');
});

// empresas
Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
Route::get('/empresas/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');
Route::put('/empresas/{id}', [EmpresaController::class, 'update'])->name('empresas.update');
Route::patch('/empresas/{id}', [EmpresaController::class, 'updatePartial'])->name('empresas.updatePartial');
Route::delete('/empresas/{id}', [EmpresaController::class, 'delete'])->name('empresas.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
