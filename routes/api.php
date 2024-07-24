<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Admin\AdminController;




Route::post('register', [UserController::class, 'register']);

// Route::post('verify-otp/{email}', [UserController::class, 'verifyOTP']);

Route::post('verify-otp/{identifier}', [UserController::class, 'verifyOTP']);

Route::post('login', [UserController::class, 'login']);

Route::post('/profile_update/{id}',[UserController::class,'profile_update']);

Route::get('hello', [UserController::class, 'hello']);