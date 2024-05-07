@props(['title', 'loading', 'iconPlacement' => 'left'])

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border rounded-md text-zinc-950 dark:text-zinc-50 bg-red-100 dark:bg-red-950 hover:bg-red-200 dark:hover:bg-red-800 focus:bg-red-200 focus:dark:bg-red-800 border-red-200 dark:border-red-800',
    ]) }}
    @isset($loading) wire:loading.attr="disabled" @endisset>
    @if ($iconPlacement === 'left')
        @isset($loading)
            <x-loading wire:target="{{ $loading }}" type="danger" class="{{ isset($title) ? 'mr-2' : '' }}" />
        @endisset

        @isset($icon)
            <div class="inline-flex items-center mr-2"
                @isset($loading) wire:loading.class="hidden" wire:target="{{ $loading }}" @endisset>
                {{ $icon }}
            </div>
        @endisset
    @endif

    {{ $title ?? $slot }}

    @if ($iconPlacement === 'right')
        @isset($loading)
            <x-loading wire:target="{{ $loading }}" type="danger" class="{{ isset($title) ? 'ml-2' : '' }}" />
        @endisset

        @isset($icon)
            <div class="inline-flex items-center ml-2"
                @isset($loading) wire:loading.class="hidden" wire:target="{{ $loading }}" @endisset>
                {{ $icon }}
            </div>
        @endisset
    @endif
</button>
