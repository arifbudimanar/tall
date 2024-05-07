<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\OAuth;
use App\Livewire\Auth;
use Illuminate\Support\Facades\Route;

// Authentication
Route::middleware('guest')
    ->group(function () {
        Route::get('/login', Auth\Login::class)
            ->name('login');
        Route::get('/register', Auth\Register::class)
            ->name('register');
        Route::get('/password/request', Auth\Password\Request::class)
            ->name('password.request');
        Route::get('/password/reset/{token}', Auth\Password\Reset::class)
            ->name('password.reset');
        Route::get('/password/create', Auth\Password\Create::class)
            ->name('password.create');
    });

// OAuth
Route::get('oauth/redirect/github', [OAuth\SocialiteController::class, 'redirectGithub'])
    ->name('oauth.redirect.github');
Route::get('oauth/callback/github', [OAuth\SocialiteController::class, 'callbackGithub'])
    ->name('oauth.callback.github');
// Route::get('oauth/redirect/google', [OAuth\SocialiteController::class, 'redirectGoogle'])
//     ->name('oauth.redirect.google');
// Route::get('oauth/callback/google', [OAuth\SocialiteController::class, 'callbackGoogle'])
//     ->name('oauth.callback.google');

// Authorization
Route::middleware('auth')
    ->group(function () {
        Route::get('/email/verify', Auth\Verify::class)
            ->middleware('throttle:6,1')
            ->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware('signed')
            ->name('verification.verify');
        Route::get('/password/confirm', Auth\Password\Confirm::class)
            ->middleware('verified.email')
            ->name('password.confirm');
    });
