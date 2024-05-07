@props(['sort_field', 'sort_direction', 'title', 'field_name'])

<button type="button" wire:click="sortBy('{{ $field_name }}')"
    {{ $attributes->merge(['class' => 'flex items-center group uppercase hover:underline focus:underline']) }}>
    {{ $title }}

    @if ($sort_field === $field_name && $sort_direction === 'asc')
        <x-icon.chevrons-up class="w-5 h-5 ml-1" />
    @elseif ($sort_field === $field_name && $sort_direction === 'desc')
        <x-icon.chevrons-down class="w-5 h-5 ml-1" />
    @else
        <x-icon.chevrons-up-down class="w-5 h-5 ml-1 text-transparent group-hover:text-current" />
    @endif
</button>
