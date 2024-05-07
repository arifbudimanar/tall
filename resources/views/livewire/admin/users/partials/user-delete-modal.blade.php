<x-modal.dialog wire:model="confirming_user_deletion" title="{{ __('Delete User') }}">
    <x-slot:content>
        <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Are you sure you want delete this user? Related data to this user will also be deleted. This action cannot be undone.') }}
        </div>

        @if ($selected_user_delete)
            <div class="max-w-lg mt-2 text-sm font-semibold text-zinc-600 dark:text-zinc-400">
                {{ $selected_user_delete->name }}
            </div>
            <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
                {{ $selected_user_delete->email }}
            </div>
            @if ($selected_user_delete->id == auth()->user()->id)
                <div class="max-w-lg mt-2 text-sm text-red-600 dark:text-red-400">
                    {{ __('You are currently logged in as this user. Deleting this user will log you out, and you won\'t be able to log back in.') }}
                </div>
            @endif
        @endif
    </x-slot:content>

    <x-slot:actions>
        <x-button.danger :title="__('Confirm')" loading="deleteUser" wire:click="deleteUser">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.danger>

        <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_user_deletion')" />
    </x-slot:actions>
</x-modal.dialog>
