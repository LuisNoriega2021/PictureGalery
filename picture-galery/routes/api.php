<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
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
Route::get('/collection', [CollectionController::class, 'index']);
Route::get('/collection/{id}', [CollectionController::class, 'show']);
Route::post('/collection', [CollectionController::class, 'store']);
Route::put('/collection/{id}', [CollectionController::class, 'update']);
Route::delete('/collection/{id}', [CollectionController::class, 'destroy']);

//imagenes endpoints
Route::get('/imagenes', [ImagenesController::class, 'index']);
Route::post('/imagenes', [ImagenesController::class, 'store']);
Route::get('/imagenes/{collection_id}', [ImagenesController::class, 'show']);
Route::put('/imagenes/{id}', [ImagenesController::class, 'update']);
Route::delete('/imagenes/{id}', [ImagenesController::class, 'destroy']);
// Route::put('/images/{id}', [ImagesController::class, 'update']);
// Route::post('/images', [ImagesController::class, 'store']);
