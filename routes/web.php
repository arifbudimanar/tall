<?php

use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', Livewire\Home::class)
    ->name('home');
Route::get('/example-one', Livewire\Example\One::class)
    ->name('example-one');
Route::get('/example-two', Livewire\Example\Two::class)
    ->name('example-two');

include 'web/auth.php';
include 'web/legal.php';
include 'web/user.php';
include 'web/admin.php';
