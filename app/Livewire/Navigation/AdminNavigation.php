<?php

namespace App\Livewire\Navigation;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminNavigation extends Component
{
    public function disableAdminMode(): void
    {
        session()->forget('auth.password_confirmed_at');
        $this->redirect(session('url.intended', route('user.dashboard')), navigate: true);
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();
        $this->redirect(session('url.intended', route('login')), navigate: true);
        if (session()->has('auth.password_confirmed_at')) {
            session()->forget('auth.password_confirmed_at');
        }
        session()->invalidate();
        session()->regenerateToken();
    }

    public function render()
    {
        return view('livewire.navigation.admin-navigation');
    }
}
