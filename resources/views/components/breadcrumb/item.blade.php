@props(['title'])

<li {{ $attributes->merge([
    'class' => 'text-lg font-medium text-zinc-800 dark:text-zinc-200 whitespace-nowrap',
]) }}
    aria-current="page">
    {{ $title ?? $slot }}
</li>
