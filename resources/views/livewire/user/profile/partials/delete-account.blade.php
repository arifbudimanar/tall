<x-card.app title=" {{ __('Delete Account') }}" description="{{ __('Permanently delete your account.') }}">
    <x-slot:content>
        <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        <div class="mt-4">
            <x-button.danger :title="__('Delete Account')" wire:click="$toggle('confirming_user_deletion')">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.danger>
        </div>

        <x-modal.dialog submit="deleteUser" wire:model="confirming_user_deletion" title="{{ __('Delete Account') }}">
            <x-slot:form>
                <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input.label for="password" :value="__('Password')" required />
                    <x-input.text id="password" type="password" class="block w-full mt-1" wire:model="password"
                        required autocomplete="password" placeholder="••••••••" />
                    <x-input.error for="password" class="mt-2" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                <x-button.danger type="submit" :title="__('Confirm')" loading="deleteUser">
                    <x-slot:icon>
                        <x-icon.check class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.danger>

                <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_user_deletion')" />
            </x-slot:actions>
        </x-modal.dialog>
    </x-slot:content>
</x-card.app>
