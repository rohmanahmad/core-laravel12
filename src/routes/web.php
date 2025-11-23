<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\ShowLoginFormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ShowRegisterFormController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ShowForgotPasswordFormController;
use App\Http\Controllers\Auth\SendResetLinkEmailController;
use App\Http\Controllers\Auth\ShowOtpFormController;
use App\Http\Controllers\Auth\ConfirmOtpController;


Route::middleware('rate.limiter')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Auth routes (single-action controllers)
    Route::get('/login', ShowLoginFormController::class)->name('login');
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/register', ShowRegisterFormController::class)->name('register');
    Route::post('/register', RegisterController::class);

    Route::get('/forgot-password', ShowForgotPasswordFormController::class)->name('password.request');
    Route::post('/forgot-password', SendResetLinkEmailController::class)->name('password.email');

    Route::get('/otp-confirmation', ShowOtpFormController::class)->name('otp.form');
    Route::post('/otp-confirmation', ConfirmOtpController::class)->name('otp.confirm');
});
