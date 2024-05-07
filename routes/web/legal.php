<?php

use App\Livewire\Legal;
use Illuminate\Support\Facades\Route;

// Legal
Route::get('/terms-of-service', Legal\TermsOfService::class)
    ->name('termsofservice');
Route::get('/privacy-policy', Legal\PrivacyPolicy::class)
    ->name('privacypolicy');
