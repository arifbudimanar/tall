@props([
    'align' => 'right',
    'width' => 'max',
    'autoClose' => true,
    'title' => null,
])

@php
    $alignmentClasses = match ($align) {
        'left' => 'origin-top-left left-0',
        'right' => 'origin-top-right right-0',
        'top-left' => 'origin-bottom-left left-0',
        'top-right' => 'origin-bottom-right right-0',
        // 'center' => 'origin-top',
        // 'top' => 'origin-top',
        // 'none', 'false' => '',
        default => $align,
    };

    $widthClasses = match ($width) {
        '48' => 'w-48',
        'max' => 'min-w-max',
        default => $width,
    };
@endphp

<div class="relative" x-data="{ open: false }" x-on:click.away="open = false" x-on:close.stop="open = false"
    x-on:keydown.escape.window="open = false">

    @if ($align === 'left' || $align === 'right')
        <div x-on:click="open = ! open">
            {{ $trigger }}
        </div>
    @endif

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        @if ($autoClose == true) x-on:click="open = false" @endif x-cloak
        class="absolute z-10 rounded-md {{ $widthClasses }} {{ $alignmentClasses }}
        {{ $align === 'top-left' || $align === 'top-right' ? '-translate-y-full' : '' }}">
        <div
            class="overflow-y-hidden bg-white border border-transparent rounded-md border-zinc-200 dark:border-zinc-800 dark:bg-zinc-900
            {{ $align === 'top-left' || $align === 'top-right' ? 'mb-2' : 'mt-2' }}">
            @isset($title)
                <div class="block px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300">
                    {{ $title }}
                </div>
                <x-divider></x-divider>
            @endisset
            {{ $content }}
        </div>
    </div>

    @if ($align === 'top-left' || $align === 'top-right')
        <div x-on:click="open = ! open">
            {{ $trigger }}
        </div>
    @endif
</div>
