<td {{ $attributes->merge([
    'class' => 'px-4 py-6 whitespace-nowrap xl:text-center',
]) }}>
    <div class="inline-flex items-center gap-2 font-medium whitespace-nowrap">
        <x-icon.archive-box-x-mark class="w-5 h-5" />

        {{ __('Data Not Found') }}
    </div>
</td>
