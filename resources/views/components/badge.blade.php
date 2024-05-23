@props(['type' => 'info', 'text'])

@php
    $typeClasses = match ($type) {
        'info' => 'text-zinc-700 dark:text-zinc-300 bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700',
        'success' => 'text-indigo-700 dark:text-indigo-300 bg-indigo-200 dark:bg-indigo-800 border border-indigo-300 dark:border-indigo-700',
        'warning' => 'text-orange-700 dark:text-orange-300 bg-orange-200 dark:bg-orange-800 border border-orange-300 dark:border-orange-700',
        'danger' => 'text-red-700 dark:text-red-300 bg-red-200 dark:bg-red-800 border border-red-300 dark:border-red-700',
        default => $type,
    };
@endphp

<span
    {{ $attributes->merge([
        'class' => 'px-2 py-1 text-xs font-semibold whitespace-nowrap leading-tight rounded-full ' . $typeClasses,
    ]) }}>
    {{ $text ?? $slot }}
</span>
