@props([
    'maxWidth' => 'md',
    'title',
])

@php
    $maxWidthClasses = match ($maxWidth) {
        'md' => 'sm:max-w-md',
        'xl' => 'sm:max-w-xl lg:max-w-2xl',
        default => $maxWidth,
    };
@endphp

<div
    {{ $attributes->merge([
        'class' => 'flex flex-col items-center min-h-screen py-6 sm:justify-center',
    ]) }}>
    <x-logo />

    @isset($title)
        <div class="w-full {{ $maxWidthClasses }}">
            <h1 class="px-4 text-4xl font-bold text-center sm:px-6">{{ $title }}</h1>
        </div>
    @endisset

    <div
        class="{{ $maxWidthClasses }} w-full mt-6 px-4 py-6 sm:px-6 text-sm bg-white dark:bg-zinc-900 border-y sm:border border-zinc-200 dark:border-zinc-800 sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
