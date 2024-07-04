<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Create extends Component
{
    public ?string $name;

    public ?string $email;

    public ?string $github_id;

    public ?string $github_name;

    public ?string $github_username;

    public ?string $github_token;

    public ?string $github_refresh_token;

    public ?string $google_id;

    public ?string $google_name;

    public ?string $google_token;

    public ?string $google_refresh_token;

    public string $password;

    public string $password_confirmation;

    public bool $terms_of_service_and_privacy_policy = false;

    public function mount(): void
    {
        $this->name = request()->query('name');
        $this->email = request()->query('email');
        $this->github_id = request()->query('github_id');
        $this->github_name = request()->query('github_name');
        $this->github_username = request()->query('github_username');
        $this->github_token = request()->query('github_token');
        $this->github_refresh_token = request()->query('github_refresh_token');
        $this->google_id = request()->query('google_id');
        $this->google_name = request()->query('google_name');
        $this->google_token = request()->query('google_token');
        $this->google_refresh_token = request()->query('google_refresh_token');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'github_id' => ['nullable'],
            'github_name' => ['nullable'],
            'github_username' => ['nullable'],
            'github_token' => ['nullable'],
            'github_refresh_token' => ['nullable'],
            'google_id' => ['nullable'],
            'google_name' => ['nullable'],
            'google_token' => ['nullable'],
            'google_refresh_token' => ['nullable'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:255', 'same:password'],
            'terms_of_service_and_privacy_policy' => ['required', 'accepted'],
        ];
    }

    public function createPassword(): void
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'github_id' => $this->github_id ?? null,
            'github_name' => $this->github_name ?? null,
            'github_username' => $this->github_username ?? null,
            'github_token' => $this->github_token ?? null,
            'github_refresh_token' => $this->github_refresh_token ?? null,
            'google_id' => $this->google_id ?? null,
            'google_name' => $this->google_name ?? null,
            'google_token' => $this->google_token ?? null,
            'google_refresh_token' => $this->google_refresh_token ?? null,
            'password' => Hash::make($this->password),
        ]);
        Auth::guard('web')->login($user, true);
        Auth::user()->markEmailAsVerified();
        if (! empty($this->github_id)) {
            Toaster::success('Github account registered.');
        }
        if (! empty($this->google_id)) {
            Toaster::success('Google account registered.');
        }
        $this->redirect(route('user.dashboard'), navigate: true);
    }

    #[Layout('layouts.auth')]
    #[Title('Create Password')]
    public function render()
    {
        if (empty($this->name) && empty($this->email)) {
            $this->redirect(session('url.intended', route('register')), navigate: true);
        }

        return view('livewire.auth.password.create');
    }
}
