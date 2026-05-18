<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ContactInquiryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Public Routes
    Route::post('user/register', [AuthController::class, 'register']);
    Route::post('user/login', [AuthController::class, 'login']);

    Route::post('/contact-us', [ContactInquiryController::class, 'store']);
    Route::get('/contact-us', [ContactInquiryController::class, 'index']);

    // Protected Routes using Sanctum
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);

        Route::prefix('company')->group(function () {
            // Register a new company
            Route::post('/register', [CompanyController::class, 'register']);

            // Add a user to a specific company
            Route::post('/{company}/add-user', [CompanyController::class, 'addUserToCompany']);

            // Get all users of a specific company
            Route::get('/{company}/users', [CompanyController::class, 'getUsers']);
        });

    });

});
