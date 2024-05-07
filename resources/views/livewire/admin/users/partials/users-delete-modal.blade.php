<x-modal.dialog wire:model="confirming_users_deletion" title="{{ __('Delete User') }}">
    <x-slot:content>
        <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Are you sure you want delete all of selected users? Related data to the users will also be deleted. This action cannot be undone.') }}
        </div>

        @if ($selected)
            <div class="max-w-lg mt-2 text-sm font-semibold text-zinc-600 dark:text-zinc-400">
                {{ count($selected) }} {{ __('Users') }}
            </div>

            @if (in_array(Auth::user()->id, $selected))
                <div class="max-w-lg mt-2 text-sm text-red-600 dark:text-red-400">
                    {{ __('Your account is included in the selected users. Deleting your account will log you out, and you won\'t be able to log back in.') }}
                </div>
            @endif
        @endif
    </x-slot:content>

    <x-slot:actions>
        <x-button.danger :title="__('Confirm')" loading="deleteSelected" wire:click="deleteSelected">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.danger>

        <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_users_deletion')" />
    </x-slot:actions>
</x-modal.dialog>
