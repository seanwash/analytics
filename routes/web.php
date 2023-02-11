<?php

use App\Http\Controllers\TrackPageviewController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
});

Route::resource('websites', WebsiteController::class)->only('index', 'show');

Route::get('/t/{website}', TrackPageviewController::class)->name('pageview.track');
