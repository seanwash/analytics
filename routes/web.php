<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackPageviewController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware([RedirectIfAuthenticated::class])
    ->group(function () {
        Route::get('/signin', [AuthenticatedSessionController::class, 'create'])->name('authenticated-session.create');
        Route::post('/signin', [AuthenticatedSessionController::class, 'store'])->name('authenticated-session.store');
    });

Route::resource('websites', WebsiteController::class)->only('index', 'show');

Route::get('/t/{website}', TrackPageviewController::class)->name('pageview.track');
