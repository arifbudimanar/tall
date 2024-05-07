<th scope="col" class="px-4 py-3">
    <div {{ $attributes->merge(['class' => 'flex items-center whitespace-nowrap']) }}>
        {{ $title ?? $slot }}
    </div>
</th>
