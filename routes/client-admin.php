<?php

use App\Http\Controllers\ClientAdmin\AuthController;
use App\Http\Controllers\ClientAdmin\DashboardController;
use App\Http\Controllers\ClientAdmin\FundController;
use Illuminate\Support\Facades\Route;

Route::prefix('client-admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Guest Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('client-admin.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('client-admin.login.submit');

    Route::middleware('guest:client_admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Login
        |--------------------------------------------------------------------------
        */

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
| Funds
|--------------------------------------------------------------------------
*/

        Route::get('/funds', [FundController::class, 'index'])
            ->name('client-admin.funds.index');

        Route::get('/funds/create', [FundController::class, 'create'])
            ->name('client-admin.funds.create');

        Route::post('/funds/store', [FundController::class, 'store'])
            ->name('client-admin.funds.store');

        Route::get('/funds/show/{id}', [FundController::class, 'show'])
            ->name('client-admin.funds.show');

        Route::get('/funds/edit/{id}', [FundController::class, 'edit'])
            ->name('client-admin.funds.edit');

        Route::post('/funds/update/{id}', [FundController::class, 'update'])
            ->name('client-admin.funds.update');

        Route::delete('/funds/delete/{id}', [FundController::class, 'destroy'])
            ->name('client-admin.funds.delete');

        Route::get('/funds/overview', [FundController::class, 'overview'])
            ->name('client-admin.funds.overview');

        Route::get('/funds/funding-snapshot', [FundController::class, 'fundingSnapshot'])
            ->name('client-admin.funds.funding-snapshot');

        Route::get('/funds/questionnaire', [FundController::class, 'questionnaire'])
            ->name('client-admin.funds.questionnaire');

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
