<?php

namespace App\Livewire\Auth\Password;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Confirm extends Component
{
    public string $password;

    public function rules(): array
    {
        return [
            'password' => ['required', 'current_password'],
        ];
    }

    public function confirmPassword(): void
    {
        $this->validate();
        session()->put('auth.password_confirmed_at', time());
        Toaster::success('Password confirmed.');
        $this->redirect(session('url.intended', route('user.dashboard')), navigate: true);
    }

    #[Layout('layouts.auth')]
    #[Title('Confirm Password')]
    public function render()
    {
        if (session()->has('auth.password_confirmed_at')) {
            $this->redirect(session('url.intended', route('user.dashboard')), navigate: true);
        }

        return view('livewire.auth.password.confirm');
    }
}
