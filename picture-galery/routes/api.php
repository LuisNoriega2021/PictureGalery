<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
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

Route::get('/persons', 'App\Http\Controllers\PersonsController@index');

//Route::get('/collection', 'App\Http\Controllers\CollectionController@index');

    Route::get('/collection', [CollectionController::class, 'index']);  // Mostrar todos los usuarios
    Route::get('/collection/{id}', [CollectionController::class, 'show']);  // Mostrar un usuario específico
    Route::post('/collection', [CollectionController::class, 'store']);  // Crear un nuevo usuario
    Route::put('/collection/{id}', [CollectionController::class, 'update']);  // Actualizar un usuario existente
    Route::delete('/collection/{id}', [CollectionController::class, 'destroy']);  // Eliminar un usuario

