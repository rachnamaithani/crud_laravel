<?php

use App\Http\Controllers\API\V1\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('projects', [ProjectController::class, 'index']);

Route::post('/save-projects', [ProjectController::class, 'store']);
