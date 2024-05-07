<?php

namespace App\Livewire\Legal;

use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    #[Title('Privacy Policy')]
    #[Layout('layouts.auth')]
    public function render()
    {
        session()->put('url.intended', route('privacypolicy'));

        $locale = session('locale', app()->getLocale());
        $privacyFile = resource_path("markdown/privacy-policy-$locale.md");
        if (! file_exists($privacyFile)) {
            $privacyFile = resource_path('markdown/privacy-policy-en.md');
        }
        $privacy = Str::markdown(file_get_contents($privacyFile));

        return view('livewire.legal.privacy-policy', compact('privacy'));
    }
}
