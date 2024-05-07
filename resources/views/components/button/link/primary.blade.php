@props(['href' => null, 'title'])
<a
    {{ $attributes->merge([
        'href' => $href,
        'class' =>
            'inline-flex items-center justify-center px-3 py-2 text-sm font-semibold text-white border rounded-md dark:text-zinc-950 bg-zinc-950 dark:bg-zinc-100 hover:bg-zinc-800 hover:dark:bg-zinc-300 focus:bg-zinc-800 focus:dark:bg-zinc-300 border-zinc-800 dark:border-zinc-300 whitespace-nowrap',
    ]) }}>

    @isset($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endisset

    {{ $title ?? $slot }}
</a>
