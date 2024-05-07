<x-card.app :title="__('Table')" :description="__('2 available table row type : flat (default), stripe.')">
    <x-slot:content>
        <p class="max-w-lg">
            {{ __('Table also have many smaller component like row, cell, heading, cell data not found, sort button, action button and action link.') }}
        </p>
        <p class="max-w-lg">
            {{ __('You can use dropdown as an action option. However, personally I prefer using a action button and action link.') }}
        </p>

        <ol class="my-4 font-semibold">
            <li>head : slot - required</li>
            <li>body : slot - required</li>
        </ol>

        <p>{{ __('Flat Table') }}</p>
        <x-table>
            <x-slot:head>
                <x-table.heading :title="__('Name')" />
                <x-table.heading :title="__('Email')" />
                <x-table.heading :title="__('Actions')" />
            </x-slot:head>

            <x-slot:body>
                @forelse ($users as $user)
                    <x-table.row wire:key="{{ $user->id }}">
                        <x-table.cell class="font-semibold whitespace-nowrap">
                            <button wire:click="openUser({{ $user }})" class="hover:underline focus:underline">
                                {{ $user->name }}
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex items-center">
                                @if ($user->email_verified_at)
                                    <x-icon.check-circle class="w-4 h-4 mr-1 text-indigo-600 dark:text-indigo-400" />
                                @else
                                    <x-icon.x-circle class="w-4 h-4 mr-1 text-red-600 dark:text-red-400" />
                                @endif
                                {{ $user->email }}
                            </p>
                        </x-table.cell>

                        <x-table.cell class="space-x-2 whitespace-nowrap">
                            #
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row type="stripe">
                        <x-table.cell-data-not-found colspan="9" />
                    </x-table.row>
                @endforelse
            </x-slot:body>
        </x-table>
        <p class="mt-4">{{ __('Stripe Table') }}</p>
        <x-table>
            <x-slot:head>
                <x-table.heading :title="__('Name')" />
                <x-table.heading :title="__('Email')" />
                <x-table.heading :title="__('Actions')" />
            </x-slot:head>

            <x-slot:body>
                @forelse ($users as $user)
                    <x-table.row wire:key="{{ $user->id }}" type="stripe">
                        <x-table.cell class="font-semibold whitespace-nowrap">
                            <button wire:click="openUser({{ $user }})" class="hover:underline focus:underline">
                                {{ $user->name }}
                            </button>
                        </x-table.cell>

                        <x-table.cell>
                            <p class="flex items-center">
                                @if ($user->email_verified_at)
                                    <x-icon.check-circle class="w-4 h-4 mr-1 text-indigo-600 dark:text-indigo-400" />
                                @else
                                    <x-icon.x-circle class="w-4 h-4 mr-1 text-red-600 dark:text-red-400" />
                                @endif
                                {{ $user->email }}
                            </p>
                        </x-table.cell>

                        <x-table.cell class="space-x-2 whitespace-nowrap">
                            #
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row type="stripe">
                        <x-table.cell-data-not-found colspan="9" />
                    </x-table.row>
                @endforelse
            </x-slot:body>
        </x-table>
    </x-slot:content>
</x-card.app>
