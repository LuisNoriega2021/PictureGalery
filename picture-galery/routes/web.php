<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ImagenesController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [CollectionsController::class, 'index'])->name('home');
Route::get('/collections/{collection_id}', 'App\Http\Controllers\CollectionsController@show')->name('collection.show');
Route::post('/collections/store', 'App\Http\Controllers\CollectionsController@store')->name('collection.store');
Route::post('/imagenes/store', 'App\Http\Controllers\ImagenesController@store')->name('imagenes.store');
Route::get('/collections/getUserId', [CollectionsController::class, 'getUserId'])->name('collection.getUserId');
Route::delete('/collections/{id}/users/{users}', [CollectionsController::class, 'destroy'])->name('collection.destroy');
//Route::delete('/collections/{id}/{users}', 'CollectionsController@destroy')->name('collection.destroy');
//Route::delete('/collections/{id}/users/{users}', 'CollectionsController@destroy')->name('collection.destroy');
//Route::delete('collections/{id}', 'CollectionController@destroy')->name('collection.destroy');

//Route::post('/collections', 'App\Http\Controllers\CollectionsController@destroy')->name('collection.destroy');
//Route::delete('/collections/{id}/{users}', 'CollectionsController@destroy')->name('collection.destroy');




//
