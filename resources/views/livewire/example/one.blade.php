<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Example One')" class="truncate" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        @include('livewire.example.partials.form-card')

        @include('livewire.example.partials.app-card')

        @include('livewire.example.partials.stat-card')

        @include('livewire.example.partials.icon')

        @include('livewire.example.partials.button')

        @include('livewire.example.partials.dropdown')

        @include('livewire.example.partials.toaster')

        @include('livewire.example.partials.modal')
    </div>
</div>
