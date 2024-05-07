@props(['title', 'href' => null])

<a
    {{ $attributes->merge([
        'href' => $href,
        'class' =>
            'w-full flex items-center px-4 py-2 text-left text-sm leading-5 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-950 focus:bg-zinc-100 dark:focus:bg-zinc-950',
    ]) }}>

    @isset($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endisset

    {{ $title ?? $slot }}
</a>
