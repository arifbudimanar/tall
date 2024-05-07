@props(['active', 'title'])

<div class="flex flex-col space-y-2" x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    <x-button.responsive-navigation x-on:click="open=!open" :$active class="justify-between">
        <span class="flex items-center text-left">
            @isset($icon)
                <div class="mr-2">
                    {{ $icon }}
                </div>
            @endisset

            {{ $title }}
        </span>

        <span class="ml-2">
            <x-icon.chevron-down x-show="!open" class="w-5 h-5" />

            <x-icon.chevron-up x-show="open" x-cloak class="w-5 h-5" />
        </span>
    </x-button.responsive-navigation>

    <div class="ml-5 space-y-2" x-show="open" x-collapse.duration.100ms x-cloak>
        {{ $slot }}
    </div>
</div>
