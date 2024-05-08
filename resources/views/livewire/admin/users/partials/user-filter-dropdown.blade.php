    <x-dropdown align="right" :autoClose="false" :title="__('Filter')">
        <x-slot:trigger>
            <span class="inline-flex rounded-md">
                <x-button.secondary :title="__('Filter')" class="hidden ml-2 lg:inline-flex">
                    <x-slot:icon>
                        <x-icon.filter class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.secondary>
                <x-button.secondary class="ml-2 lg:hidden">
                    <x-icon.filter class="w-5 h-5" />
                </x-button.secondary>
            </span>
        </x-slot:trigger>

        <x-slot:content>
            <div class="px-4 py-4 space-y-2">
                <div class="justify-between gap-4 lg:flex">
                    <p class="flex items-center whitespace-nowrap">{{ __('Email Status') }}</p>
                    <x-input.select wire:model.lazy="email_status" id="filterEmailStatus" name="filterEmailStatus"
                        class="block w-full mt-1 lg:w-min lg:mt-0">
                        <option value="">{{ __('All') }}</option>
                        <option value="verified">
                            {{ __('Verified') }}
                        </option>
                        <option value="notverified">
                            {{ __('Not Verified') }}
                        </option>
                    </x-input.select>
                </div>
                <div class="justify-between gap-4 lg:flex">
                    <p class="flex items-center whitespace-nowrap">{{ __('Per Page') }}</p>
                    <x-input.select wire:model.lazy="paginate" id="paginate" name="paginate"
                        class="block w-full mt-1 lg:w-min lg:mt-0">
                        <option value="5">5</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </x-input.select>
                </div>

                @if ($email_status != '' || $paginate != '10')
                    <div class="flex justify-end">
                        <x-button.secondary :title="__('Reset')" loading="clearFilters" wire:click="clearFilters"
                            class="whitespace-nowrap">
                            <x-slot:icon>
                                {{-- <x-icon.filter-x class="w-5 h-5" /> --}}
                                <x-icon.arrow-path class="w-5 h-5" />
                            </x-slot:icon>
                        </x-button.secondary>
                    </div>
                @endif
            </div>

        </x-slot:content>
    </x-dropdown>
