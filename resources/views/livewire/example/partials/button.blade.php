<x-card.app :title="__('Button')" :description="__('All the available button.')">
    <x-slot:content>
        <p class="max-w-lg">
            When loading is active it will remove icon slot and replace it with
            loading spinner. Also button will be disable when have loading props and loading is active.
        </p>
        <ol class="mt-4 font-semibold">
            <li>title : props / slot - nullable if have slot</li>
            <li>icon : slot - nullable</li>
            <li>loading : props - nullable</li>
            <li>iconPlacement : props (default = left) - nullable</li>
            <li>slot - nullable if have title</li>
        </ol>

        <div class="mt-4">
            Button
        </div>
        <div class="space-y-1">
            <x-button.primary :title="__('Primary')" wire:click="someFunction" />
            <x-button.secondary :title="__('Secondary')" wire:click="someFunction" />
            <x-button.danger :title="__('Danger')" wire:click="someFunction" />
            <x-button.muted :title="__('Muted')" wire:click="someFunction" />
        </div>

        <div class="mt-4">
            Button with Loading Left
        </div>
        <div class="space-y-1">
            <x-button.primary loading="someFunction" :title="__('Primary')" wire:click="someFunction" />
            <x-button.secondary loading="someFunction" :title="__('Secondary')" wire:click="someFunction" />
            <x-button.danger loading="someFunction" :title="__('Danger')" wire:click="someFunction" />
            <x-button.muted loading="someFunction" :title="__('Muted')" wire:click="someFunction" />
        </div>

        <div class="mt-4">
            Button with Loading Right
        </div>
        <div class="space-y-1">
            <x-button.primary loading="someFunction" iconPlacement="right" :title="__('Primary')"
                wire:click="someFunction" />
            <x-button.secondary loading="someFunction" iconPlacement="right" :title="__('Secondary')"
                wire:click="someFunction" />
            <x-button.danger loading="someFunction" iconPlacement="right" :title="__('Danger')"
                wire:click="someFunction" />
            <x-button.muted loading="someFunction" iconPlacement="right" :title="__('Muted')" wire:click="someFunction" />
        </div>

        <div class="mt-4">
            Button with Icon Left
        </div>
        <div class="space-y-1">
            <x-button.primary :title="__('Primary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
            <x-button.secondary :title="__('Secondary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.danger :title="__('Danger')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.danger>
            <x-button.muted :title="__('Muted')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.eye-slash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.muted>
        </div>

        <div class="mt-4">
            Button with Icon Left & Loading
        </div>
        <div class="space-y-1">
            <x-button.primary loading="someFunction" :title="__('Primary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
            <x-button.secondary loading="someFunction" :title="__('Secondary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.danger loading="someFunction" :title="__('Danger')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.danger>
            <x-button.muted loading="someFunction" :title="__('Muted')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.eye-slash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.muted>
        </div>

        <div class="mt-4">
            Button with Icon Right
        </div>
        <div class="space-y-1">
            <x-button.primary iconPlacement="right" :title="__('Primary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
            <x-button.secondary iconPlacement="right" :title="__('Secondary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.danger iconPlacement="right" :title="__('Danger')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.danger>
            <x-button.muted iconPlacement="right" :title="__('Muted')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.eye-slash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.muted>
        </div>

        <div class="mt-4">
            Button with Icon Right & Loading
        </div>
        <div class="space-y-1">
            <x-button.primary iconPlacement="right" loading="someFunction" :title="__('Primary')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.primary>
            <x-button.secondary iconPlacement="right" loading="someFunction" :title="__('Secondary')"
                wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.secondary>
            <x-button.danger iconPlacement="right" loading="someFunction" :title="__('Danger')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.trash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.danger>
            <x-button.muted iconPlacement="right" loading="someFunction" :title="__('Muted')" wire:click="someFunction">
                <x-slot:icon>
                    <x-icon.eye-slash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.muted>
        </div>

        <div class="mt-4">
            Button Icon
        </div>
        <div class="space-y-1">
            <x-button.primary wire:click="someFunction">
                <x-icon.plus class="w-5 h-5" />
            </x-button.primary>
            <x-button.secondary wire:click="someFunction">
                <x-icon.check class="w-5 h-5" />
            </x-button.secondary>
            <x-button.danger wire:click="someFunction">
                <x-icon.trash class="w-5 h-5" />
            </x-button.danger>
            <x-button.muted wire:click="someFunction">
                <x-icon.eye-slash class="w-5 h-5" />
            </x-button.muted>
        </div>

        <div class="mt-4">
            Button Icon with Loading
        </div>
        <div class="space-y-1">
            <x-button.primary loading="someFunction" wire:click="someFunction">
                <x-icon.plus class="w-5 h-5" wire:loading.class="hidden" wire:target="someFunction" />
            </x-button.primary>
            <x-button.secondary loading="someFunction" wire:click="someFunction">
                <x-icon.check class="w-5 h-5" wire:loading.class="hidden" wire:target="someFunction" />
            </x-button.secondary>
            <x-button.danger loading="someFunction" wire:click="someFunction">
                <x-icon.trash class="w-5 h-5" wire:loading.class="hidden" wire:target="someFunction" />
            </x-button.danger>
            <x-button.muted loading="someFunction" wire:click="someFunction">
                <x-icon.eye-slash class="w-5 h-5" wire:loading.class="hidden" wire:target="someFunction" />
            </x-button.muted>
        </div>

        <ol class="mt-4 font-semibold">
            <li>title : props / slot - nullable if have slot</li>
            <li>href : props (default = null) - nullable</li>
            <li>icon : slot - nullable</li>
            <li>slot - nullable if have title</li>
        </ol>

        <div class="mt-4">
            Button Link
        </div>
        <div class="space-y-1">
            <x-button.link.primary :href="route('example-one')" :title="__('Primary')" wire:navigate />
            <x-button.link.secondary :href="route('example-one')" :title="__('Secondary')" wire:navigate />
            <x-button.link.muted :href="route('example-one')" :title="__('Muted')" wire:navigate />
        </div>

        <div class="mt-4">
            Button Link with Icon
        </div>
        <div class="space-y-1">
            <x-button.link.primary :href="route('example-one')" :title="__('Primary')" wire:navigate>
                <x-slot:icon>
                    <x-icon.plus class="w-5 h-5" />
                </x-slot:icon>
            </x-button.link.primary>
            <x-button.link.secondary :href="route('example-one')" :title="__('Secondary')" wire:navigate>
                <x-slot:icon>
                    <x-icon.check class="w-5 h-5" />
                </x-slot:icon>
            </x-button.link.secondary>
            <x-button.link.muted :href="route('example-one')" :title="__('Muted')" wire:navigate>
                <x-slot:icon>
                    <x-icon.eye-slash class="w-5 h-5" />
                </x-slot:icon>
            </x-button.link.muted>
        </div>

        <ol class="mt-4 font-semibold">
            <li>title : props / slot - nullable if have slot</li>
            <li>href : props (default = null) - nullable</li>
            <li>icon : slot - nullable</li>
            <li>active : props - nullable</li>
            <li>slot - nullable if have title</li>
        </ol>

        <div class="mt-4">
            Button Link Navigation
        </div>
        <div class="space-y-1">
            <div class="space-y-1">
                <x-button.link.navigation :href="route('example-one')" active="true" :title="__('Active Nav')" wire:navigate />
                <x-button.link.navigation :href="route('example-one')" :title="__('Nav')" wire:navigate />
            </div>
            <div class="max-w-xs space-y-1">
                <x-button.link.responsive-navigation :href="route('example-one')" active="true" :title="__('Active Responsive Nav')"
                    wire:navigate />
                <x-button.link.responsive-navigation :href="route('example-one')" :title="__('Responsive Nav')" wire:navigate />
            </div>
        </div>

        <div class="mt-4">
            Button Link Navigation with Icon
        </div>
        <div class="space-y-1">
            <div class="space-y-1">
                <x-button.link.navigation :href="route('example-one')" active="true" :title="__('Active Nav')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.navigation>
                <x-button.link.navigation :href="route('example-one')" :title="__('Nav')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.navigation>
            </div>
            <div class="max-w-xs space-y-1">
                <x-button.link.responsive-navigation :href="route('example-one')" active="true" :title="__('Active Responsive Nav')"
                    wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.responsive-navigation>
                <x-button.link.responsive-navigation :href="route('example-one')" :title="__('Responsive Nav')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.globe-alt class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.responsive-navigation>
            </div>
        </div>

        <p class="max-w-xl mt-4">
            Button link or button link navigation is
            <span class="font-bold text-red-600 underline dark:text-red-400">
                not wire:navigate
            </span>
            by default. You should add wire:navigate to make SPA-like experience.
        </p>
    </x-slot:content>
</x-card.app>
