<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    #[Layout('layouts.admin')]
    public function render()
    {
        session()->put('url.intended', route('admin.dashboard'));

        $latest_created_users = User::latest()->take(4)->get();
        $latest_updated_users = User::whereColumn('created_at', '!=', 'updated_at')->latest('updated_at')->take(4)->get();
        $total_users = User::count();
        $total_verified_users = User::where('email_verified_at', '!=', null)->count();
        $total_unverified_users = User::where('email_verified_at', null)->count();
        $total_register_this_month = User::whereMonth('created_at', '=', now()->month)->count();

        return view('livewire.admin.dashboard', compact(
            'latest_created_users',
            'latest_updated_users',
            'total_users',
            // 'admin_role_users',
            'total_verified_users',
            'total_unverified_users',
            'total_register_this_month'
        ));
    }
}
