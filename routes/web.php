<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PenggunaController;

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
    return view('page.beranda');
});

Route::get('/beranda', function () {
    return view('page.beranda');
});

Route::get('/about', function () {
    return view('page.about');
});

Route::resource('/guru',GuruController::class)->middleware('auth');
Route::resource('/kelas',KelasController::class)->middleware('auth');
Route::resource('/pengguna',PenggunaController::class)->middleware('auth');
Route::get('gurupdf',[GuruController::class,'PDF'])->middleware('auth');
Route::get('kelaspdf',[KelasController::class,'PDF'])->middleware('auth');
Route::get('penggunapdf',[PenggunaController::class,'PDF'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/afterRegister', function () {
    return view('page.afterRegister');
});