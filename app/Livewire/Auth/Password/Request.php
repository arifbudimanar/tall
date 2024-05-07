<?php

namespace App\Livewire\Auth\Password;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Request extends Component
{
    public string $email;

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }

    public function sendResetPasswordLink(): void
    {
        $this->validate();
        $response = Password::broker()->sendResetLink(['email' => $this->email]);
        if ($response == Password::RESET_LINK_SENT) {
            $this->reset('email');
            Toaster::success($response);

            return;
        }
        $this->addError('email', __($response));
    }

    #[Layout('layouts.auth')]
    #[Title('Request Password Reset')]
    public function render()
    {
        return view('livewire.auth.password.request');
    }
}
