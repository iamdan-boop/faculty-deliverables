<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\DashboardCardsController;
use App\Http\Controllers\Dashboard\LogsController;
use App\Http\Controllers\Dashboard\SendItemController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Livewire\SendItems;
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

// login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login']);

// register
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');


// forgot 
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

// reset-password
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::put('/reset-password', [ForgotPasswordController::class, 'update'])->name('password.update');


// dashboard
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    

    Route::get('/', [DashboardCardsController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');

    Route::get('/senditems', [SendItems::class, 'render'])->name('senditem');
    Route::post('/senditems', [SendItemController::class, 'addItem'])->name('senditem.addItems');


    Route::get('/logs', [LogsController::class, 'index'])->name('logs');
});
