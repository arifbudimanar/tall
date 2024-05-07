<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Create extends Component
{
    public string $name;

    public string $email;

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => __('The name may only contain letters and spaces.'),
        ];
    }

    public function createUser(): void
    {
        $this->validate();
        User::create([
            'name' => Str::title($this->name),
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);
        Toaster::success('User created.');
        $this->redirect(session('url.intended', route('admin.users.index')), navigate: true);
    }

    public function cancelCreate(): void
    {
        $this->redirect(session('url.intended', route('admin.users.index')), navigate: true);
    }

    #[Layout('layouts.admin')]
    #[Title('Users Create')]
    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
