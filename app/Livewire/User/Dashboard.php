<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    #[Layout('layouts.app')]
    public function render()
    {
        session()->put('url.intended', route('user.dashboard'));

        return view('livewire.user.dashboard');
    }
}
