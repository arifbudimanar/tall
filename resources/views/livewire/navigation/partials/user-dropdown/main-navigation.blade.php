<x-dropdown>
    <x-slot:title>
        <div class="text-sm truncate text-zinc-700 dark:text-zinc-300">
            {{ Auth::user()->name }}
        </div>

        <div class="text-xs truncate text-zinc-600 dark:text-zinc-400">
            {{ Auth::user()->email }}
        </div>
    </x-slot:title>
    <x-slot:trigger>
        <x-button.muted class="flex items-center">
            {{ Auth::user()->first_name }}
            <span>
                <x-icon.chevron-down x-show="!open" class="ml-2 -mr-0.5 w-5 h-5" />

                <x-icon.chevron-up x-show="open" x-cloak class="ml-2 -mr-0.5 w-5 h-5" />
            </span>
        </x-button.muted>
    </x-slot:trigger>

    <x-slot:content>
        {{-- Dropdown navigation --}}
        <x-dropdown.category divider="false" :title="__('Navigation')" />

        <x-dropdown.link :href="route('user.dashboard')" :title="__('User Dashboard')" wire:navigate>
            <x-slot:icon>
                <x-icon.rectangle-stack class="w-5 h-5" />
            </x-slot:icon>
        </x-dropdown.link>

        <x-dropdown.link :href="route('admin.dashboard')" :title="__('Admin Dashboard')" wire:navigate>
            <x-slot:icon>
                <x-icon.rectangle-stack class="w-5 h-5" />
            </x-slot:icon>
        </x-dropdown.link>

        {{-- Account Management --}}
        <x-dropdown.category :title="__('Manage Account')" />

        <x-dropdown.link :href="route('user.profile')" :title="__('Profile')" wire:navigate>
            <x-slot:icon>
                <x-icon.user class="w-5 h-5" />
            </x-slot:icon>
        </x-dropdown.link>

        <x-dropdown.link :href="route('user.setting')" :title="__('Settings')" wire:navigate>
            <x-slot:icon>
                <x-icon.adjustments-horizontal class="w-5 h-5" />
            </x-slot:icon>
        </x-dropdown.link>

        {{-- Authentication --}}
        <x-dropdown.category :title="__('Authentication')" />

        @if (session()->has('auth.password_confirmed_at'))
            <x-dropdown.button type="warning" :title="__('Disable Admin Mode')" wire:click="disableAdminMode">
                <x-slot:icon>
                    <x-icon.no-symbol class="w-5 h-5" />
                </x-slot:icon>
            </x-dropdown.button>
        @endif

        <x-dropdown.button :title="__('Logout')" wire:click="logout">
            <x-slot:icon>
                <x-icon.arrow-out class="w-5 h-5" />
            </x-slot:icon>
        </x-dropdown.button>
    </x-slot:content>
</x-dropdown>
