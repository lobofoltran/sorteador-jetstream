<?php

use App\Http\Controllers\SorteadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/sortear', [SorteadorController::class, 'sortear'])->name('sorteio.sortear');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});