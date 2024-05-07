<x-card.app :title="__('Badge')" :description="__('3 type variant: success, warning, info (default)')">
    <x-slot:content>
        <ol class="font-semibold">
            <li>text : props / slot - nullable if have slot</li>
            <li>type : props (default = info) - nullable</li>
            <li>slot - nullable if have text</li>
        </ol>
        <div class="flex flex-col gap-1 mt-4">
            <x-badge type="success" :text="__('Success Badge')" class="w-min" />
            <x-badge type="warning" :text="__('Warning Badge')" class="w-min" />
            <x-badge type="info" :text="__('Info Badge')" class="w-min" />
        </div>
    </x-slot:content>
</x-card.app>
