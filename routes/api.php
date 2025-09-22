<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [AuthController::class, 'profile']);
        Route::put('profile', [AuthController::class, 'updateProfile']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Courses API
Route::prefix('courses')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\CourseController::class, 'index']);
    Route::get('/{course}', [App\Http\Controllers\Api\CourseController::class, 'show']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\CourseController::class, 'store'])->middleware('role:instructor,admin');
        Route::put('/{course}', [App\Http\Controllers\Api\CourseController::class, 'update'])->middleware('role:instructor,admin');
        Route::delete('/{course}', [App\Http\Controllers\Api\CourseController::class, 'destroy'])->middleware('role:instructor,admin');
    });
});

// CodeLabs API
Route::prefix('codelabs')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\CodeLabController::class, 'index']);
    Route::get('/{codeLab}', [App\Http\Controllers\Api\CodeLabController::class, 'show']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/', [App\Http\Controllers\Api\CodeLabController::class, 'store'])->middleware('role:instructor,admin');
        Route::put('/{codeLab}', [App\Http\Controllers\Api\CodeLabController::class, 'update'])->middleware('role:instructor,admin');
        Route::delete('/{codeLab}', [App\Http\Controllers\Api\CodeLabController::class, 'destroy'])->middleware('role:instructor,admin');
        Route::post('/{codeLab}/execute', [App\Http\Controllers\Api\CodeLabController::class, 'execute']);
    });
});

// Subscriptions API
Route::middleware('auth:api')->prefix('subscriptions')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\SubscriptionController::class, 'index']);
    Route::post('/', [App\Http\Controllers\Api\SubscriptionController::class, 'store']);
    Route::get('/{subscription}', [App\Http\Controllers\Api\SubscriptionController::class, 'show']);
    Route::delete('/{subscription}', [App\Http\Controllers\Api\SubscriptionController::class, 'destroy']);
    Route::get('/check/{course}', [App\Http\Controllers\Api\SubscriptionController::class, 'checkSubscription']);
});

// PayPal API
Route::middleware('auth:api')->prefix('paypal')->group(function () {
    Route::post('/create-order', [App\Http\Controllers\Api\PayPalController::class, 'createOrder']);
    Route::post('/capture-order', [App\Http\Controllers\Api\PayPalController::class, 'captureOrder']);
    Route::get('/settings', [App\Http\Controllers\Api\PayPalController::class, 'getSettings']);
    Route::post('/settings', [App\Http\Controllers\Api\PayPalController::class, 'updateSettings']);
});