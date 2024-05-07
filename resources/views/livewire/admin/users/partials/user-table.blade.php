<x-table>
    <x-slot:head>
        <x-table.heading>
            <x-input.checkbox required id="select_page" wire:model.lazy="select_page" />
        </x-table.heading>

        <x-table.heading :title="__('#')" />

        {{-- <x-table.heading>
            <x-table.sort-button :title="__('ID')" :field_name="'id'" :sort_field="$sort_field" :sort_direction="$sort_direction" />
        </x-table.heading> --}}

        <x-table.heading>
            <x-table.sort-button :title="__('Name')" :field_name="'name'" :sort_field="$sort_field" :sort_direction="$sort_direction" />
        </x-table.heading>

        <x-table.heading>
            <x-table.sort-button :title="__('Email')" :field_name="'email'" :sort_field="$sort_field" :sort_direction="$sort_direction" />
        </x-table.heading>

        <x-table.heading :title="__('OAuth')" />

        {{-- <x-table.heading :title="__('Roles')" /> --}}

        <x-table.heading>
            <x-table.sort-button :title="__('Created at')" :field_name="'created_at'" :sort_field="$sort_field" :sort_direction="$sort_direction" />
        </x-table.heading>

        <x-table.heading>
            <x-table.sort-button :title="__('Updated at')" :field_name="'updated_at'" :sort_field="$sort_field" :sort_direction="$sort_direction" />
        </x-table.heading>

        <x-table.heading :title="__('Actions')" />
    </x-slot:head>

    <x-slot:body>
        @if ($select_page && $users->total() > $users->count())
            <x-table.row wire:key="row-message" type="stripe">
                <x-table.cell colspan="9">
                    @if ($select_all == true)
                        <div class="flex items-center">
                            <span>
                                {{ __('You are currently selecting all :total users.', [
                                    'total' => $users->total(),
                                ]) }}
                            </span>

                            <x-button.secondary :title="__('Deselect All')" loading="deselectAll" wire:click="deselectAll"
                                class="ml-2">
                                <x-slot:icon>
                                    <x-icon.x-circle class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.secondary>
                        </div>
                    @endif

                    @if ($select_all == false)
                        <div class="flex items-center">
                            <span>
                                {{ __('You have select :count users, do you want to select all :total users?', [
                                    'count' => $users->count(),
                                    'total' => $users->total(),
                                ]) }}
                            </span>

                            <x-button.secondary :title="__('Select All')" loading="selectAll" wire:click="selectAll"
                                class="ml-2">
                                <x-slot:icon>
                                    <x-icon.check-circle class="w-5 h-5" />
                                </x-slot:icon>
                            </x-button.secondary>
                        </div>
                    @endif
                </x-table.cell>
            </x-table.row>
        @endif

        @forelse ($users as $user)
            <x-table.row wire:key="{{ $user->id }}" type="stripe">
                <x-table.cell>
                    <x-input.checkbox id="selected" wire:model.lazy="selected" value="{{ $user->id }}" />
                </x-table.cell>

                <x-table.cell :value="$loop->iteration + $users->firstItem() - 1" />

                {{-- <x-table.cell :value="$user->id" /> --}}

                <x-table.cell class="w-full font-semibold whitespace-nowrap">
                    <a wire:navigate href="{{ route('admin.users.show', $user) }}"
                        class="hover:underline focus:underline">
                        {{ $user->name }}
                    </a>
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
                <x-table.cell>
                    <p class="flex items-center space-x-1">
                        @if ($user->hasGithubAccount() || $user->hasGoogleAccount())
                            @if ($user->hasGithubAccount())
                                <x-icon.github class="w-4 h-4" />
                            @endif
                            @if ($user->hasGoogleAccount())
                                <x-icon.google class="w-4 h-4" />
                            @endif
                        @else
                            -
                        @endif
                    </p>
                </x-table.cell>

                {{-- <x-table.cell class="space-x-2 whitespace-nowrap">
                    @foreach ($user->roles as $role)
                        @if ($role->name === 'admin')
                            <x-badge type="success" :text="__(Str::ucfirst($role->name)) . ' : ' . $role->guard_name" />
                        @else
                            <x-badge type="info" :text="__(Str::ucfirst($role->name)) . ' : ' . $role->guard_name" />
                        @endif
                    @endforeach
                </x-table.cell> --}}

                <x-table.cell class="whitespace-nowrap" :value="$user->created_at->diffForHumans()" />

                <x-table.cell class="whitespace-nowrap" :value="$user->updated_at->diffForHumans()" />

                <x-table.cell>
                    <div class="flex gap-2">
                        <x-table.action.link type="success" :href="route('admin.users.show', $user)" :title="__('View')">
                            <x-slot:icon>
                                <x-icon.eye class="w-4 h-4" />
                            </x-slot:icon>
                        </x-table.action.link>

                        <x-table.action.link type="warning" :href="route('admin.users.edit', $user)" :title="__('Edit')">
                            <x-slot:icon>
                                <x-icon.pencil-square class="w-4 h-4" />
                            </x-slot:icon>
                        </x-table.action.link>

                        <x-table.action.button type="danger" wire:click="confirmUserDeletion({{ $user }})"
                            :title="__('Delete')">
                            <x-slot:icon>
                                <x-icon.trash class="w-4 h-4" />
                            </x-slot:icon>
                        </x-table.action.button>
                    </div>
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row type="stripe">
                <x-table.cell-data-not-found colspan="9" />
            </x-table.row>
        @endforelse
    </x-slot:body>
</x-table>
