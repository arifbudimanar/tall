<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title('Home')]
    #[Layout('layouts.main')]
    public function render()
    {
        session()->put('url.intended', route('home'));

        return view('livewire.home');
    }
}
