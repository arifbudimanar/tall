<x-card.app :title="__('Modal')" :description="__('Press \'esc\' also close dropdown and \'tab\' or \' shift + tab\' to navigate.')">
    <x-slot:content>
        <div class="max-w-lg">
            {{ __('There are two modal options available: one serves as a trigger (wire:click), while the other functions as a form (wire:submit) for creating or confirming actions. Also when the modal is opened, it will disable scrolling and focus on the first input.') }}
        </div>
        <ol class="my-4 font-semibold">
            <li>title : props / slot - nullable</li>
            <li>content : slot - nullable if form available</li>
            <li>form : slot - nullable if content available</li>
            <li>submit : props - nullable if content available</li>
            <li>actions : slot - required</li>
        </ol>
        <x-button.secondary :title="__('Open Modal Form')" wire:click="$toggle('confirming_open_modal_form')" />

        <x-modal.dialog submit="confirmModalForm" wire:model="confirming_open_modal_form" title="{{ __('Modal Form') }}">
            <x-slot:form>
                <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
                    {{ __('Fill the form please.') }}
                </div>

                <div class="mt-4">
                    <x-input.label for="text" :value="__('Text')" required />
                    <x-input.text id="text" type="text" class="block w-full mt-1" wire:model="text" autofocus
                        autocomplete="text" placeholder="{{ __('Text Input') }}" required />
                    <x-input.error for="text" class="mt-2" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                <x-button.primary type="submit" :title="__('Confirm')" loading="confirmModalForm" />

                <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_open_modal_form')" />
            </x-slot:actions>
        </x-modal.dialog>

        <x-button.secondary :title="__('Open Modal Action')" wire:click="$toggle('confirming_open_modal_action')" />

        <x-modal.dialog wire:model="confirming_open_modal_action" title="{{ __('Modal Action') }}">
            <x-slot:content>
                <div class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
                    {{ __('Are you sure?') }}
                </div>
            </x-slot:content>

            <x-slot:actions>
                <x-button.primary type="button" :title="__('Yes')" loading="confirmModalAction"
                    wire:click="confirmModalAction" />

                <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_open_modal_action')" />
            </x-slot:actions>
        </x-modal.dialog>

        <p class="max-w-lg mt-4">
            {{ __('By the way, when it comes to data creation, I prefer utilizing another full-page Livewire component and not using a modal.') }}
        </p>
    </x-slot:content>
</x-card.app>
