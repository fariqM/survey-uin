<?php

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\ImportController;
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
    return view('welcome');
});

Route::get('import', [ImportController::class,'import'])->name('import');

Route::get('/login-dev', [CustomAuthController::class,'formLoginDev'])->name('login.dev');
Route::get('/login', [CustomAuthController::class,'formLogin'])->name('login');
Route::post('/login-dev', [CustomAuthController::class,'loginDev'])->name('login.dev.act');
// Auth::routes();
Route::post('logout', [CustomAuthController::class,'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
