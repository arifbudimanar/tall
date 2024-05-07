<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Profile')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        @include('livewire.user.profile.partials.update-profile')

        @include('livewire.user.profile.partials.linked-account')

        {{-- @include('livewire.user.profile.partials.roles-and-permissions') --}}

        @include('livewire.user.profile.partials.update-password')

        @include('livewire.user.profile.partials.browser-session')

        @include('livewire.user.profile.partials.delete-account')
    </div>
</div>
