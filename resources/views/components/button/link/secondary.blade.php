@props(['href' => null, 'title'])
<a
    {{ $attributes->merge([
        'href' => $href,
        'class' =>
            'inline-flex items-center justify-center px-3 py-2 text-sm font-semibold border rounded-md border-zinc-200 dark:border-zinc-800 text-zinc-950 dark:text-zinc-50 bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-950 dark:hover:bg-zinc-800 focus:bg-zinc-200 focus:dark:bg-zinc-800 whitespace-nowrap',
    ]) }}>

    @isset($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endisset

    {{ $title ?? $slot }}
</a>
