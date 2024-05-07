<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Users')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        <x-card.app maxWidth="full" :title="__('All Users')" :description="__('Manage all users, search, sort by, sort direction and more.')">
            <x-slot:actions>
                <x-button.link.primary :href="route('admin.users.create')" :title="__('Create')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.plus class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.primary>
            </x-slot:actions>

            <x-slot:content>
                <div>
                    {{-- Search --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center w-full lg:w-max">
                            <x-input.text id="search" type="text" required autofocus autocomplete="search"
                                class="w-full" placeholder="{{ __('Search by name or email') }}"
                                wire:model.lazy="search" />
                            @if ($search)
                                <x-button.secondary :title="__('Clear')" loading="clearSearch" wire:click="clearSearch"
                                    class="hidden ml-2 sm:inline-flex">
                                    <x-slot:icon>
                                        <x-icon.x class="w-5 h-5" />
                                    </x-slot:icon>
                                </x-button.secondary>
                                <x-button.secondary loading="clearSearch" wire:click="clearSearch"
                                    class="ml-2 sm:hidden">
                                    <x-icon.x class="w-5 h-5" wire:loading.class="hidden" wire:target="clearSearch" />
                                </x-button.secondary>
                            @endif
                        </div>
                        @include('livewire.admin.users.partials.user-filter-dropdown')
                    </div>

                    {{-- Filter --}}
                    {{-- <div class="space-y-2 xl:gap-2 xl:space-y-0 xl:flex">
                        <div class="flex justify-between w-full">
                            <p class="flex items-center mr-2 whitespace-nowrap">{{ __('Email Status') }}</p>
                            <x-input.select wire:model.lazy="email_status" id="filterEmailStatus"
                                name="filterEmailStatus" class="block w-min md:w-min">
                                <option value="">{{ __('All') }}</option>
                                <option value="verified">
                                    {{ __('Verified') }}
                                </option>
                                <option value="notverified">
                                    {{ __('Not Verified') }}
                                </option>
                            </x-input.select>
                        </div>

                        <div class="flex justify-between w-full">
                            <p class="flex items-center mr-2 whitespace-nowrap">{{ __('Per Page') }}</p>
                            <x-input.select wire:model.lazy="paginate" id="paginate" name="paginate"
                                class="block w-min md:w-min">
                                <option value="5">5</option>
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </x-input.select>
                        </div>

                        @if ($email_status != '' || $paginate != '10')
                            <div class="flex items-center justify-end">
                                <x-button.secondary :title="__('Reset')" loading="clearFilters" wire:click="clearFilters"
                                    class="whitespace-nowrap">
                                    <x-slot:icon>
                                        <x-icon.filter-x class="w-5 h-5" />
                                    </x-slot:icon>
                                </x-button.secondary>
                            </div>
                        @endif
                    </div> --}}
                </div>

                {{-- Bulk actions --}}
                @if (!empty($selected))
                    @include('livewire.admin.users.partials.user-bulk-actions-dropdown')
                @endif

                {{-- User table --}}
                @include('livewire.admin.users.partials.user-table')

                {{-- Modal --}}
                @include('livewire.admin.users.partials.user-delete-modal')
                @include('livewire.admin.users.partials.users-delete-modal')

                {{-- Pagination --}}
                <div class="mt-4">
                    {{-- Scroll to top when changing page --}}
                    {{-- {{ $users->links() }} --}}

                    {{-- Disable scroll to top when changing page --}}
                    {{ $users->onEachSide(1)->links(data: ['scrollTo' => false]) }}
                </div>
            </x-slot:content>
        </x-card.app>

    </div>
</div>
