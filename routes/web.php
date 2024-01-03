<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'viewHomePage')->middleware('auth')->name('home.page');
    Route::get('/login', 'viewLoginPage')->name('login.page');
    Route::get('/register', 'viewRegisterPage')->name('register.page');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login.user');
    Route::post('/register', 'register')->name('register.user');
});
