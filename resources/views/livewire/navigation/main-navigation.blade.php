<nav class="fixed z-20 w-full bg-white border-b dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800"
    x-data="{ open: false }" x-on:click.away="open = false" x-on:close.stop="open = false">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center sm:hidden">
                {{-- Mobile menu button --}}
                {{-- <x-button.muted class="relative ml-2" x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <x-icon.bars-3-bottom-left class="w-5 h-5"
                        x-bind:class="{ 'hidden': open, 'inline-flex': !open }" />
                    <x-icon.x class="w-5 h-5" x-cloak x-bind:class="{ 'hidden': !open, 'inline-flex': open }" />
                </x-button.muted> --}}

                <button
                    class="relative inline-flex items-center justify-center ml-2 sm:ml-0 text-zinc-400 hover:text-zinc-500 focus:text-indigo-400 active:hover:text-indigo-500 dark:text-zinc-500 hover:dark:text-zinc-400"
                    x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <x-icon.bars-3 class="w-6 h-6" x-bind:class="{ 'hidden': open, 'inline-flex': !open }" />
                    <x-icon.x class="w-6 h-6" x-cloak x-bind:class="{ 'hidden': !open, 'inline-flex': open }" />
                </button>
            </div>

            <div class="flex items-center justify-start flex-1 ml-4 sm:ml-0 sm:items-stretch">
                {{-- Logo --}}
                <div class="flex items-center flex-shrink-0 sm:mr-6">
                    <x-logo />
                </div>

                {{-- Navigation --}}
                <div class="hidden sm:-my-px sm:block">
                    <div class="flex space-x-2">
                        <x-button.link.navigation :href="route('home')" :active="request()->routeIs('home')" :title="__('Home')" wire:navigate>
                            <x-slot:icon>
                                <x-icon.home class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.link.navigation>

                        {{-- <x-button.link.navigation :href="route('example-one')" :active="request()->routeIs('example')" :title="__('Example')" wire:navigate>
                            <x-slot:icon>
                                <x-icon.globe-alt class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.link.navigation> --}}

                        <x-dropdown align="left">
                            <x-slot:trigger>
                                <x-button.navigation type="button" class="flex items-center" :active="request()->routeIs('example-one') || request()->routeIs('example-two')">
                                    <span>
                                        <x-icon.chevron-down x-show="!open" class="mr-2 -ml-0.5 w-5 h-5" />

                                        <x-icon.chevron-up x-show="open" x-cloak class="mr-2 -ml-0.5 w-5 h-5" />
                                    </span>
                                    {{ __('Example') }}
                                </x-button.navigation>
                            </x-slot:trigger>

                            <x-slot:content>
                                <div class="block px-4 py-2">
                                    <div class="text-sm truncate text-zinc-700 dark:text-zinc-300">
                                        {{ __('Others') }}
                                    </div>
                                </div>
                                <x-dropdown.link :href="route('example-one')" :title="__('Example One')" wire:navigate>
                                    <x-slot:icon>
                                        <x-icon.globe-alt class="w-5 h-5" />
                                    </x-slot:icon>
                                </x-dropdown.link>
                                <x-dropdown.link :href="route('example-two')" :title="__('Example Two')" wire:navigate>
                                    <x-slot:icon>
                                        <x-icon.globe-alt class="w-5 h-5" />
                                    </x-slot:icon>
                                </x-dropdown.link>
                                <x-dropdown.link href="/example-3" :title="__('404')" wire:navigate>
                                    <x-slot:icon>
                                        <x-icon.globe-alt class="w-5 h-5" />
                                    </x-slot:icon>
                                </x-dropdown.link>
                            </x-slot:content>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                {{-- Profile dropdown --}}
                <div class="relative ml-3" x-data="{ open: false }">
                    @auth
                        <div class="mr-2 sm:mr-0">
                            @include('livewire.navigation.partials.user-dropdown.main-navigation')
                        </div>
                    @else
                        <div class="flex mr-2 space-x-2 sm:mr-0">
                            <x-button.link.muted :href="route('login')" :title="__('Login')" wire:navigate>
                                <x-slot:icon>
                                    <x-icon.arrow-in class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.link.muted>

                            <x-button.link.secondary :href="route('register')" :title="__('Register')" class="hidden lg:flex"
                                wire:navigate>
                                <x-slot:icon>
                                    <x-icon.arrow-in class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.link.secondary>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile menu, show/hide based on menu state. --}}
    <div class="z-10 sm:hidden" id="mobile-menu" x-show="open" x-on:keydown.escape.window="open = false"
        x-collapse.duration.300ms x-cloak>
        {{-- Mobile navigation --}}
        <div class="px-4 my-4 space-y-2 sm:my-6 sm:px-6">
            <x-button.link.responsive-navigation :href="route('home')" :active="request()->routeIs('home')" :title="__('Home')" wire:navigate>
                <x-slot:icon>
                    <x-icon.home class="w-5 h-5" />
                </x-slot:icon>
            </x-button.link.responsive-navigation>

            {{-- <x-button.link.responsive-navigation :href="route('example-one')" :active="request()->routeIs('example')" :title="__('Example')" wire:navigate>
                <x-slot:icon>
                    <x-icon.globe-alt class="w-5 h-5" />
                </x-slot:icon>
            </x-button.link.responsive-navigation> --}}

            <x-dropdown.navigation :title="__('Example')" :active="request()->routeIs('example-one') || request()->routeIs('example-two')">
                <x-slot:icon>
                    <x-icon.globe-alt class="w-5 h-5" />
                </x-slot:icon>

                <x-button.link.responsive-navigation :href="route('example-one')" :active="request()->routeIs('example-one')" :title="__('Example One')"
                    wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.responsive-navigation>
                <x-button.link.responsive-navigation :href="route('example-two')" :active="request()->routeIs('example-two')" :title="__('Example Two')"
                    wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.responsive-navigation>
                <x-button.link.responsive-navigation href="/example-3" :title="__('404')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.responsive-navigation>
            </x-dropdown.navigation>
        </div>
    </div>
</nav>
