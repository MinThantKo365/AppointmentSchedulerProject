<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [LoginController::class, 'index'])->name('index');
// registerView

Route::get('/', [LoginController::class, 'loginView'])->name('login_view');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login_post');


// logout
Route::get('/register', [LoginController::class, 'registerView'])->name('register_view');
Route::post('/register', [LoginController::class, 'registerPost'])->name('register_post');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');