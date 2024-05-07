@props(['on'])

<div x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => {
    clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, 2000);
})" x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms x-cloak
    {{ $attributes->merge(['class' => 'text-sm text-zinc-600 dark:text-zinc-400']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
