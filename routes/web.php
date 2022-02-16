<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UploadItemController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    // login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'store']);
    // register
    Route::post('/register', [RegisterController::class, 'store'])->name('register.user');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    // forgot 
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    // reset-password
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    Route::put('/reset-password', [ForgotPasswordController::class, 'update'])->name('password.update');
});


// dashboard

Route::group(['middleware' => ['auth']], function () {

    // admin
    Route::group([
        'middleware' => ['is_admin'],
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
        Route::get('/dashboard', [App\Http\Controllers\Dashboard\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'sendpackage'], function () {
            Route::post('/upload', [UploadItemController::class, 'store'])->name('senditem.upload');
            Route::get('/', [App\Http\Controllers\Dashboard\Admin\SendPackageController::class, 'index'])->name('sendpackage');
            Route::post('/', [App\Http\Controllers\Dashboard\Admin\SendPackageController::class, 'store'])->name('sendpackage.save');
        });

        Route::get('/logs', [App\Http\Controllers\Dashboard\Admin\LogsController::class, 'index'])->name('logs');

        Route::group(['prefix' => 'pending-packages', 'as' => 'pending.'], function () {
            Route::post('/upload', [UploadItemController::class, 'store'])->name('senditem.upload');
            Route::get('/{id}', [App\Http\Controllers\Dashboard\Admin\PendingPackageController::class, 'edit'])->name('packages');
            Route::put('/{id}', [App\Http\Controllers\Dashboard\Admin\PendingPackageController::class, 'update'])->name('receive.package');
            Route::delete('/{id}', [App\Http\Controllers\Dashboard\Admin\PendingPackageController::class, 'destroy'])->name('delete.package');
        });

        // Route::post('/upload', [UploadItemController::class, 'store'])->name('senditem.upload');

        Route::group(['prefix' => 'users'], function () {
            Route::view('/', 'dashboard.users')->name('users');
            Route::get('/search', [Users::class, 'show'])->name('users.search');
            Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\Admin\UsersController::class, 'edit'])->name('users.edit');
            Route::put('/edit/{id}', [App\Http\Controllers\Dashboard\Admin\UsersController::class, 'update'])->name('users.update');
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', [SettingsController::class, 'index'])->name('settings');
            Route::put('/updateInfo', [SettingsController::class, 'updateInfo'])->name('settings.personal');
            Route::put('/updatePassword', [SettingsController::class, 'updatePassword'])->name('settings.password');
        });
    });



    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function () {
        Route::get('/dashboard', [App\Http\Controllers\Dashboard\User\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logs', [App\Http\Controllers\Dashboard\User\LogsController::class, 'index'])->name('logs');

        Route::post('/upload', [UploadItemController::class, 'store'])->name('senditem.upload');


        Route::group(['prefix' => 'pending-packages', 'as' => 'pending.'], function () {
            Route::post('/upload', [UploadItemController::class, 'store'])->name('senditem.upload');
            Route::get('/{id}', [App\Http\Controllers\Dashboard\User\PendingPackageController::class, 'edit'])->name('packages');
            Route::put('/{id}', [App\Http\Controllers\Dashboard\User\PendingPackageController::class, 'update'])->name('receive.package');
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', [SettingsController::class, 'index'])->name('settings');
            Route::put('/updateInfo', [SettingsController::class, 'updateInfo'])->name('settings.personal');
            Route::put('/updatePassword', [SettingsController::class, 'updatePassword'])->name('settings.password');
        });
    });




    Route::post('/logout', [App\Http\Controllers\Dashboard\Admin\DashboardController::class, 'destroy'])->name('logout');
});
