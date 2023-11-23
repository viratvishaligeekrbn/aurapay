<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UsersController;

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('check_username', 'check_username')->name('check_username');
    Route::post('register_me', 'register_me')->name('register_me');
    Route::get('login', 'login')->name('login');
    Route::post('login_me', 'login_me')->name('login_me');
});

Route::group(['middleware' => ['auth:users'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
    Route::controller(UsersController::class)->group(function () {
        Route::get('add_user', 'create')->name('add_user');
        Route::get('admin', 'admin')->name('admin');
        Route::post('store', 'store')->name('store');
    });
});
