@props([
    'maxWidth' => '7xl',
    'title',
    'description',
])

@php
    $maxWidthClasses = match ($maxWidth) {
        'xl' => 'max-w-xl',
        '3xl' => 'max-w-3xl',
        '7xl' => 'max-w-7xl',
        'full' => 'w-full',
        default => $maxWidth,
    };
@endphp

<div class="mx-auto sm:px-6 lg:px-8 {{ $maxWidthClasses }}">
    <div
        class="p-4 bg-white border-y sm:border dark:bg-zinc-900 sm:rounded-lg sm:p-6 lg:p-8 border-zinc-200 dark:border-zinc-800">
        @if (isset($title) || isset($description) || isset($actions))
            <div class="lg:flex lg:items-start lg:justify-between">
                @if (isset($title) || isset($description))
                    <div class="flex-1 min-w-0">
                        @isset($title)
                            <h2 class="text-lg font-medium text-zinc-800 dark:text-zinc-200">
                                {{ $title }}
                            </h2>
                        @endisset

                        @isset($description)
                            <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                                <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400 sm:max-w-lg">
                                    {{ $description }}
                                </p>
                            </div>
                        @endisset
                    </div>
                @endif

                @isset($actions)
                    <div class="inline-flex gap-2 mt-4 shrink-0 lg:ml-3 lg:mt-0">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        @endif

        @isset($content)
            <div
                class="gap-4 text-sm text-zinc-600 dark:text-zinc-400 {{ isset($title) || isset($description) || isset($actions) ? 'mt-4' : '' }}">
                {{ $content }}
            </div>
        @endisset
    </div>
</div>
