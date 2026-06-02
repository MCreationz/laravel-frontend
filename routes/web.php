<?php

use App\Http\Controllers\API\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OrganizationFunderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectApplication\QuestionController;
use App\Http\Controllers\ProjectApplication\SeniorManagementController;
use App\Http\Controllers\ProjectApplication\DocumentController;
use App\Http\Controllers\ProjectApplication\FinancialDocumentController;
use App\Http\Controllers\ProjectApplication\AwardRecognitionController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('role');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Step 1: Ask user to choose organization type
Route::get('/organization-type', function () {
    return view('auth.organization-type');
})->name('organization.type');

// Step 2: Store selected organization type in session
Route::post('/organization-type', function (Request $request) {
    $request->validate([
        'organization_type' => 'required|in:fund_seeker,funder',
    ]);

    // Store in session for now
    session([
        'organization_type' => $request->organization_type,
    ]);

    // Redirect to normal register page
    return redirect()->route('register');
})->name('organization.type.store');

// Register page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify.otp');

Route::post('/register-step-1', [RegisterController::class, 'registerStepOne'])
    ->name('register.step1');

Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])
    ->name('verify.otp.submit');

Route::post('/resend-otp', [RegisterController::class, 'resendOtp'])->name('resend.otp');

Route::get('/login', [AuthLoginController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthLoginController::class, 'loginWithPassword'])->name('login.password');

Route::get('/login/email', [AuthLoginController::class, 'showOtpEmail'])->name('login.otp.email');

Route::post('/login/send-otp', [AuthLoginController::class, 'sendLoginOtp'])->name('login.otp.send');

Route::get('/login/otp', [AuthLoginController::class, 'showOtpForm'])->name('login.otp');

Route::post('/login/verify-otp', [AuthLoginController::class, 'verifyLoginOtp'])->name('login.otp.verify');

Route::post('/logout', [AuthLoginController::class, 'logout'])
    ->name('logout');

Route::middleware(['check.onboarding', 'auth:organization'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/onboarding/step-1', [OnboardingController::class, 'stepOne'])
        ->name('onboarding.step1');

    Route::post('/onboarding/step-1', [OnboardingController::class, 'storeStepOne'])
        ->name('onboarding.step1.store');

    Route::get('/onboarding/step-2', [OnboardingController::class, 'stepTwo'])
        ->name('onboarding.step2');

    Route::post('/onboarding/step-2', [OnboardingController::class, 'storeStepTwo'])
        ->name('onboarding.step2.store');

    Route::get('/onboarding/step-3', [OnboardingController::class, 'stepThree'])
        ->name('onboarding.step3');

    Route::post('/onboarding/step-3', [OnboardingController::class, 'storeStepThree'])
        ->name('onboarding.step3.store');

    // routes/web.php
Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');

Route::get('/projects/{id}/details', [ProjectController::class, 'details'])
    ->name('projects.details');

});

Route::prefix('projects/{fund}/apply')
    ->name('projects.apply.')
    ->group(function () {

        // Step 1
        Route::get('/questions', [QuestionController::class, 'index'])
            ->name('questions');

        // Step 2
        Route::get('/senior-management', [SeniorManagementController::class, 'index'])
            ->name('senior-management');

        // Step 3
        Route::get('/documents', [DocumentController::class, 'index'])
            ->name('documents');

        // Step 4
        Route::get('/financial-documents', [FinancialDocumentController::class, 'index'])
            ->name('financial-documents');

        // Step 5
        Route::get('/awards-recognition', [AwardRecognitionController::class, 'index'])
            ->name('awards-recognition');
    });




Route::post('/funders/store', [OrganizationFunderController::class, 'store'])
    ->name('funders.store');

Route::get('/funders', [OrganizationFunderController::class, 'index'])
    ->name('funders.index');

// add funder

// update funder
Route::put('/funders/{id}', [OrganizationFunderController::class, 'update'])
    ->name('funders.update');

// delete funder
Route::delete('/funders/{id}', [OrganizationFunderController::class, 'destroy'])
    ->name('funders.destroy');
