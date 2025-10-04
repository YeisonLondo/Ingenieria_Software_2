<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/reservar', [ReservasController::class, 'reservar']);
Route::put('/cancelar/{id}', [ReservasController::class, 'cancelar']);
Route::get('/reservas_usuarios/{id_usuario}', [ReservasController::class, 'reservasPorUsuario']);
Route::get('/reservas_clase/{id_clase}', [ReservasController::class, 'reservasPorClase']);