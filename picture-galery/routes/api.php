<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\ImagesController;
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

//collection endpoints
Route::get('/collections', [CollectionsController::class, 'index']);
Route::get('/collections/{id}', [CollectionsController::class, 'show']);
Route::post('/collections', [CollectionsController::class, 'store']);
Route::put('/collections/{id}', [CollectionsController::class, 'update']);
Route::delete('/collections/{id}', [CollectionsController::class, 'destroy']);

//imagenes endpoints
Route::get('/imagenes', [ImagenesController::class, 'index']);
Route::post('/imagenes', [ImagenesController::class, 'store']);
Route::get('/imagenes/{collection_id}', [ImagenesController::class, 'show']);
Route::put('/imagenes/{id}', [ImagenesController::class, 'update']);
Route::delete('/imagenes/{id}/{users}', [ImagenesController::class, 'destroy']);
// Route::put('/images/{id}', [ImagesController::class, 'update']);
// Route::post('/images', [ImagesController::class, 'store']);
