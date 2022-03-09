<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromoController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::get('/schools-view', [HomeController::class, 'index'])->name('schools-view');
Route::get('/promos-view', [PromoController::class, 'index'])->name('promos-view');

//Route Hooks - Do not delete//
	Route::view('candidaturas', 'livewire.candidaturas.index')->middleware('auth');
	Route::view('promos', 'livewire.promos.index')->middleware('auth');
	Route::view('schools', 'livewire.schools.index')->middleware('auth');