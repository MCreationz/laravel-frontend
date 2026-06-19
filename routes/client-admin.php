<?php

use App\Http\Controllers\ClientAdmin\ApplicantController;
use App\Http\Controllers\ClientAdmin\AuthController;
use App\Http\Controllers\ClientAdmin\DashboardController;
use App\Http\Controllers\ClientAdmin\FundController;
use App\Http\Controllers\ClientAdmin\FundDocumentController;
use App\Http\Controllers\ClientAdmin\FundQuestionnaireController;
use App\Http\Controllers\ClientAdmin\FundThemeController;
use App\Http\Controllers\ClientAdmin\ReviewerController;
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

        Route::post('/funds/overview', [FundController::class, 'storeOverview'])
            ->name('client-admin.funds.overview.store');

        Route::get('/funds/funding-snapshot', [FundController::class, 'fundingSnapshot'])
            ->name('client-admin.funds.funding-snapshot');

        Route::post('/funds/funding-snapshot', [FundController::class, 'storeFundingSnapshot'])
            ->name('client-admin.funds.funding-snapshot.store');

        Route::get('/funds/questionnaire', [FundController::class, 'questionnaire'])
            ->name('client-admin.funds.questionnaire');

        Route::post('/funds/questionnaire', [FundController::class, 'storeQuestionnaire'])
            ->name('client-admin.funds.questionnaire.store');


            Route::get('/client-admin/reviewers', [ReviewerController::class, 'index'])
    ->name('client-admin.reviewers.index');

Route::post('/client-admin/reviewers/store', [ReviewerController::class, 'store'])
    ->name('client-admin.reviewers.store');

Route::post('/client-admin/reviewers/{reviewer}/update', [ReviewerController::class, 'update'])
    ->name('client-admin.reviewers.update');

Route::post('/client-admin/reviewers/{reviewer}/delete', [ReviewerController::class, 'destroy'])
    ->name('client-admin.reviewers.delete');
Route::post('/reviewers/assign-funds', [ReviewerController::class, 'assignFunds'])
    ->name('client-admin.reviewers.assign-funds');
        /*
        |--------------------------------------------------------------------------
        | Fund Themes
        |--------------------------------------------------------------------------
        */

        Route::get('/fund-themes', [FundThemeController::class, 'index'])
            ->name('client-admin.fund-themes.index');

        Route::post('/fund-themes/store', [FundThemeController::class, 'store'])
            ->name('client-admin.fund-themes.store');

        Route::get('/fund-themes/show/{id}', [FundThemeController::class, 'show'])
            ->name('client-admin.fund-themes.show');

        Route::get('/fund-themes/edit/{id}', [FundThemeController::class, 'edit'])
            ->name('client-admin.fund-themes.edit');

        Route::put('/fund-themes/update/{id}', [FundThemeController::class, 'update'])
            ->name('client-admin.fund-themes.update');

        Route::delete('/fund-themes/delete/{id}', [FundThemeController::class, 'destroy'])
            ->name('client-admin.fund-themes.destroy');

        Route::get('/fund-documents', [FundDocumentController::class, 'index'])
            ->name('client-admin.fund-documents.index');

        Route::post('/fund-documents/store', [FundDocumentController::class, 'store'])
            ->name('client-admin.fund-documents.store');

        Route::get('/fund-documents/show/{id}', [FundDocumentController::class, 'show'])
            ->name('client-admin.fund-documents.show');

        Route::get('/fund-documents/edit/{id}', [FundDocumentController::class, 'edit'])
            ->name('client-admin.fund-documents.edit');

        Route::put('/fund-documents/update/{id}', [FundDocumentController::class, 'update'])
            ->name('client-admin.fund-documents.update');

        Route::delete('/fund-documents/delete/{id}', [FundDocumentController::class, 'destroy'])
            ->name('client-admin.fund-documents.destroy');

        Route::get('/fund-questionnaires', [FundQuestionnaireController::class, 'index'])
            ->name('client-admin.fund-questionnaires.index');

        Route::post('/fund-questionnaires/store', [FundQuestionnaireController::class, 'store'])
            ->name('client-admin.fund-questionnaires.store');

        Route::get('/fund-questionnaires/show/{id}', [FundQuestionnaireController::class, 'edit'])
            ->name('client-admin.fund-questionnaires.show');

        Route::get('/fund-questionnaires/edit/{id}', [FundQuestionnaireController::class, 'edit'])
            ->name('client-admin.fund-questionnaires.edit');

        Route::put('/fund-questionnaires/update/{id}', [FundQuestionnaireController::class, 'update'])
            ->name('client-admin.fund-questionnaires.update');

        Route::delete('/fund-questionnaires/delete/{id}', [FundQuestionnaireController::class, 'destroy'])
            ->name('client-admin.fund-questionnaires.destroy');

        /*
|--------------------------------------------------------------------------
| Applicants
|--------------------------------------------------------------------------
*/

        Route::get('/applicants', [ApplicantController::class, 'index'])
            ->name('client-admin.applicants.index');

        Route::get('/applicants/create', [ApplicantController::class, 'create'])
            ->name('client-admin.applicants.create');

        Route::post('/applicants', [ApplicantController::class, 'store'])
            ->name('client-admin.applicants.store');

        Route::get('/applicants/{id}/edit', [ApplicantController::class, 'edit'])
            ->name('client-admin.applicants.edit');

        Route::put('/applicants/{id}', [ApplicantController::class, 'update'])
            ->name('client-admin.applicants.update');

        Route::delete('/applicants/{id}', [ApplicantController::class, 'destroy'])
            ->name('client-admin.applicants.destroy');

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
