<x-card.app :title="__('Dropdown')" :description="__('Press \'esc\' also close dropdown and \'tab\' or \' shift + tab\' to navigate.')">
    <x-slot:content>
        <p class="mt-4">
            4 align variant: left, right (default), top-left, top-right.
        </p>
        <p>
            2 width variant: max (default), 48.
        </p>
        <p>
            It also have smaller component like dropdown link, dropdown button and dropdown category.
        </p>
        <ol class="mt-4 font-semibold">
            <li>title : props / slot - nullable</li>
            <li>align : props (default = right) - nullable</li>
            <li>width : props (default = max) - nullable</li>
            <li>autoClose : props (default = true) - nullable</li>
            <li>trigger : slot - required</li>
            <li>content : slot - required</li>
        </ol>
        <div class="flex justify-between mt-4">
            <x-dropdown align="top-left" :title="__('Top Left')">
                <x-slot:trigger>
                    <x-button.secondary class="flex items-center">
                        <span>
                            <x-icon.chevron-down x-show="open" x-cloak class="mr-2 -ml-0.5 w-5 h-5" />

                            <x-icon.chevron-up x-show="!open" class="mr-2 -ml-0.5 w-5 h-5" />
                        </span>
                        {{ __('Top Left') }}
                    </x-button.secondary>
                </x-slot:trigger>

                <x-slot:content>
                    <x-dropdown.category divider="false" :title="__('Dropdown Category with Divider')" />
                    <x-dropdown.button :title="__('Dropdown Button')" wire:click="dropdownButtonTopLeft" />
                    <x-dropdown.button :title="__('Dropdown Button with Icon')" wire:click="dropdownButtonTopLeft">
                        <x-slot:icon>
                            <x-icon.no-symbol class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.button>
                    <x-dropdown.category :title="__('Dropdown Category without Divider')" divider="false" />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link')" wire:navigate />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link with Icon')" wire:navigate>
                        <x-slot:icon>
                            <x-icon.globe-alt class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.link>
                </x-slot:content>
            </x-dropdown>
            <x-dropdown align="top-right" :title="__('Top Right')">
                <x-slot:trigger>
                    <x-button.secondary class="flex items-center">
                        {{ __('Top Right') }}
                        <span>
                            <x-icon.chevron-down x-show="open" x-cloak class="ml-2 -mr-0.5 w-5 h-5" />

                            <x-icon.chevron-up x-show="!open" class="ml-2 -mr-0.5 w-5 h-5" />
                        </span>
                    </x-button.secondary>
                </x-slot:trigger>

                <x-slot:content>
                    <x-dropdown.category divider="false" :title="__('Dropdown Category with Divider')" />
                    <x-dropdown.button :title="__('Dropdown Button')" wire:click="dropdownButtonTopRight" />
                    <x-dropdown.button :title="__('Dropdown Button with Icon')" wire:click="dropdownButtonTopRight">
                        <x-slot:icon>
                            <x-icon.no-symbol class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.button>
                    <x-dropdown.category :title="__('Dropdown Category without Divider')" divider="false" />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link')" wire:navigate />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link with Icon')" wire:navigate>
                        <x-slot:icon>
                            <x-icon.globe-alt class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.link>
                </x-slot:content>
            </x-dropdown>
        </div>
        <div class="flex justify-between mt-2">
            <x-dropdown align="left" :title="__('Bottom Left')">
                <x-slot:trigger>
                    <x-button.secondary class="flex items-center">
                        <span>
                            <x-icon.chevron-down x-show="!open" class="mr-2 -ml-0.5 w-5 h-5" />

                            <x-icon.chevron-up x-show="open" x-cloak class="mr-2 -ml-0.5 w-5 h-5" />
                        </span>
                        {{ __('Bottom Left') }}
                    </x-button.secondary>
                </x-slot:trigger>

                <x-slot:content>
                    <x-dropdown.category divider="false" :title="__('Dropdown Category with Divider')" />
                    <x-dropdown.button :title="__('Dropdown Button')" wire:click="dropdownButtonBottomLeft" />
                    <x-dropdown.button :title="__('Dropdown Button with Icon')" wire:click="dropdownButtonBottomLeft">
                        <x-slot:icon>
                            <x-icon.no-symbol class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.button>
                    <x-dropdown.category :title="__('Dropdown Category without Divider')" divider="false" />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link')" wire:navigate />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link with Icon')" wire:navigate>
                        <x-slot:icon>
                            <x-icon.globe-alt class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.link>
                </x-slot:content>
            </x-dropdown>
            <x-dropdown align="right" :title="__('Bottom Right')">
                <x-slot:trigger>
                    <x-button.secondary class="flex items-center">
                        {{ __('Bottom Right') }}
                        <span>
                            <x-icon.chevron-down x-show="!open" class="ml-2 -mr-0.5 w-5 h-5" />

                            <x-icon.chevron-up x-show="open" x-cloak class="ml-2 -mr-0.5 w-5 h-5" />
                        </span>
                    </x-button.secondary>
                </x-slot:trigger>

                <x-slot:content>
                    <x-dropdown.category divider="false" :title="__('Dropdown Category with Divider')" />
                    <x-dropdown.button :title="__('Dropdown Button')" wire:click="dropdownButtonBottomRight" />
                    <x-dropdown.button :title="__('Dropdown Button with Icon')" wire:click="dropdownButtonBottomRight">
                        <x-slot:icon>
                            <x-icon.no-symbol class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.button>
                    <x-dropdown.category :title="__('Dropdown Category without Divider')" divider="false" />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link')" wire:navigate />
                    <x-dropdown.link :href="route('example-one')" :title="__('Dropdown Link with Icon')" wire:navigate>
                        <x-slot:icon>
                            <x-icon.globe-alt class="w-5 h-5" />
                        </x-slot:icon>
                    </x-dropdown.link>
                </x-slot:content>
            </x-dropdown>
        </div>
    </x-slot:content>
</x-card.app>
