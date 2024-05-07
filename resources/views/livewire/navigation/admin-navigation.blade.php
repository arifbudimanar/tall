<nav
    class="fixed z-20 w-full bg-white border-b border-zinc-200 lg:hidden lg:w-full dark:bg-zinc-900 dark:border-zinc-800">
    <div class="px-2 sm:px-4">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center lg:block">
                {{-- Side menu button --}}
                {{-- <x-button.muted class="relative ml-2" x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close side menu</span>
                    <x-icon.bars-3-bottom-left class="w-5 h-5" />
                </x-button.muted> --}}

                <button
                    class="relative inline-flex items-center justify-center ml-2 text-zinc-400 hover:text-zinc-500 focus:text-indigo-400 active:hover:text-indigo-500 dark:text-zinc-500 hover:dark:text-zinc-400"
                    x-on:click="open = ! open">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <x-icon.bars-3 class="w-6 h-6" />
                </button>
            </div>

            <div class="flex items-center justify-start flex-1 ml-4 lg:ml-0 sm:items-stretch">
                {{-- Logo --}}
                <div class="flex items-center flex-shrink-0 lg:hidden">
                    <x-logo />
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                {{-- Profile dropdown --}}
                <div class="relative ml-3">
                    <div class="mr-2 sm:mr-2">
                        @include('livewire.navigation.partials.user-dropdown.admin-navigation')
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
