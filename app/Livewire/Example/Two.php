<?php

namespace App\Livewire\Example;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Two extends Component
{
    public function toasterSuccess(): void
    {
        Toaster::success('Success!');
    }

    public function toasterWarning(): void
    {
        Toaster::warning('Warning!');
    }

    public function toasterError(): void
    {
        Toaster::error('Error!');
    }

    public function toasterInfo(): void
    {
        Toaster::info('Info!');
    }

    public function openUser(User $user): void
    {
        Toaster::info('User: '.$user->name.'');
    }

    #[Layout('layouts.main')]
    #[Title('Example Two')]
    public function render()
    {
        session()->put('url.intended', route('example-one'));
        $users = User::inRandomOrder()
            // ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('livewire.example.two', compact('users'));
    }
}
