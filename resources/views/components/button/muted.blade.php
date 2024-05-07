@props(['title', 'loading', 'iconPlacement' => 'left'])

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center justify-center rounded-md px-3 py-2 text-sm font-semibold text-zinc-950 dark:text-zinc-50 bg-white dark:bg-zinc-900 hover:bg-zinc-100 hover:dark:bg-zinc-950 border border-transparent hover:border-zinc-200 hover:dark:border-zinc-800  focus:bg-zinc-100 focus:dark:bg-zinc-950',
    ]) }}
    @isset($loading) wire:loading.attr="disabled" @endisset>
    @if ($iconPlacement === 'left')
        @isset($loading)
            <x-loading wire:target="{{ $loading }}" type="secondary" class="{{ isset($title) ? 'mr-2' : '' }}" />
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
            <x-loading wire:target="{{ $loading }}" type="secondary" class="{{ isset($title) ? 'ml-2' : '' }}" />
        @endisset

        @isset($icon)
            <div class="inline-flex items-center ml-2"
                @isset($loading) wire:loading.class="hidden" wire:target="{{ $loading }}" @endisset>
                {{ $icon }}
            </div>
        @endisset
    @endif
</button>
