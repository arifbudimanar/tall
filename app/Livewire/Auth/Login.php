<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;

    public bool $remember = false;

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function login(): void
    {
        $this->validate();
        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', __('auth.failed'));

            return;
        }
        $this->redirect(session('url.intended', route('user.dashboard')), navigate: true);
    }

    #[Title('Login')]
    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
