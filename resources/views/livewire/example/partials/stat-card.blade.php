<x-card.app :title="__('Stat Card')" :description="__(
    'The default for stat card is just plain text, if you put href it will be a link and add wire:navigate, if you put openNewTab=\'true\' it will remove wire:navigate and add target=\'_blank\' to open new tab',
)">
    <x-slot:content>
        <ol class="font-semibold">
            <li>title : props / slot - nullable</li>
            <li>stat : props / slot - nullable</li>
            <li>href : props - nullable</li>
            <li>openNewTab : props (default = false) - nullable</li>
        </ol>
        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 2xl:grid-cols-3 sm:gap-6">
            <x-card.stat title="No Link" stat="Just Stat" />
            <x-card.stat title="Link with Open New Tab" stat="Github" href="https://github.com/arifbudimanar/lali"
                openNewTab="true" />
            <x-card.stat title="Link with Wire Navigate" stat="Example Page" :href="route('example-one')" />
        </div>
    </x-slot:content>
</x-card.app>
