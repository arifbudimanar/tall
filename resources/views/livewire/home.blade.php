<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Home')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        @auth
            <x-card.app :title="__('Welcome to :appname', ['appname' => config('app.name')])">
                <x-slot:description>
                    {{ __('You are logged in as :name.', ['name' => auth()->user()->name]) }}
                </x-slot:description>
            </x-card.app>
        @endauth

        <x-card.app :title="config('app.name', 'Laravel')"
            description="{{ __('A TALL Stack boilerplate with minimalist design, ready to boost your web app development journey.') }}">
            <x-slot:actions>
                <x-button.link.secondary href="https://github.com/sponsors/arifbudimanar" target="_blank" title="Sponsor">
                    <x-slot:icon>
                        <x-icon.heart class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.secondary>
            </x-slot:actions>

            <x-slot:content>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 2xl:grid-cols-4 sm:gap-6">
                    <x-card.stat title="Styling" stat="Tailwind CSS" href="https://tailwindcss.com/" openNewTab="true" />
                    <x-card.stat title="Interactivity" stat="Alpine JS" href="https://alpinejs.dev/"
                        openNewTab="true" />
                    <x-card.stat title="Framework" stat="Laravel" href="https://laravel.com/" openNewTab="true" />
                    <x-card.stat title="Reactivity" stat="Livewire" href="https://livewire.laravel.com/"
                        openNewTab="true" />
                </div>
                <div class="justify-between mt-4 text-sm sm:flex">
                    @env('local')
                    <div class="text-zinc-500 dark:text-zinc-400">
                        {{ __('Local environment.') }}
                    </div>
                    @endenv
                    @env('production')
                    <div class="text-zinc-500 dark:text-zinc-400">
                        {{ __('Production environment.') }}
                    </div>
                    @endenv
                    @env('staging')
                    <div class="text-zinc-500 dark:text-zinc-400">
                        {{ __('Staging environment.') }}
                    </div>
                    @endenv
                    <div class="text-zinc-500 dark:text-zinc-400">
                        Laravel {{ \Composer\InstalledVersions::getPrettyVersion('laravel/framework') }} -
                        Livewire {{ \Composer\InstalledVersions::getPrettyVersion('livewire/livewire') }} -
                        PHP v{{ PHP_VERSION }}
                    </div>
                </div>
            </x-slot:content>
        </x-card.app>

        <x-card.app :title="__('Built In Laravel Package')">
            <x-slot:content>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                    <x-card.stat title="OAuth" stat="Laravel Socialite" href="https://laravel.com/docs/10.x/socialite"
                        openNewTab="true" />
                    {{-- <x-card.stat title="Role and Permission" stat="Spatie Permission"
                        href="https://spatie.be/docs/laravel-permission/" openNewTab="true" class="lg:col-span-2" /> --}}
                    <x-card.stat title="Toaster" stat="Livewire Toaster"
                        href="https://github.com/masmerise/livewire-toaster" openNewTab="true" />
                    <x-card.stat title="Debuger" stat="Laravel Debugbar"
                        href="https://github.com/barryvdh/laravel-debugbar" openNewTab="true" />
                    <x-card.stat title="IDE Helper" stat="Laravel IDE Helper"
                        href="https://github.com/barryvdh/laravel-ide-helper" openNewTab="true" />
                    <x-card.stat title="Testing" stat="PEST" href="https://pestphp.com/" openNewTab="true" />
                    <x-card.stat title="Session Manager" stat="Browser Sessions"
                        href="https://github.com/cjmellor/browser-sessions" openNewTab="true" class="lg:col-span-2" />
                    <x-card.stat title="Translation" stat="Laravel Lang" href="https://github.com/Laravel-Lang/lang"
                        openNewTab="true" />
                    {{-- <x-card.stat title="Translation Checker" stat="Laravel Translations Checker"
                        href="https://github.com/LarsWiegers/laravel-translations-checker" openNewTab="true"
                        class="sm:col-span-2" /> --}}
                </div>
            </x-slot:content>
        </x-card.app>

        <x-card.app :title="__('Built In Tailwind Plugin')">
            <x-slot:content>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6">
                    <x-card.stat stat="Typography" href="https://tailwindcss.com/docs/typography-plugin"
                        openNewTab="true" />
                    <x-card.stat stat="Forms" href="https://tailwindcss.com/docs/forms" openNewTab="true" />
                </div>
            </x-slot:content>
        </x-card.app>
    </div>
</div>
