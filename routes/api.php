<?php

use App\Http\Controllers\TimeLogController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/timerecorder', [TimeLogController::class, 'timeRecorder']);

Route::get('/getlogs/{user}', [UserController::class, 'getLogs']);
