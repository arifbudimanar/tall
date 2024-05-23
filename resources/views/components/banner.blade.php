@props(['type' => 'info', 'text'])

@php
    $typeClasses = match ($type) {
        'info' => 'bg-zinc-100 dark:bg-zinc-950 border-b border-zinc-200 dark:border-zinc-800 w-full',
        'success' => 'bg-indigo-100 dark:bg-indigo-950 border-b border-indigo-200 dark:border-indigo-800 w-full',
        'warning' => 'bg-orange-100 dark:bg-orange-950 border-b border-orange-200 dark:border-orange-800 w-full',
        'danger' => 'bg-red-100 dark:bg-red-950 border-b border-red-200 dark:border-red-800 w-full',
        default => $type,
    };
    $textClasses = match ($type) {
        'info' => 'text-zinc-900 dark:text-zinc-100',
        'success' => 'text-indigo-900 dark:text-indigo-100',
        'warning' => 'text-orange-900 dark:text-orange-100',
        'danger' => 'text-red-900 dark:text-red-100',
        default => $type,
    };
@endphp

<div {{ $attributes->merge([
    'class' => $typeClasses,
]) }}>
    <div class="px-4 py-2 mx-auto sm:px-6 lg:px-8 max-w-7xl {{ $textClasses }}">
        <div class="text-sm text-center">
            @isset($badge)
                <span class="mr-2">
                    {{ $badge }}
                </span>
            @endisset

            {{ $text ?? $slot }}
        </div>
    </div>
</div>
