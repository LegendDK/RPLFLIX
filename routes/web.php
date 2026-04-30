<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;

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
Route::get('/', function(){
    return view('login.index');
})->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'inreg'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::resource('user', UserController::class)->middleware(['auth', 'checkRole:admin']);
Route::resource('genre', GenreController::class)->middleware(['auth', 'checkRole:admin']);

Route::resource('content', ContentController::class)->middleware(['auth']);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth']);
