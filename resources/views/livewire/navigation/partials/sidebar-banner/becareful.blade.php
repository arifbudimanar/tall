@production
    <x-sidebar-banner type="warning" :text="__('Becareful when accessing admin dashboard. Some actions can not be undone.')">
        <x-slot:badge>
            <x-badge type="warning" :text="__('Warning')" />
        </x-slot:badge>
    </x-sidebar-banner>
@endproduction
