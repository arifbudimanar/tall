<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

// Admin
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth', 'verified.email', 'password.confirm')
    ->group(function () {
        Route::get('/dashboard', Admin\Dashboard::class)
            ->name('dashboard');
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('/', Admin\Users\Index::class)
                    ->name('index');
                Route::get('/create', Admin\Users\Create::class)
                    ->name('create');
                Route::get('/{user}/edit', Admin\Users\Edit::class)
                    ->name('edit');
                Route::get('/{user}', Admin\Users\Show::class)
                    ->name('show');
            });
    });
