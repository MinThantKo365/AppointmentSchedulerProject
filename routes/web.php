<?php

use App\Http\Controllers\AppointmentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Allow When the user was not login in
Route::middleware(['guest'])->group(function () {
    // login
    Route::get('/', [LoginController::class, 'loginView'])->name('login_view');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login_post');

    // register
    Route::get('/register', [LoginController::class, 'registerView'])->name('register_view');
    Route::post('/register', [LoginController::class, 'registerPost'])->name('register_post');

    // Forget Password fortgetPWd
    Route::get('/forget-password', [LoginController::class, 'forgetPWd'])->name('f_pwd_view');
    Route::post('/forgot-password-page', [LoginController::class, 'forgotPwdPost'])->name('forgotPwdPost');
    Route::get('/reset-password/{token}/email={email}', [LoginController::class, 'displayResetPasswordForm'])->name('resetGet');
    Route::post('/reset-password', [LoginController::class, 'submitResetPassword'])->name('resetPost');
});


// Only allow admin
Route::middleware(['role'])->group(function () {
    // Change Password  AppointmentsController cpPost
    Route::get('/change-pwd-page', [LoginController::class, 'cp_index'])->name('cp_page');
    Route::post('/change-pwd-page', [LoginController::class, 'cpPost'])->name('cp_post');
});

// Allow When the user was login in
Route::middleware(['auth_check'])->group(function () {

    // Home Page
    Route::get('/home', [LoginController::class, 'index'])->name('index');



    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/error-401', [LoginController::class, 'unauthorizedAccess'])->name('error_401');
