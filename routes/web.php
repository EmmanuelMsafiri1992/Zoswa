<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

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
