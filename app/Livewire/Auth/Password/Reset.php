<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Reset extends Component
{
    public string $token;

    public string $email;

    public string $password;

    public string $password_confirmation;

    public function mount(): void
    {
        $this->email = request()->query('email', '');
    }

    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', PasswordRule::defaults()],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function resetPassword(): void
    {
        $this->validate();
        $response = Password::broker()->reset([
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password,
        ], function (User $user, string $password) {
            $user->password = Hash::make($password);
            $user->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
            // Auth::guard()->login($user);
        });
        if ($response == Password::PASSWORD_RESET) {
            Toaster::success($response);
            $this->redirect(route('login'), navigate: true);
            // $this->redirect(route('user.dashboard'), navigate: true);
        }
        $this->addError('email', __($response));
    }

    #[Layout('layouts.auth')]
    #[Title('Reset Password')]
    public function render()
    {
        return view('livewire.auth.password.reset');
    }
}
