<?php

use App\Http\Controllers\SuperAdmin\ApplicationController;
use App\Http\Controllers\SuperAdmin\Auth\LoginController;
use App\Http\Controllers\SuperAdmin\CompanyController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\FundingCategoryController;
use App\Http\Controllers\SuperAdmin\ProjectController;
use App\Http\Controllers\SuperAdmin\SectorController;
use App\Http\Controllers\SuperAdmin\SettingsController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('super-admin')
    ->name('superadmin.')
    ->group(function () {
        // Login form
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

        // Login submission
        Route::post('login', [LoginController::class, 'login'])->name('login.submit');

        // Logout
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });

Route::prefix('super-admin')
    ->as('superadmin.')
    ->middleware(['auth', 'superadmin'])
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Applications
        |--------------------------------------------------------------------------
        */
        Route::get('/applications', [ApplicationController::class, 'index'])
            ->name('applications.index');

        Route::get('/applications/create', [ApplicationController::class, 'create'])
            ->name('applications.create');

        Route::post('/applications', [ApplicationController::class, 'store'])
            ->name('applications.store');

        Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])
            ->name('applications.edit');

        Route::put('/applications/{application}', [ApplicationController::class, 'update'])
            ->name('applications.update');

        Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])
            ->name('applications.destroy');

        /*
        |--------------------------------------------------------------------------
        | Sectors
        |--------------------------------------------------------------------------
        */
        Route::get('/sectors', [SectorController::class, 'index'])
            ->name('sectors.index');

        Route::get('/sectors/create', [SectorController::class, 'create'])
            ->name('sectors.create');

        Route::post('/sectors', [SectorController::class, 'store'])
            ->name('sectors.store');

        Route::get('/sectors/{sector}/edit', [SectorController::class, 'edit'])
            ->name('sectors.edit');

        Route::put('/sectors/{sector}', [SectorController::class, 'update'])
            ->name('sectors.update');

        Route::delete('/sectors/{sector}', [SectorController::class, 'destroy'])
            ->name('sectors.destroy');

        /*
        |--------------------------------------------------------------------------
        | Companies
        |--------------------------------------------------------------------------
        */
        Route::get('/companies', [CompanyController::class, 'index'])
            ->name('companies.index');

        Route::get('/companies/create', [CompanyController::class, 'create'])
            ->name('companies.create');

        Route::post('/companies', [CompanyController::class, 'store'])
            ->name('companies.store');

        Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])
            ->name('companies.edit');

        Route::put('/companies/{company}', [CompanyController::class, 'update'])
            ->name('companies.update');

        Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])
            ->name('companies.destroy');

        Route::get('companies/{company}/assign-admin', [CompanyController::class, 'assignAdmin'])
            ->name('companies.assign_admin');

        Route::put('companies/{company}/update-admin', [CompanyController::class, 'updateAdmin'])
            ->name('companies.update_admin');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');

        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::resource('funding-categories', FundingCategoryController::class);

        Route::get('/settings', [SettingsController::class, 'index'])
            ->name('settings');
        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */
            Route::resource('projects', ProjectController::class);

    });
