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
            <x-input.text id="email" type="text" class="block w-full mt-1" wire:model="email" required
                autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
            <x-input.error for="email" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="mt-2 text-sm dark:text-white">
                        {{ __('Your email address is unverified.') }}

                        <button type="button"
                            class="text-sm underline rounded-md text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-zinc-800"
                            wire:click="sendEmailVerification" wire:loading.attr="disabled">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('resent'))
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
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
