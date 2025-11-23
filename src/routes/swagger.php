<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwaggerController;

Route::get('/swagger.json', [SwaggerController::class, 'docs']);
