<?php

use Illuminate\Support\Facades\Route;


// Default rate limit (60 req/60 sec)
Route::middleware('rate.limiter')->group(function () {
    Route::get('/example', function () {
        return response()->json(['message' => 'Rate limited endpoint (default: 60 req/60 sec)']);
    });
});

// Custom rate limit (10 req/30 sec)
Route::middleware('rate.limiter:10,30')->group(function () {
    Route::get('/limited', function () {
        return response()->json(['message' => 'Custom rate limited endpoint (10 req/30 sec)']);
    });
});

// Custom rate limit (5 req/120 sec)
Route::middleware('rate.limiter:5,120')->group(function () {
    Route::get('/slow', function () {
        return response()->json(['message' => 'Custom rate limited endpoint (5 req/120 sec)']);
    });
});

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/profile', function () {
        return response()->json(['message' => 'JWT Authenticated endpoint']);
    });
});

Route::middleware(['static.token'])->group(function () {
    Route::get('/secure', function () {
        return response()->json(['message' => 'Static token authenticated endpoint']);
    });
});
