@props(['title', 'type' => 'info'])

@php
    $typeClasses = match ($type) {
        'info' => 'hover:bg-zinc-100 dark:hover:bg-zinc-950 focus:bg-zinc-100 dark:focus:bg-zinc-950',
        'success' => 'hover:bg-indigo-100 dark:hover:bg-indigo-950 focus:bg-indigo-100 dark:focus:bg-indigo-950',
        'warning' => 'hover:bg-orange-100 dark:hover:bg-orange-950 focus:bg-orange-100 dark:focus:bg-orange-950',
        'danger' => 'hover:bg-red-100 dark:hover:bg-red-950 focus:bg-red-100 dark:focus:bg-red-950',
        default => $type,
    };
@endphp

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            $typeClasses .
            ' w-full flex items-center px-4 py-2 text-left text-sm leading-5 text-zinc-700 dark:text-zinc-300',
        $type,
    ]) }}>

    @isset($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endisset

    {{ $title ?? $slot }}
</button>
