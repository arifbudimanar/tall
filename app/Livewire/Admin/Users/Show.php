<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Show extends Component
{
    public User $user;

    public User $selected_user_delete;

    public bool $confirming_user_deletion = false;

    public function mount(User $user): void
    {
        $this->selected_user_delete = $user;
    }

    public function deleteUser(): void
    {
        $this->selected_user_delete->delete();
        $this->confirming_user_deletion = false;
        if ($this->selected_user_delete->id === Auth::user()->id) {
            Auth::guard('web')->logout();
            $this->redirect(session('url.intended', route('register')), navigate: true);
            if (session()->has('auth.password_confirmed_at')) {
                session()->forget('auth.password_confirmed_at');
            }
            session()->invalidate();
            session()->regenerateToken();
        }
        Toaster::success('User deleted.');
        $this->redirect(session('url.intended', route('admin.users.index')), navigate: true);
    }

    #[Layout('layouts.admin')]
    #[Title('Users Show')]
    public function render()
    {
        return view('livewire.admin.users.show');
    }
}
