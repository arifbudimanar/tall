<div class="flex gap-2 mt-4 w-min">
    <x-dropdown align="left" :title="__('Actions')">
        <x-slot:trigger>
            <span class="inline-flex rounded-md">
                <x-button.secondary class="flex items-center whitespace-nowrap">
                    <span>
                        <x-icon.chevron-down x-show="!open" class="mr-2 -ml-0.5 w-5 h-5" />

                        <x-icon.chevron-up x-show="open" x-cloak class="mr-2 -ml-0.5 w-5 h-5" />
                    </span>
                    {{ __('Bulk Actions') }} ({{ count($selected) }})
                </x-button.secondary>
            </span>
        </x-slot:trigger>

        <x-slot:content>
            <x-dropdown.button type="danger" :title="__('Delete Users')" wire:click="confirmUsersDeletion">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-dropdown.button>
        </x-slot:content>
    </x-dropdown>

    @unless ($select_all)
        <x-button.muted :title="__('Cancel')" loading="deselectAll" wire:click="deselectAll" />
    @endunless
</div>
