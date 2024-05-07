@props(['href' => null, 'title'])
<a
    {{ $attributes->merge([
        'href' => $href,
        'class' =>
            'inline-flex items-center justify-center px-3 py-2 text-sm font-semibold bg-white border border-transparent rounded-md text-zinc-950 dark:text-zinc-50 dark:bg-zinc-900 hover:bg-zinc-100 hover:dark:bg-zinc-950 hover:border-zinc-200 hover:dark:border-zinc-800  focus:bg-zinc-100 focus:dark:bg-zinc-950',
    ]) }}>

    @isset($icon)
        <div class="mr-2">
            {{ $icon }}
        </div>
    @endisset

    {{ $title ?? $slot }}
</a>
