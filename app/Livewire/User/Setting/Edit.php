<?php

namespace App\Livewire\User\Setting;

use App;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    public string $current_language;

    public string $language;

    public array $supported_languages;

    public function mount(): void
    {
        $this->current_language = app()->getLocale();
        $this->language = $this->current_language;
        $this->supported_languages = config('translation.supported_translations');
    }

    public function applyLanguage(): void
    {
        $this->validate([
            'language' => 'required|in:'.implode(',', array_column($this->supported_languages, 'code')),
        ]);

        if ($this->language == $this->current_language) {
            Toaster::info('Nothing changed.');
        } else {
            session(['locale' => $this->language]);
            App::setLocale($this->language);
            // app()->setLocale($this->language);
            Toaster::success('Language applied.');
            $this->redirect(route('user.setting'), navigate: true);
        }
    }

    #[Title('Setting')]
    #[Layout('layouts.app')]
    public function render()
    {
        session()->put('url.intended', route('user.setting'));

        return view('livewire.user.setting.edit');
    }
}
