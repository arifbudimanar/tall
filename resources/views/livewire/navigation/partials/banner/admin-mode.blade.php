@production
    @if (session()->has('auth.password_confirmed_at'))
        <x-banner type="warning">
            {{ __('Admin mode still active.') }}
            <br class="sm:hidden">
            <span class="hidden md:inline-flex">
                {{ __('If no longer needed, please disable it.') }}
            </span>
        </x-banner>
    @endif
@endproduction
