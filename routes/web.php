<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alumnoController;
use App\Http\Controllers\profesorController;

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


Route::get('/', [alumnoController::class, 'index'])->name('index');
Route::get('/login', [alumnoController::class, 'login'])->name('login')->middleware('guest');
Route::post('/utlag.datos', [alumnoController::class, 'datos'])->name('datos');
Route::get('/utlag.menulog/{nam?}', [alumnoController::class, 'menulog'])->name('menulog')->middleware('auth');
Route::get('/utlag.logout', [alumnoController::class, 'logout'])->name('logout');


Route::resource('/admin', AdminController::class);
Route::resource('/docente', profesorController::class);

//Route::get('/layouts', [alumnoController::class, 'layout'])
