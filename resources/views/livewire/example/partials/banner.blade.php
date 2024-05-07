<x-card.app :title="__('Banner')" :description="__('3 type variant: success, warning, info (default)')">
    <x-slot:content>
        <ol class="font-semibold">
            <li>text : props / slot - nullable if have slot</li>
            <li>type : props (default = info) - nullable</li>
            <li>badge : slot - nullable</li>
            <li>slot - nullable if have text</li>
        </ol>
        <p class="mt-4">Banner</p>
        <div class="mt-4">
            <x-banner type="success" :text="__('Success banner!')" />
            <x-banner type="warning" :text="__('Warning banner!')" />
            <x-banner type="info" :text="__('Info banner!')" />
        </div>

        <p class="mt-4">Banner with Badge</p>
        <div class="mt-4">
            <x-banner type="success" :text="__('Success banner!')">
                <x-slot:badge>
                    <x-badge type="success" :text="__('Success')" />
                </x-slot:badge>
            </x-banner>
            <x-banner type="warning" :text="__('Warning banner!')">
                <x-slot:badge>
                    <x-badge type="warning" :text="__('Warning')" />
                </x-slot:badge>
            </x-banner>
            <x-banner type="info" :text="__('Info banner!')">
                <x-slot:badge>
                    <x-badge type="info" :text="__('Info')" />
                </x-slot:badge>
            </x-banner>
        </div>

        <p class="mt-4">Sidebar Banner</p>
        <div class="max-w-xs mt-4 space-y-1">
            <x-sidebar-banner type="success" :text="__('Success sidebar banner!')" />
            <x-sidebar-banner type="warning" :text="__('Warning sidebar banner!')" />
            <x-sidebar-banner type="info" :text="__('Info sidebar banner!')" />
        </div>

        <p class="mt-4">Sidebar Banner with Badge</p>
        <div class="max-w-xs mt-4 space-y-1">
            <x-sidebar-banner type="success" :text="__('Success sidebar banner!')">
                <x-slot:badge>
                    <x-badge type="success" :text="__('Success')" />
                </x-slot:badge>
            </x-sidebar-banner>
            <x-sidebar-banner type="warning" :text="__('Warning sidebar banner!')">
                <x-slot:badge>
                    <x-badge type="warning" :text="__('Warning')" />
                </x-slot:badge>
            </x-sidebar-banner>
            <x-sidebar-banner type="info" :text="__('Info sidebar banner!')">
                <x-slot:badge>
                    <x-badge type="info" :text="__('Info')" />
                </x-slot:badge>
            </x-sidebar-banner>
        </div>
    </x-slot:content>
</x-card.app>
