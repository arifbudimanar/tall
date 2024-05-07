<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'sortby', history: false, keep: true)]
    public string $sort_field = 'created_at';

    #[Url(as: 'sortdir', history: false, keep: true)]
    public string $sort_direction = 'desc';

    #[Url(as: 'search', history: false, keep: true)]
    public string $search = '';

    #[Url(as: 'paginate', history: false, keep: true)]
    public int $paginate = 10;

    #[Url(as: 'roleid', history: false, keep: false)]
    public string $role_id = '';

    #[Url(as: 'emailstatus', history: false, keep: false)]
    public string $email_status = '';

    public function sortBy(string $field): void
    {
        if ($this->sort_field === $field) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_direction = 'asc';
        }
        $this->sort_field = $field;
        $this->resetPage();
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function mount()
    {
        if (! in_array($this->paginate, [5, 8, 10, 12, 15, 20])) {
            $this->redirect(route('admin.users.index'), navigate: true);
        }
        if (! in_array($this->sort_field, ['id', 'name', 'email', 'created_at'])) {
            $this->redirect(route('admin.users.index'), navigate: true);
        }
        if (! in_array($this->sort_direction, ['asc', 'desc'])) {
            $this->redirect(route('admin.users.index'), navigate: true);
        }
    }

    public function updatedPaginate(): void
    {
        $this->resetPage();
    }

    public function updatedRoleId(): void
    {
        $this->resetPage();
    }

    public function updatedEmailStatus(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->reset('search');
        $this->resetPage();
    }

    public bool $confirming_user_deletion = false;

    public ?User $selected_user_delete;

    public function confirmUserDeletion(User $user): void
    {
        $this->confirming_user_deletion = true;
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
    }

    public function getCurrentPage(): int
    {
        return Paginator::resolveCurrentPage();
    }

    public function clearFilters(): void
    {
        $this->reset([
            'paginate',
            'email_status',
        ]);
        $this->resetPage();
    }

    #[Computed]
    public function users(): Paginator|LengthAwarePaginator
    {
        return User::query()
            ->orderBy($this->sort_field, $this->sort_direction)
            ->when($this->search, function ($query) {
                return $query->search($this->search);
            })
            ->when($this->email_status, function ($query) {
                return $query->where('email_verified_at', $this->email_status === 'verified' ? '!=' : '=', null);
            })
            ->paginate($this->paginate);
        // ->simplePaginate($this->paginate);
    }

    public bool $select_page = false;

    public bool $select_all = false;

    public array $selected = [];

    public function updatedSelected(): void
    {
        $this->reset(
            'select_all',
            'select_page'
        );
    }

    public function updatedSelectPage(): void
    {
        if ($this->select_page) {
            $this->reset('select_all');
            $this->selected = $this->users->pluck('id')->map(fn (string $id) => (string) $id)->toArray();
        } else {
            $this->reset('selected');
        }
    }

    public function selectAll(): void
    {
        $this->select_all = true;
        $this->selected = User::search($this->search)
            ->orderBy($this->sort_field, $this->sort_direction)
            // ->when($this->role_id, function (object $query) {
            //     return $query->whereHas('roles', function (object $query) {
            //         return $query->where('id', $this->role_id);
            //     });
            // })
            ->when($this->email_status, function (object $query) {
                return $query->where('email_verified_at', $this->email_status === 'verified' ? '!=' : '=', null);
            })
            ->pluck('id')
            ->map(fn (string $id) => (string) $id)
            ->toArray();
    }

    public function deselectAll(): void
    {
        $this->reset(
            'select_all',
            'selected',
            'select_page'
        );
    }

    public function deleteSelected(): void
    {
        User::destroy($this->selected);
        if (in_array(Auth::user()->id, $this->selected)) {
            Auth::guard('web')->logout();
            if (session()->has('auth.password_confirmed_at')) {
                session()->forget('auth.password_confirmed_at');
            }
            session()->invalidate();
            session()->regenerateToken();
            $this->redirect(session('url.intended', route('register')), navigate: true);
        }
        if ($this->select_all) {
            $this->reset(
                'paginate',
                'email_status',
                'search',
                'sort_field',
                'sort_direction',
            );
            $this->resetPage();
        }
        $this->reset(
            'select_all',
            'selected',
            'select_page',
            'confirming_users_deletion'
        );
        Toaster::success('Selected users deleted.');
    }

    public bool $confirming_users_deletion = false;

    public function confirmUsersDeletion(): void
    {
        $this->confirming_users_deletion = true;
    }

    // public function assignRole(string $role_id): void
    // {
    //     $role = Role::find($role_id);
    //     if ($role) {
    //         User::whereIn('id', $this->selected)->get()->each->assignRole($role);
    //         Toaster::success('Selected users assigned to :role_name role.', [
    //             'role_name' => __(Str::ucfirst($role->name)).' : '.$role->guard_name,
    //         ]);
    //     }
    // }

    // public function removeRole(string $role_id): void
    // {
    //     $role = Role::find($role_id);
    //     if ($role) {
    //         User::whereIn('id', $this->selected)->get()->each->removeRole($role);
    //         Toaster::success('Selected users removed from :role_name role.', [
    //             'role_name' => __(Str::ucfirst($role->name)).' : '.$role->guard_name,
    //         ]);
    //     }
    // }

    #[Layout('layouts.admin')]
    #[Title('Users Index')]
    public function render(): View
    {
        session()->put('url.intended', route('admin.users.index',
            [
                'sortdir' => $this->sort_direction,
                'sortby' => $this->sort_field,
                'search' => $this->search,
                'paginate' => $this->paginate,
                'page' => $this->getCurrentPage(),
                'emailstatus' => $this->email_status,
            ]
        ));

        // $roles = Role::all();

        return view('livewire.admin.users.index', [
            'users' => $this->users,
            // 'roles' => $roles,
        ]);
    }
}
