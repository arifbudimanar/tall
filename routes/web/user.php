<?php

use App\Livewire\User;
use Illuminate\Support\Facades\Route;

// User
Route::prefix('user')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', User\Dashboard::class)
            ->middleware('verified.email')
            ->name('user.dashboard');
        Route::get('/setting', User\Setting\Edit::class)
            ->middleware('verified.email')
            ->name('user.setting');
        Route::get('/profile', User\Profile\Edit::class)
            ->name('user.profile');
    });
