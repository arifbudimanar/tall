<x-card.auth :title="__('Confirm Password')">
    <div class="mb-4 text-zinc-600 dark:text-zinc-400">
        {{ __('Please confirm your password before continuing.') }}
    </div>

    <form wire:submit="confirmPassword">
        {{-- Password --}}
        <div>
            <x-input.label for="password" :value="__('Password')" required />
            <x-input.text id="password" class="block w-full mt-1" type="password" wire:model="password" name="password"
                required autofocus autocomplete="password" placeholder="••••••••" />
            <x-input.error for="password" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <x-button.primary :title="__('Confirm')" loading="confirmPassword">
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
        </div>
    </form>
</x-card.auth>
