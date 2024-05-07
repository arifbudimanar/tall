<x-card.auth :title="__('Register')">
    <form wire:submit="register">
        {{-- Name --}}
        <div>
            <x-input.label for="name" :value="__('Name')" required />
            <x-input.text id="name" class="block w-full mt-1" type="text" wire:model="name" required name="name"
                autofocus autocomplete="name" placeholder="{{ __('Full Name') }}" />
            <x-input.error for="name" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input.label for="email" :value="__('Email')" required />
            <x-input.text id="email" class="block w-full mt-1" type="email" wire:model="email" required
                name="email" autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
            <x-input.error for="email" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" required />
            <x-input.text id="password" class="block w-full mt-1" type="password" wire:model="password" required
                name="password" autocomplete="password" placeholder="••••••••" />
            <x-input.error for="password" class="mt-2" />
        </div>

        {{-- Password confirmation --}}
        <div class="mt-4">
            <x-input.label for="password_confirmation" :value="__('Confirm Password')" required />
            <x-input.text id="password_confirmation" class="block w-full mt-1" type="password"
                wire:model="password_confirmation" required name="password_confirmation" autocomplete="password"
                placeholder="••••••••" />
            <x-input.error for="password_confirmation" class="mt-2" />
        </div>

        {{-- Terms and policy --}}
        <div class="mt-4">
            <div class="flex items-center">
                <x-input.checkbox required name="terms" id="terms"
                    wire:model="terms_of_service_and_privacy_policy" />
                <x-input.label for="terms_of_service_and_privacy_policy" class="ml-2" required>
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' =>
                            '<a target="_blank" href="' .
                            route('termsofservice') .
                            '" class="text-sm text-indigo-600 rounded-md hover:underline focus:underline dark:text-indigo-400 hover:text-indigo-70000 dark:hover:dark:text-indigo-30000 focus:text-indigo-70000 dark:focus:dark:text-indigo-30000">' .
                            __('Terms of Service') .
                            '</a>',
                        'privacy_policy' =>
                            '<a target="_blank" href="' .
                            route('privacypolicy') .
                            '" class="text-sm text-indigo-600 rounded-md hover:underline focus:underline dark:text-indigo-400 hover:text-indigo-70000 dark:hover:dark:text-indigo-30000 focus:text-indigo-70000 dark:focus:dark:text-indigo-30000">' .
                            __('Privacy Policy') .
                            '</a>',
                    ]) !!}
                </x-input.label>
            </div>
            <x-input.error for="terms_of_service_and_privacy_policy" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <div class="flex flex-col">
                <a class="text-sm rounded-md hover:underline focus:underline text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 focus:text-zinc-900 dark:focus:text-zinc-100"
                    wire:navigate href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                @if (Route::has('password.request'))
                    <a class="text-sm rounded-md hover:underline focus:underline text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 focus:text-zinc-900 dark:focus:text-zinc-100"
                        wire:navigate href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-button.primary :title="__('Register')" loading="register">
                <x-slot:icon>
                    <x-icon.arrow-in class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
        </div>
    </form>

    @if (Route::has('oauth.redirect.github') || Route::has('oauth.redirect.google'))
        <div>
            <div class="relative my-8">
                <p
                    class="absolute z-10 px-4 py-1 transform -translate-x-1/2 -translate-y-1/2 rounded-full text-zinc-500 dark:text-zinc-400 bg-zinc-200 top-1/2 left-1/2 dark:bg-zinc-700">
                    {{ __('or continue with') }}
                </p>

                <x-divider />
            </div>

            <div class="space-y-4 sm:gap-4 sm:space-y-0 sm:flex">
                @if (Route::has('oauth.redirect.github'))
                    <x-button.link.secondary :href="route('oauth.redirect.github')" title="Github" class="w-full">
                        <x-slot:icon>
                            <x-icon.github class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>
                @endif

                @if (Route::has('oauth.redirect.google'))
                    <x-button.link.secondary :href="route('oauth.redirect.google')" title="Google" class="w-full">
                        <x-slot:icon>
                            <x-icon.google class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>
                @endif
            </div>

            <div class="mt-4">
                <x-input.label for="terms_of_service_and_privacy_policy" class="text-center">
                    {!! __('By continuing, I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' =>
                            '<a target="_blank" href="' .
                            route('termsofservice') .
                            '" class="text-sm text-indigo-600 rounded-md hover:underline focus:underline dark:text-indigo-400 hover:text-indigo-70000 dark:hover:dark:text-indigo-30000 focus:text-indigo-70000 dark:focus:dark:text-indigo-30000">' .
                            __('Terms of Service') .
                            '</a>',
                        'privacy_policy' =>
                            '<a target="_blank" href="' .
                            route('privacypolicy') .
                            '" class="text-sm text-indigo-600 rounded-md hover:underline focus:underline dark:text-indigo-400 hover:text-indigo-70000 dark:hover:dark:text-indigo-30000 focus:text-indigo-70000 dark:focus:dark:text-indigo-30000">' .
                            __('Privacy Policy') .
                            '</a>',
                    ]) !!}
                </x-input.label>
            </div>
        </div>
    @endif
</x-card.auth>
