<?php

namespace App\Livewire\User\Profile;

use App\Models\User;
use Cjmellor\BrowserSessions\Facades\BrowserSessions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    public ?User $user;

    public string $name;

    public string $email;

    #[On('profileUpdated')]
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateProfileRules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
        ];
    }

    public function updateProfileMessages(): array
    {
        return [
            'name.regex' => __('The name may only contain letters and spaces.'),
        ];
    }

    public function updateProfile(): void
    {
        $this->validate(
            $this->updateProfileRules(), $this->updateProfileMessages()
        );
        if ($this->email !== $this->user->email) {
            $this->user->forceFill([
                'email_verified_at' => null,
            ])->save();
            session()->forget('auth.password_confirmed_at');
        }
        if ($this->name === $this->user->name && $this->email === $this->user->email) {
            Toaster::info('Nothing changed.');

            return;
        }
        $this->user->update([
            'name' => Str::title($this->name),
            'email' => $this->email,
        ]);
        Toaster::success('Profile updated.');
        $this->dispatch('profileUpdated');
    }

    public function sendEmailVerification(): void
    {
        $this->user->sendEmailVerificationNotification();
        Toaster::success('A new verification link has been sent to your email address.');
    }

    public function removeGithubAccount(): void
    {
        $this->user->update([
            'github_id' => null,
            'github_name' => null,
            'github_token' => null,
            'github_refresh_token' => null,
        ]);
        Toaster::success('Disconnected Github account.');
    }

    public function removeGoogleAccount(): void
    {
        $this->user->update([
            'google_id' => null,
            'google_name' => null,
            'google_token' => null,
            'google_refresh_token' => null,
        ]);
        Toaster::success('Disconnected Google account.');
    }

    public string $current_password;

    public string $new_password;

    public string $new_password_confirmation;

    public function updatePasswordRules(): array
    {
        return [
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'different:current_password', Password::defaults()],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ];
    }

    public function updatePassword(): void
    {
        $this->validate(
            $this->updatePasswordRules()
        );
        $this->user->update([
            'password' => Hash::make($this->new_password),
        ]);
        $this->reset('current_password', 'new_password', 'new_password_confirmation');
        Toaster::success('Password updated.');
    }

    public bool $confirming_user_deletion = false;

    public string $password;

    public function updatedConfirmingUserDeletion(): void
    {
        $this->resetErrorBag();
        $this->reset('password');
    }

    public function deleteAccountRules(): array
    {
        return [
            'password' => ['required', 'current_password'],
        ];
    }

    public function deleteUser(): void
    {
        $this->validate(
            $this->deleteAccountRules()
        );
        $this->confirming_user_deletion = false;
        Auth::guard('web')->logout();
        if (session()->has('auth.password_confirmed_at')) {
            session()->forget('auth.password_confirmed_at');
        }
        session()->invalidate();
        session()->regenerateToken();
        $this->user->delete();
        $this->reset(
            'user',
        );
        if (config('session.driver') === 'file') {
            $this->deleteSessionFiles();
        }
        Toaster::success('Account deleted.');
        $this->redirect(session('url.intended', route('register')), navigate: true);
    }

    public function deleteSessionFiles(): Collection
    {
        return collect(glob(
            storage_path('framework/sessions/*')
        ))->each(function (string $file) {
            if (Str::contains(file_get_contents($file), Auth::id())) {
                unlink($file);
            }
        });
    }

    public bool $confirming_logout_other_browser_sessions = false;

    public function updatedConfirmingLogoutOtherBrowserSessions(): void
    {
        $this->resetErrorBag();
        $this->reset('password');
    }

    public function deleteLogoutRules(): array
    {
        return [
            'password' => ['required', 'current_password'],
        ];
    }

    public function logoutOtherBrowserSessions(): void
    {
        $this->validate(
            $this->deleteLogoutRules()
        );
        $user = Auth::user();
        $user->setRememberToken(null);
        $user->save();
        $sessions = DB::table('sessions')
            ->where('user_id', $user->id)
            ->get();
        $sessions->each(function ($session) {
            if ($session->id !== Session::getId()) {
                Session::getHandler()->destroy($session->id);
            }
        });
        Session::regenerate($destroy = true);
        $this->confirming_logout_other_browser_sessions = false;
        $this->redirect(route('user.profile'), navigate: true);
        Toaster::success('Other browser sessions logged out.');
    }

    #[Title('Profile')]
    #[Layout('layouts.app')]
    public function render()
    {
        session()->put('url.intended', route('user.profile'));
        $sessions = json_decode(json_encode(
            BrowserSessions::sessions()
        ));

        return view('livewire.user.profile.edit', compact('sessions'));
    }
}
