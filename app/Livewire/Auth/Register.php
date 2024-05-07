<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Register extends Component
{
    public string $name;

    public string $email;

    public string $password;

    public string $password_confirmation;

    public bool $terms_of_service_and_privacy_policy = false;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
            'terms_of_service_and_privacy_policy' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => __('The name may only contain letters and spaces.'),
        ];
    }

    public function register(): void
    {
        $this->validate();
        $user = User::create([
            'email' => $this->email,
            'name' => Str::title($this->name),
            'password' => Hash::make($this->password),
        ]);
        event(new Registered($user));
        Auth::login($user, true);
        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            Toaster::success('A verification link has been sent to your email address.');
        }
        $this->redirect(route('user.dashboard'), navigate: true);
    }

    #[Title('Register')]
    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
