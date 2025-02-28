<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/persons/{id}', [PersonController::class, 'show']);