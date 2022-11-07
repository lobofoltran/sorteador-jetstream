<?php

use App\Http\Controllers\SorteadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SorteadorController::class, 'index'])->name('sorteador.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
