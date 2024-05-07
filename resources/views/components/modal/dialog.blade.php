@props([
    'id' => null,
    'maxWidth' => null,
    'title' => null,
    'submit',
])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="p-4 sm:p-6 lg:p-8">
        @isset($title)
            <div class="text-lg font-medium text-zinc-900 dark:text-zinc-100">
                {{ $title }}
            </div>
        @endisset

        @if (isset($content))
            <div class="text-sm text-zinc-600 dark:text-zinc-400 {{ $title ? 'mt-4' : '' }}">
                {{ $content }}
            </div>

            <div class="flex gap-2 mt-4">
                {{ $actions }}
            </div>
        @endif

        @if (isset($form) && isset($submit))
            <form wire:submit='{{ $submit }}' class="{{ $title ? 'mt-4' : '' }}">
                {{ $form }}

                <div class="flex gap-2 mt-4">
                    {{ $actions }}
                </div>
            </form>
        @endif
    </div>
</x-modal>
