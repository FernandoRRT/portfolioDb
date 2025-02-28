<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;

Route::get('/persons/{id}', [PersonController::class, 'show']);
Route::apiResource('persons', PersonController::class)->except(['show']);

Route::prefix('persons/{person}')->group(function () {
    Route::apiResource('contacts', ContactController::class)->except(['index', 'show']);
    Route::apiResource('education', EducationController::class)->except(['index', 'show']);
});