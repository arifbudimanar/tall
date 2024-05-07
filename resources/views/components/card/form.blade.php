@props([
    'maxWidth' => '7xl',
    'formWidth' => 'lg',
    'submit',
    'title',
    'description',
])

@php
    $maxWidthClasses = match ($maxWidth) {
        'xl' => 'max-w-xl',
        '3xl' => 'max-w-3xl',
        '7xl' => 'max-w-7xl',
        'full' => 'w-full',
        default => $maxWidth,
    };

    $formWidthClasses = match ($formWidth) {
        'lg' => 'max-w-lg',
        '3xl' => 'max-w-3xl',
        '7xl' => 'max-w-7xl',
        'full' => 'w-full',
        default => $formWidth,
    };
@endphp

<div class="mx-auto sm:px-6 lg:px-8 {{ $maxWidthClasses }}">
    <div
        class="p-4 overflow-hidden bg-white border-y sm:border dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800 sm:rounded-lg sm:p-6 lg:p-8">
        @isset($title)
            <h2 class="text-lg font-medium text-zinc-800 dark:text-zinc-200">{{ $title }}</h2>
        @endisset

        @isset($description)
            <p class="text-sm text-zinc-600 dark:text-zinc-400 sm:{{ $formWidthClasses }} {{ isset($title) ? 'mt-1' : '' }}">
                {{ $description }}
            </p>
        @endisset

        <form wire:submit="{{ $submit }}"
            class="text-sm space-y-4 text-zinc-600 dark:text-zinc-400 {{ $formWidthClasses }} {{ isset($title) || isset($description) ? 'mt-4' : '' }}">
            {{ $form }}

            @isset($actions)
                <div class="flex items-center space-x-2">
                    {{ $actions }}
                </div>
            @endisset
        </form>

        @isset($content)
            <div class="mt-4 text-sm text-zinc-600 dark:text-zinc-400">
                {{ $content }}
            </div>
        @endisset
    </div>
</div>
