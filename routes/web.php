<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::view('/privacy-policy', 'legal.privacy')->name('privacy');
Route::view('/terms-of-service', 'legal.terms')->name('terms');

Route::get('/privacy-policy', function () {
    return Inertia::render('Legal/Privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return Inertia::render('Legal/Terms');
})->name('terms');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('AboutUs');

Route::get('/invest', function () {
    return Inertia::render('Invest');
})->name('Invest');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
