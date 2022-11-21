<?php

use App\Http\Controllers\SorteadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SorteadorController::class, 'index'])->name('sorteador.index');
Route::post('/sortear', [SorteadorController::class, 'sortear'])->name('sorteio.sortear');
Route::get('/history', [SorteadorController::class, 'history'])->name('history.index');
Route::get('/history/{id}', [SorteadorController::class, 'show'])->name('history.show');
