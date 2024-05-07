<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    public User $user;

    public string $name;

    public string $email;

    public function mount(User $user): void
    {
        $this->name = $user->name;
        $this->email = $user->email;
        // $this->user_roles = $user->roles->pluck('id')->toArray();
        // $this->user_permissions = $user->getAllPermissions()->pluck('id')->toArray();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => __('The name may only contain letters and spaces.'),
        ];
    }

    public function updateUser(): void
    {
        $this->validate();
        if ($this->email !== $this->user->email) {
            $this->user->timestamps = false;
            $this->user->forceFill([
                'email_verified_at' => null,
            ])->save();
        }
        if ($this->name === $this->user->name && $this->email === $this->user->email) {
            Toaster::info('Nothing changed.');

            return;
        }
        $this->user->timestamps = false;
        $this->user->update([
            'name' => Str::title($this->name),
            'email' => $this->email,
        ]);
        Toaster::success('User edited.');
        $this->redirect(session('url.intended', route('admin.users.show', $this->user)), navigate: true);
    }

    public function cancelEdit(): void
    {
        $this->redirect(session('url.intended', route('admin.users.show', $this->user)), navigate: true);
    }

    // public array $user_roles;

    // public function toggleRole(Role $role): void
    // {
    //     if ($this->user->hasRole($role)) {
    //         $this->user->removeRole($role);
    //         Toaster::info('Role removed.');
    //     } else {
    //         $this->user->assignRole($role);
    //         Toaster::success('Role assigned.');
    //     }
    //     $this->user_roles = $this->user->roles->pluck('id')->toArray();
    //     $this->user_permissions = $this->user->getAllPermissions()->pluck('id')->toArray();
    // }

    // public array $user_permissions;

    // public function togglePermission(Permission $permission): void
    // {
    //     if ($this->user->hasDirectPermission($permission)) {
    //         $this->user->revokePermissionTo($permission);
    //         Toaster::info('Permission removed.');
    //     } elseif ($this->user->hasPermissionTo($permission)) {
    //         Toaster::info('Permission assigned through role.');
    //     } else {
    //         $this->user->givePermissionTo($permission);
    //         Toaster::success('Permission assigned.');
    //     }
    //     $this->user_permissions = $this->user->getAllPermissions()->pluck('id')->toArray();
    //     $this->user_roles = $this->user->roles->pluck('id')->toArray();
    // }

    #[Layout('layouts.admin')]
    #[Title('Users Edit')]
    public function render()
    {
        return view('livewire.admin.users.edit');
    }
}
