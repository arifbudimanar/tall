<x-card.app :title="__('Toaster')" :description="__('4 toaster type available  : success, warning, error and info.')">
    <x-slot:content>
        <p>
            {{ __('The default position alignment is bottom left, but you can change it on \'toaster.php\'.') }}
        </p>
        <div class="mt-4 space-y-1">
            <x-button.secondary loading="toasterSuccess" :title="__('Success')" wire:click="toasterSuccess">
                <x-slot:icon>
                    <x-icon.check-circle class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.secondary loading="toasterWarning" :title="__('Warning')" wire:click="toasterWarning">
                <x-slot:icon>
                    <x-icon.exclamation-triangle class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.secondary loading="toasterError" :title="__('Error')" wire:click="toasterError">
                <x-slot:icon>
                    <x-icon.x-circle class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.secondary loading="toasterInfo" :title="__('Info')" wire:click="toasterInfo">
                <x-slot:icon>
                    <x-icon.information-circle class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
        </div>
    </x-slot:content>
</x-card.app>
