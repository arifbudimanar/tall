<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Settings')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        @include('livewire.user.setting.partials.language')

        @include('livewire.user.setting.partials.terms-and-policy')
    </div>
</div>
