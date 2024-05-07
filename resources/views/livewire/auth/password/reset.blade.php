<x-card.auth :title="__('Reset Password')">
    <form wire:submit="resetPassword">
        {{-- Email --}}
        {{-- <div>
            <x-input.label for="email" :value="__('Email')" required />
            <x-input.text id="email" class="block w-full mt-1" type="email" wire:model="email" name="email" required
                autofocus autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
            <x-input.error for="email" class="mt-2" />
        </div> --}}

        {{-- Any Error --}}
        <x-input.errors />

        {{-- Password --}}
        <div @if ($errors->any()) class="mt-4" @endif>
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

        <div class="flex items-center mt-4">
            <x-button.primary :title="__('Reset')" loading="resetPassword">
                <x-slot:icon>
                    <x-icon.arrow-path class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
        </div>
    </form>
</x-card.auth>
