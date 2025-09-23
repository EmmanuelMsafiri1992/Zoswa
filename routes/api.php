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

// Certificates API
Route::prefix('certificates')->group(function () {
    Route::get('/verify/{verificationCode}', [App\Http\Controllers\Api\CertificateController::class, 'verify']);

    Route::middleware('auth:api')->group(function () {
        Route::get('/', [App\Http\Controllers\Api\CertificateController::class, 'index']);
        Route::get('/{certificate}', [App\Http\Controllers\Api\CertificateController::class, 'show']);
        Route::post('/generate/{course}', [App\Http\Controllers\Api\CertificateController::class, 'generate']);
        Route::get('/{certificate}/download', [App\Http\Controllers\Api\CertificateController::class, 'download']);
        Route::put('/{certificate}/revoke', [App\Http\Controllers\Api\CertificateController::class, 'revoke'])->middleware('role:admin');
    });
});

// Users API
Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\UserController::class, 'index'])->middleware('role:admin');
    Route::get('/{user}', [App\Http\Controllers\Api\UserController::class, 'show']);
    Route::put('/{user}', [App\Http\Controllers\Api\UserController::class, 'update']);
    Route::delete('/{user}', [App\Http\Controllers\Api\UserController::class, 'destroy'])->middleware('role:admin');
});

// Students API (Admin only)
Route::middleware('auth:api')->prefix('students')->group(function () {
    Route::get('/{studentId}/subscriptions', [App\Http\Controllers\Api\UserController::class, 'getStudentSubscriptions'])->middleware('role:admin');
    Route::get('/{studentId}/certificates', [App\Http\Controllers\Api\UserController::class, 'getStudentCertificates'])->middleware('role:admin');
});

// Admin API
Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::post('/certificates/generate', [App\Http\Controllers\Api\UserController::class, 'generateCertificateForStudent'])->middleware('role:admin');
});

// PayPal API
Route::middleware('auth:api')->prefix('paypal')->group(function () {
    Route::post('/create-order', [App\Http\Controllers\Api\PayPalController::class, 'createOrder']);
    Route::post('/capture-order', [App\Http\Controllers\Api\PayPalController::class, 'captureOrder']);
    Route::get('/settings', [App\Http\Controllers\Api\PayPalController::class, 'getSettings']);
    Route::post('/settings', [App\Http\Controllers\Api\PayPalController::class, 'updateSettings']);
});

// Support Requests API
Route::prefix('support-requests')->group(function () {
    // Public route for submitting support requests
    Route::post('/', [App\Http\Controllers\Api\SupportRequestController::class, 'store']);

    // Public route for getting supported countries
    Route::get('/countries', [App\Http\Controllers\Api\SupportRequestController::class, 'getSupportedCountries']);

    // Admin-only routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/', [App\Http\Controllers\Api\SupportRequestController::class, 'index'])->middleware('role:admin');
        Route::get('/stats', [App\Http\Controllers\Api\SupportRequestController::class, 'getStats'])->middleware('role:admin');
        Route::get('/{supportRequest}', [App\Http\Controllers\Api\SupportRequestController::class, 'show'])->middleware('role:admin');
        Route::put('/{supportRequest}', [App\Http\Controllers\Api\SupportRequestController::class, 'update'])->middleware('role:admin');
        Route::delete('/{supportRequest}', [App\Http\Controllers\Api\SupportRequestController::class, 'destroy'])->middleware('role:admin');
    });
});