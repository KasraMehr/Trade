<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\Team\ReferralTreeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WithdrawRequestController;
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

Route::get('/privacy-policy', function () {return Inertia::render('Legal/Privacy');})->name('privacy');

Route::get('/terms-of-service', function () {return Inertia::render('Legal/Terms');})->name('terms');

Route::get('/cookie-policy', function () {return Inertia::render('Legal/Cookie');})->name('cookie');

Route::get('/GDPR', function () {return Inertia::render('Legal/GDPR');})->name('GDPR');

Route::get('/about-us', function () {return Inertia::render('AboutUs');})->name('AboutUs');

Route::get('/invest', function () {return Inertia::render('Invest');})->name('Invest');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/deposits', [DepositController::class, 'store'])->name('deposits.store');
    Route::post('/deposits/{id}/process', [DepositController::class, 'process'])->name('deposits.process');
    Route::post('/withdrawals', [WithdrawRequestController::class, 'store'])->name('withdrawals.store');
    Route::post('/withdrawals/{id}/process', [WithdrawRequestController::class, 'process'])->name('withdrawals.process');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/team/referral-tree', [ReferralTreeController::class, 'index'])->name('team.referral-tree');

});
