@props(['title', 'loading', 'iconPlacement' => 'left'])

<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center px-3 py-2 text-sm font-semibold text-zinc-50 border rounded-md dark:text-zinc-950 bg-zinc-950 dark:bg-zinc-50 hover:bg-zinc-800 hover:dark:bg-zinc-300 focus:bg-zinc-800 focus:dark:bg-zinc-300 border-zinc-800 dark:border-zinc-300',
    ]) }}
    @isset($loading) wire:loading.attr="disabled" @endisset>
    @if ($iconPlacement === 'left')
        @isset($loading)
            <x-loading wire:target="{{ $loading }}" type="primary" class="{{ isset($title) ? 'mr-2' : '' }}" />
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
            <x-loading wire:target="{{ $loading }}" type="primary" class="{{ isset($title) ? 'ml-2' : '' }}" />
        @endisset

        @isset($icon)
            <div class="inline-flex items-center ml-2"
                @isset($loading) wire:loading.class="hidden" wire:target="{{ $loading }}" @endisset>
                {{ $icon }}
            </div>
        @endisset
    @endif
</button>
