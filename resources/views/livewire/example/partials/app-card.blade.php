<x-card.app :title="__('App Card Title')" :description="__('App card description.')">
    <x-slot:actions>
        <x-button.link.primary :href="route('example-one')" :title="__('Actions')">
            <x-slot:icon>
                <x-icon.plus class="w-5 h-5" />
            </x-slot:icon>
        </x-button.link.primary>
    </x-slot:actions>

    <x-slot:content>
        <p class="mb-4">
            {{ __('4 maxWidth variant: full, 7xl (default), 3xl, xl') }}
        </p>
        <ol class="font-semibold">
            <li>title : props / slot - nullable</li>
            <li>description : props / slot - nullable</li>
            <li>maxWidth : props (default = 7xl) - nullable</li>
            <li>actions : slot - nullable</li>
            <li>content : slot - nullable</li>
        </ol>
    </x-slot:content>
</x-card.app>
