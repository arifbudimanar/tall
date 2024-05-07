<?php

namespace App\Livewire\Legal;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TermsOfService extends Component
{
    #[Title('Terms of Service')]
    #[Layout('layouts.auth')]
    public function render()
    {
        session()->put('url.intended', route('termsofservice'));

        $locale = session('locale', app()->getLocale());
        $termsFile = resource_path("markdown/terms-of-service-$locale.md");
        if (! file_exists($termsFile)) {
            $termsFile = resource_path('markdown/terms-of-service-en.md');
        }
        $terms = Str::markdown(file_get_contents($termsFile));

        return view('livewire.legal.terms-of-service', compact('terms'));
    }
}
