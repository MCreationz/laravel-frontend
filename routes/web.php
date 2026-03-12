<?php

use App\Http\Controllers\API\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('role');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

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

Route::middleware(['auth:organization', 'check.onboarding'])->group(function () {

    Route::post('/logout', [AuthLoginController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

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


});
