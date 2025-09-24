<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

// Authentication routes
Route::post('/auth/login', 'App\Http\Controllers\Auth\WebAuthController@login');
Route::post('/auth/logout', 'App\Http\Controllers\Auth\WebAuthController@logout');
Route::get('/auth/check', 'App\Http\Controllers\Auth\WebAuthController@checkAuth');
Route::post('/auth/api-token', 'App\Http\Controllers\Auth\WebAuthController@getApiToken')->middleware('dashboard.auth');

// Dashboard route
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('dashboard.auth');

Route::get('/learn/{course}', function ($course) {
    return view('learn', compact('course'));
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/pricing', function () {
    return view('pricing');
});
