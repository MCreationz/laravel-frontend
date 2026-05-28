<?php

use App\Http\Controllers\ClientAdmin\AuthController;
use App\Http\Controllers\ClientAdmin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('client-admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Guest Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('guest:client_admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Login
        |--------------------------------------------------------------------------
        */

        Route::get('/login', [AuthController::class, 'showLoginForm'])
            ->name('client-admin.login');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('client-admin.login.submit');

    });

    /*
    |--------------------------------------------------------------------------
    | Authenticated Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth:client_admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('client-admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [DashboardController::class, 'profile'])
            ->name('client-admin.profile');

        Route::post('/profile', [DashboardController::class, 'updateProfile'])
            ->name('client-admin.profile.update');

        /*
        |--------------------------------------------------------------------------
        | Change Password
        |--------------------------------------------------------------------------
        */

        Route::get('/change-password', [DashboardController::class, 'changePassword'])
            ->name('client-admin.change-password');

        Route::post('/change-password', [DashboardController::class, 'updatePassword'])
            ->name('client-admin.change-password.update');

        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('client-admin.logout');

    });

});
