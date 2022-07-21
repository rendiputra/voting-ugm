<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.landing');
});
Route::get('/voting-foto',function(){
    return view('user.foto');
});
Route::get('/podcast',function(){
    return view('user.podcast');
});

Route::get('/test', [App\Http\Controllers\FrontController::class, 'getIp'])->name('ip');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/foto', [App\Http\Controllers\FotoController::class, 'index'])->name('foto.index');
Route::get('/foto/tambah', [App\Http\Controllers\FotoController::class, 'show'])->name('foto.show');
Route::post('/foto/tambah', [App\Http\Controllers\FotoController::class, 'insert'])->name('foto.insert');
