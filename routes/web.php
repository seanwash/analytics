<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackPageviewController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('websites', WebsiteController::class)
    ->only('index', 'show')
    ->middleware('auth.basic');

Route::get('/t/{website}', TrackPageviewController::class)->name('pageview.track');
