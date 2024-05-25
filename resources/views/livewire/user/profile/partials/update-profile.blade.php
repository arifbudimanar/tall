<x-card.form submit="updateProfile" :title="__('Profile Information')" :description="__('Update your profile information with valid data.')">
    <x-slot:form>
        {{-- Name --}}
        <div>
            <x-input.label for="name" :value="__('Name')" required />
            <x-input.text id="name" type="text" class="block w-full mt-1" wire:model="name" required autofocus
                autocomplete="name" placeholder="{{ __('Full Name') }}" />
            <x-input.error for="name" class="mt-2" />
        </div>

        {{-- Email --}}
        <div>
            <x-input.label for="email" :value="__('Email')" required />
            <div class="flex mt-1 space-x-2">
                <x-input.text id="email" type="text" class="block w-full" wire:model="email" required
                    autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <x-button.secondary wire:click="sendEmailVerification" loading="sendEmailVerification"
                        wire:loading.attr="disabled" type="button" class="sm:hidden">
                        <x-icon.send class="w-5 h-5" wire:loading.class="hidden" wire:target="sendEmailVerification" />
                    </x-button.secondary>
                    <x-button.secondary wire:click="sendEmailVerification" loading="sendEmailVerification"
                        wire:loading.attr="disabled" :title="__('Verify')" type="button" class="hidden sm:flex">
                        <x-slot:icon>
                            <x-icon.send class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.secondary>
                @endif
            </div>
            <x-input.error for="email" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-red-600 dark:text-red-400">
                        {{ __('Your email address is unverified.') }}
                    </p>
                </div>
            @endif
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-button.primary :title="__('Update')" loading="updateProfile">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.primary>
    </x-slot:actions>
</x-card.form>
