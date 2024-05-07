<div class="min-w-fit">
    {{-- Sidebar --}}
    <nav
        class="hidden w-full h-screen overflow-y-auto bg-white border-r border-zinc-200 lg:min-h-full min-w-80 lg:block dark:bg-zinc-900 dark:border-zinc-800">
        <div class="h-screen">
            {{-- Logo --}}
            <div class="flex items-center h-16 px-4 bg-white sm:px-6 lg:px-8 dark:bg-zinc-900">
                <x-logo />
            </div>

            {{-- Profile dropdown --}}
            <div class="hidden px-4 pt-4 border-t sm:px-6 lg:block border-zinc-200 dark:border-zinc-800"
                x-data="{ open: false }">
                <div class="flex justify-between w-full">
                    @include('livewire.navigation.partials.user-dropdown.admin-sidebar')
                </div>
            </div>

            <div
                class="flex flex-col justify-between w-full gap-4 px-4 py-2 bg-white sm:px-6 border-zinc-200 lg:max-w-xs dark:bg-zinc-900 lg:py-4 dark:border-zinc-800">
                {{-- Navigation --}}
                <div class="flex flex-col space-y-2">
                    <x-button.link.responsive-navigation :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :title="__('Dashboard')"
                        wire:navigate>
                        <x-slot:icon>
                            <x-icon.rectangle-stack class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.responsive-navigation>

                    <x-button.link.responsive-navigation :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" :title="__('Users')"
                        wire:navigate>
                        <x-slot:icon>
                            <x-icon.users class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.responsive-navigation>
                    {{-- <x-dropdown.navigation :title="__('Roles and Permissions')" :active="request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')">
                        <x-slot:icon>
                            <x-icon.shield-check class="w-5 h-5" />
                        </x-slot:icon>

                            <x-button.link.responsive-navigation :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')" :title="__('Roles')"
                                wire:navigate>
                                <x-slot:icon>
                                    <x-icon.shield-check class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.link.responsive-navigation>

                            <x-button.link.responsive-navigation :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.*')"
                                :title="__('Permissions')" wire:navigate>
                                <x-slot:icon>
                                    <x-icon.lock-close class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.link.responsive-navigation>
                    </x-dropdown.navigation> --}}
                </div>

                {{-- Sidebar banner --}}
                @include('livewire.navigation.partials.sidebar-banner.sponsor')
                @include('livewire.navigation.partials.sidebar-banner.becareful')
            </div>
        </div>
    </nav>

    <div x-show="open" x-cloak class="fixed inset-0 z-30 transition-all transform lg:hidden" x-on:click="open = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-zinc-100 opacity-80 dark:bg-zinc-950"></div>
    </div>

    {{-- Responsive sidebar --}}
    <nav class="fixed z-30 w-full h-screen overflow-y-auto transition-all bg-white border-r lg:hidden border-zinc-200 lg:min-h-full max-w-80 dark:bg-zinc-900 dark:border-zinc-800"
        x-show="open" x-on:click.away="open = false" x-on:close.stop="open = false"
        x-on:keydown.escape.window="open = false" x-trap.inert.noscroll.noautofocus.noreturn="open"
        x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="translate-x-[-100%]"
        x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-[-100%]" x-cloak>
        <div class="h-screen">
            {{-- Logo --}}
            <div class="flex items-center justify-between h-16 gap-2 px-4 bg-white sm:px-6 lg:px-8 dark:bg-zinc-900">
                <div class="mx-2">
                    <x-logo />
                </div>

                {{-- <x-button.muted class="relative lg:hidden" x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open side menu</span>
                    <x-icon.x class="w-5 h-5" />
                </x-button.muted> --}}

                <button
                    class="relative inline-flex items-center justify-center ml-2 sm:ml-0 text-zinc-400 hover:text-zinc-500 focus:text-indigo-400 active:hover:text-indigo-500 dark:text-zinc-500 hover:dark:text-zinc-400"
                    x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    {{-- <x-icon.bars-3 class="w-6 h-6" /> --}}
                    <x-icon.x class="w-6 h-6" x-cloak />
                </button>
            </div>

            {{-- Profile dropdown --}}
            <div class="hidden px-4 pt-4 border-t sm:px-6 lg:block border-zinc-200 dark:border-zinc-800"
                x-data="{ open: false }">
                <div class="flex justify-between w-full">
                    @include('livewire.navigation.partials.user-dropdown.admin-sidebar')
                </div>
            </div>

            <div
                class="flex flex-col justify-between w-full gap-4 px-4 py-2 bg-white sm:px-6 border-zinc-200 lg:max-w-xs dark:bg-zinc-900 lg:py-4 dark:border-zinc-800">
                {{-- Navigation --}}
                <div class="flex flex-col space-y-2">
                    <x-button.link.responsive-navigation :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :title="__('Dashboard')"
                        wire:navigate>
                        <x-slot:icon>
                            <x-icon.rectangle-stack class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.responsive-navigation>

                    <x-button.link.responsive-navigation :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" :title="__('Users')"
                        wire:navigate>
                        <x-slot:icon>
                            <x-icon.users class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.responsive-navigation>

                    {{-- <x-dropdown.navigation :title="__('Roles and Permissions')" :active="request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')">
                        <x-slot:icon>
                            <x-icon.shield-check class="w-5 h-5" />
                        </x-slot:icon>

                        <x-button.link.responsive-navigation :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')" :title="__('Roles')"
                            wire:navigate>
                            <x-slot:icon>
                                <x-icon.shield-check class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.link.responsive-navigation>

                        <x-button.link.responsive-navigation :href="route('admin.permissions.index')" :active="request()->routeIs('admin.permissions.*')" :title="__('Permissions')"
                            wire:navigate>
                            <x-slot:icon>
                                <x-icon.lock-close class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.link.responsive-navigation>
                    </x-dropdown.navigation> --}}
                </div>

                {{-- Sidebar banner --}}
                @production
                    @include('livewire.navigation.partials.sidebar-banner.becareful')
                @endproduction
            </div>
        </div>
    </nav>
</div>
