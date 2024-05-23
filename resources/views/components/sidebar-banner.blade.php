@props(['type' => 'info', 'text'])

@php
    $typeClasses = match ($type) {
        'info' => 'p-3 bg-zinc-100 dark:bg-zinc-950 border border-zinc-200 rounded-md dark:border-zinc-800',
        'success' => 'p-3 bg-indigo-100 dark:bg-indigo-950 border border-indigo-200 rounded-md dark:border-indigo-800',
        'warning' => 'p-3 bg-orange-100 dark:bg-orange-950 border border-orange-200 rounded-md dark:border-orange-800',
        'danger' => 'p-3 bg-red-100 dark:bg-red-950 border border-red-200 rounded-md dark:border-red-800',
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
    @isset($badge)
        <div class="flex items-center mb-3 space-x-2">
            {{ $badge }}
        </div>
    @endisset

    <p class="text-sm {{ $textClasses }}">
        {{ $text ?? $slot }}
    </p>
</div>
