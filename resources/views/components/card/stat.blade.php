@props(['title', 'stat', 'href', 'openNewTab' => false, 'icon' => null])

<div
    {{ $attributes->merge(['class' => 'flex flex-col border rounded-xl bg-zinc-100 dark:bg-zinc-950 border-zinc-200 dark:border-zinc-800']) }}>
    <div class="flex p-4 md:p-6 gap-x-4">
        @isset($icon)
            <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-zinc-200 rounded-lg dark:bg-zinc-800">
                {{ $icon }}
            </div>
        @endisset

        <div class="grow">
            @isset($title)
                <div class="flex items-center gap-x-2">
                    <p class="text-xs tracking-wide uppercase text-zinc-500 dark:text-zinc-500">
                        {{ $title }}
                    </p>
                </div>
            @endisset
            <div class="flex items-center @isset($title) mt-1 @endisset gap-x-2">
                @isset($href)
                    @if ($openNewTab === false)
                        <a href="{{ $href }}" wire:navigate
                            class="text-xl font-medium text-zinc-800 sm:text-2xl dark:text-zinc-200 hover:underline focus:underline">
                            {{ $stat }}
                        </a>
                    @else
                        <a href="{{ $href }}" target="_blank"
                            class="text-xl font-medium text-zinc-800 sm:text-2xl dark:text-zinc-200">
                            {{ $stat }}
                        </a>
                    @endif
                @else
                    <h3 class="text-xl font-medium text-zinc-800 sm:text-2xl dark:text-zinc-200">
                        {{ $stat }}
                    </h3>
                @endisset
            </div>
        </div>
    </div>
</div>
