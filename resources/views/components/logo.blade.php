<a wire:navigate
    href="{{ request()->is('user/*') ? route('user.dashboard') : (request()->is('admin/*') ? route('admin.dashboard') : route('home')) }}"
    class="flex items-center gap-2 text-lg font-extrabold w-fit text-zinc-900 dark:text-zinc-100 focus:text-indigo-600 dark:focus:text-indigo-400">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
        <path fill-rule="evenodd"
            d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z"
            clip-rule="evenodd" />
    </svg>

    <span class="uppercase">
        {{ config('app.name', 'Laravel') }}
    </span>
</a>
