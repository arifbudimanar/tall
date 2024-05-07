@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-zinc-200 dark:border-zinc-800 bg-zinc-100 dark:bg-zinc-950 text-zinc-700 dark:text-zinc-300 focus:border-indigo-200 dark:focus:border-indigo-800 focus:ring-0 rounded-md disabled:cursor-not-allowed',
]) !!}>
    {{ $slot }}
</select>
