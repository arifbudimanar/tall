<x-card.auth :title="__('Verify')">
    <div class="mb-4 text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    <div class="flex items-center justify-between mt-4">
        <x-button.primary :title="__('Resend Verification Email')" loading="resend" wire:click="resend">
            <x-slot:icon>
                <x-icon.send class="w-5 h-5" />
            </x-slot:icon>
        </x-button.primary>

        <div>
            <a wire:navigate href="{{ route('user.profile') }}"
                class="text-sm rounded-md hover:underline focus:underline text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 focus:text-zinc-900 dark:focus:text-zinc-100">
                {{ __('Edit Profile') }}
            </a>

            <button type="submit" wire:click="logout"
                class="ml-2 text-sm rounded-md hover:underline focus:underline text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 focus:text-zinc-900 dark:focus:text-zinc-100">
                {{ __('Logout') }}
            </button>
        </div>
    </div>
</x-card.auth>
