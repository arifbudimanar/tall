<x-card.auth :title="__('Request Password Reset')">
    <div class="mb-4 text-zinc-600 dark:text-zinc-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <form wire:submit="sendResetPasswordLink">
        {{-- Email --}}
        <div>
            <x-input.label for="email" :value="__('Email')" required />
            <x-input.text id="email" class="block w-full mt-1" type="email" wire:model="email" name="email" required
                autofocus autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
            <x-input.error for="email" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <x-button.primary :title="__('Send Link')" loading="sendResetPasswordLink">
                <x-slot:icon>
                    <x-icon.send class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
        </div>
    </form>
</x-card.auth>
