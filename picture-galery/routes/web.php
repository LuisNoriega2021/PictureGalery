<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\ImagenesController;


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

Route::get('/collections', function () {
    return view('collections');
});

Auth::routes();


//Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', [ImagenesController::class, 'mostrarVistaConDatos']);
Route::get('/home', [CollectionsController::class, 'index']) ;
//
