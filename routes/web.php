<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
})->middleware('role');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Register page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
})->name('verify.otp');