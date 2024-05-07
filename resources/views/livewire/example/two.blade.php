<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Example Two')" class="truncate" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        @include('livewire.example.partials.breadcrumb')

        @include('livewire.example.partials.badge')

        @include('livewire.example.partials.banner')

        @include('livewire.example.partials.table')
    </div>
</div>
