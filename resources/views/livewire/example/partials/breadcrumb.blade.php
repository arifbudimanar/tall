<x-card.app :title="__('Breadcrumb')" :description="__('2 breadcrumb component available : breadcrumb link and breadcrumb item.')">
    <x-slot:content>
        <p class="mb-4">
            {{ __('Breadcrumb Link') }}
        </p>
        <ol class="font-semibold">
            <li>title : props / slot - nullable if have slot</li>
            <li>href : props - require</li>
            <li>slot - nullable if have title</li>
        </ol>
        <p class="mt-4">
            {{ __('Breadcrumb Item') }}
        </p>
        <ol class="mt-4 font-semibold">
            <li>title : props / slot - nullable if have slot</li>
            <li>slot - nullable if have title</li>
        </ol>
        <ol class="flex items-center w-full mt-4" aria-label="Breadcrumb">
            <x-breadcrumb.link :href="route('example-one')" :title="__('Breadcrumb Link')" />
            <x-breadcrumb.link :href="route('example-one')" :title="__('Loooooooooooooooooooong Breadcrumb Link')" class="truncate" />
            <x-breadcrumb.item :title="__('Breadcrumb Item')" class="truncate" />
        </ol>
        <p class="max-w-lg mt-4">
            The default breadcrumb link and breadcrumb item is
            <span class="font-bold text-red-600 underline dark:text-red-400">
                not truncate
            </span>
            . You should add truncate class to make it truncate.
        </p>
    </x-slot:content>
</x-card.app>
