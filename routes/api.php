<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ContactInquiryController;
use App\Http\Controllers\API\FundAuthController;
use App\Http\Controllers\API\FundController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Public
    Route::get('/funds', [FundController::class, 'index']);

    // Uses existing organization session
    Route::middleware('web')->group(function () {

        Route::get('/auth/status', [
            FundAuthController::class,
            'status'
        ]);

        Route::middleware('auth:organization')->group(function () {
            Route::get('/funds/{id}', [
                FundController::class,
                'show'
            ]);
            Route::post('/auth/logout', [
                FundAuthController::class,
                'logout'
            ])->middleware('auth:organization');
        });
    });

    // Existing APIs
    Route::post('user/register', [AuthController::class, 'register']);
    Route::post('user/login', [AuthController::class, 'login']);

    Route::post('/contact-us', [
        ContactInquiryController::class,
        'store'
    ]);

    Route::get('/contact-us', [
        ContactInquiryController::class,
        'index'
    ]);
});
