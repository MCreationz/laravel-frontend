<?php

use App\Http\Controllers\API\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscoverFundController;
use App\Http\Controllers\MyApplicationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\OrganizationDocumentController;
use App\Http\Controllers\OrganizationFunderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectApplication\AwardRecognitionController;
use App\Http\Controllers\ProjectApplication\DocumentController;
use App\Http\Controllers\ProjectApplication\FinancialDocumentController;
use App\Http\Controllers\ProjectApplication\QuestionController;
use App\Http\Controllers\ProjectApplication\SeniorManagementController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
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
Route::get('/forgot-password', [AuthLoginController::class, 'forgotPassword'])
    ->name('forgot.password');

Route::post('/forgot-password', [AuthLoginController::class, 'sendResetLink'])
    ->name('forgot.password.send');

Route::get('/reset-password/{token}', [AuthLoginController::class, 'showResetForm'])
    ->name('password.reset.form');

Route::post('/reset-password', [AuthLoginController::class, 'resetPassword'])
    ->name('password.reset');

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

    Route::prefix('notifications')
        ->name('notifications.')
        ->group(function () {

            Route::get('/', [NotificationController::class, 'index'])
                ->name('index');

            Route::get('/unread-count', [NotificationController::class, 'unreadCount'])
                ->name('unread-count');

            Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])
                ->name('read');

            Route::post('/read-all', [NotificationController::class, 'markAllAsRead'])
                ->name('read-all');

            Route::delete('/{id}', [NotificationController::class, 'destroy'])
                ->name('delete');
        });

    // routes/web.php
    Route::get('/projects', [ProjectController::class, 'index'])
        ->name('projects.index');

    Route::get('/projects/{id}/details', [ProjectController::class, 'details'])
        ->name('projects.details');

    Route::get('/my-applications', [MyApplicationController::class, 'index'])
        ->name('my-applications.index');

    Route::get('/discover-funds', [DiscoverFundController::class, 'index'])
        ->name('discover.funds.index');

    // list documents
    Route::get('/organization-documents', [OrganizationDocumentController::class, 'index'])
        ->name('organization.documents.index');

    // store document
    Route::post('/organization-documents', [OrganizationDocumentController::class, 'store'])
        ->name('organization.documents.store');

    Route::post('/organization-documents/{id}', [OrganizationDocumentController::class, 'update'])
        ->name('organization.documents.update');

    Route::delete('/organization-documents/{id}', [OrganizationDocumentController::class, 'destroy'])
        ->name('organization.documents.destroy');

    Route::prefix('profile')
        ->name('profile.')
        ->group(function () {

            Route::get('/', [ProfileController::class, 'show'])
                ->name('show');

            Route::post('/update', [ProfileController::class, 'updateProfile'])
                ->name('update');

            Route::post('/avatar', [ProfileController::class, 'updateAvatar'])
                ->name('avatar.update');
        });

    Route::prefix('settings')
        ->name('settings.')
        ->group(function () {

            Route::get('/', [SettingController::class, 'show'])
                ->name('show');

            Route::post('/password', [SettingController::class, 'updatePassword'])
                ->name('password.update');
        });

});

Route::prefix('projects/{fund}/apply')
    ->name('projects.apply.')
    ->group(function () {

        // Step 1
        Route::get('/questions', [QuestionController::class, 'index'])
            ->name('questions');

        Route::post('/questions', [QuestionController::class, 'store'])
            ->name('questions.store');

        // Step 2
        Route::get('/senior-management', [SeniorManagementController::class, 'index'])
            ->name('senior-management');

        Route::post('/senior-management', [SeniorManagementController::class, 'store'])
            ->name('senior-management.store');

        Route::put('/senior-management/{management}', [SeniorManagementController::class, 'update'])
            ->name('senior-management.update');

        Route::delete('/senior-management/{management}', [SeniorManagementController::class, 'destroy'])
            ->name('senior-management.destroy');
        // Step 3
        // Step 3 - Documents
        Route::get('/documents/npo', [DocumentController::class, 'npo'])
            ->name('documents.npo');

        Route::post('/documents/npo', [DocumentController::class, 'storeNpo'])
            ->name('documents.npo.store');

        Route::get('/documents/startup', [DocumentController::class, 'startup'])
            ->name('documents.startup');

        Route::post('/documents/startup', [DocumentController::class, 'storeStartup'])
            ->name('documents.startup.store');

        // Step 4 - Financial Documents
        Route::get('/financial-documents', [FinancialDocumentController::class, 'index'])
            ->name('financial-documents');

        Route::post('/financial-documents', [FinancialDocumentController::class, 'store'])
            ->name('financial-documents.store');

        // Step 5
        Route::get('/awards-recognition', [AwardRecognitionController::class, 'index'])
            ->name('awards-recognition');
        Route::post('/awards-recognition', [AwardRecognitionController::class, 'store'])
            ->name('awards-recognition.store');

        Route::put('/awards-recognition/{awardRecognition}', [AwardRecognitionController::class, 'update'])
            ->name('awards-recognition.update');

        Route::delete('/awards-recognition/{awardRecognition}', [AwardRecognitionController::class, 'destroy'])
            ->name('awards-recognition.destroy');

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
