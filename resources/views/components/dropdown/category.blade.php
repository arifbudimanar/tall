@props(['title', 'divider' => true])

@if ($divider === true)
    <x-divider />
@endif

<div class="block px-4 py-2 text-xs text-zinc-600 dark:text-zinc-400">
    {{ $title ?? $slot }}
</div>
