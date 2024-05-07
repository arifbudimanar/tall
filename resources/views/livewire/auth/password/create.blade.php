<x-card.auth :title="__('Create Password')">
    <div class="mb-4 text-zinc-600 dark:text-zinc-400">
        {{ __('Please complete your account by creating a password. This will allow you to login using your email and password in the future.') }}
    </div>

    <form wire:submit="createPassword">
        {{-- Password --}}
        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" required />
            <x-input.text id="password" class="block w-full mt-1" type="password" wire:model="password" name="password"
                required autocomplete="new-password" placeholder="••••••••" />
            <x-input.error for="password" class="mt-2" />
        </div>

        {{-- Password confirmation --}}
        <div class="mt-4">
            <x-input.label for="password_confirmation" :value="__('Password Confirmation')" required />
            <x-input.text id="password_confirmation" class="block w-full mt-1" type="password"
                wire:model="password_confirmation" name="password_confirmation" required autocomplete="new-password"
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

        <div class="flex items-center mt-4">
            <x-button.primary :title="__('Create')" loading="createPassword">
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
        </div>
    </form>
</x-card.auth>
