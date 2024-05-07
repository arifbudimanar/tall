<div>
    <x-slot:header>
        <x-breadcrumb.item :title="__('Dashboard')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        {{-- Welcome admin --}}
        <x-card.app maxWidth="full" :title="__('Welcome to :appname Admin Dashboard', ['appname' => config('app.name')])" :description="__('You are logged in as :name.', ['name' => auth()->user()->name])" />

        {{-- User statistic --}}
        <x-card.app maxWidth="full" :title="__('User Statistics')">
            <x-slot:content>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 sm:gap-6">
                    <x-card.stat :title="__('Total Users')" :stat="$total_users" :href="route('admin.users.index')">
                        <x-slot:icon>
                            <x-icon.users class="w-5 h-5" />
                        </x-slot:icon>
                    </x-card.stat>
                    <x-card.stat :title="__('Registered Users This Month')" :stat="$total_register_this_month">
                        <x-slot:icon>
                            <x-icon.calendar class="w-5 h-5" />
                        </x-slot:icon>
                    </x-card.stat>
                    <x-card.stat :title="__('Verified Email Users')" :stat="$total_verified_users" :href="route('admin.users.index', ['emailstatus' => 'verified'])">
                        <x-slot:icon>
                            <x-icon.mail-check class="w-5 h-5" />
                        </x-slot:icon>
                    </x-card.stat>
                    <x-card.stat :title="__('Unverified Email Users')" :stat="$total_unverified_users" :href="route('admin.users.index', ['emailstatus' => 'notverified'])">
                        <x-slot:icon>
                            <x-icon.mail-x class="w-5 h-5" />
                        </x-slot:icon>
                    </x-card.stat>
                </div>
            </x-slot:content>
        </x-card.app>

        <div class="space-y-2 sm:space-y-8 md:space-y-0 md:flex">
            {{-- Latest created users --}}
            {{-- <x-card.app maxWidth="full" :title="__('Latest Created Users')">
                <x-slot:content>
                    @foreach ($latest_created_users as $user)
                        <div class="space-y-2">
                            <div class="flex items-center justify-between w-full">
                                <a wire:navigate href="{{ route('admin.users.show', $user) }}"
                                    class="font-semibold truncate hover:underline focus:underline">
                                    {{ $user->name }}
                                </a>
                                <span class="ml-2 text-xs shrink-0">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="truncate">
                                @if ($user->email_verified_at)
                                    <x-icon.check-circle
                                        class="inline-flex items-center justify-center w-4 h-4 text-indigo-600 shrink-0 dark:text-indigo-400" />
                                @else
                                    <x-icon.x-circle
                                        class="inline-flex items-center justify-center w-4 h-4 text-red-600 shrink-0 dark:text-red-400" />
                                @endif
                                {{ $user->email }}
                            </div>
                        </div>
                        @if (!$loop->last)
                            <x-divider class="my-4" />
                        @endif
                    @endforeach
                </x-slot:content>
            </x-card.app> --}}

            {{-- Latest updated users --}}
            {{-- <x-card.app maxWidth="full" :title="__('Latest Updated Users')">
                <x-slot:content>
                    @foreach ($latest_updated_users as $user)
                        <div class="space-y-2">
                            <div class="flex items-center justify-between w-full">
                                <a wire:navigate href="{{ route('admin.users.show', $user) }}"
                                    class="font-semibold truncate hover:underline focus:underline">
                                    {{ $user->name }}
                                </a>
                                <span class="ml-2 text-xs shrink-0">
                                    {{ $user->updated_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="truncate">
                                @if ($user->email_verified_at)
                                    <x-icon.check-circle
                                        class="inline-flex items-center justify-center w-4 h-4 text-indigo-600 shrink-0 dark:text-indigo-400" />
                                @else
                                    <x-icon.x-circle
                                        class="inline-flex items-center justify-center w-4 h-4 text-red-600 shrink-0 dark:text-red-400" />
                                @endif
                                {{ $user->email }}
                            </div>
                        </div>
                        @if (!$loop->last)
                            <x-divider class="my-4" />
                        @endif
                    @endforeach
                </x-slot:content>
            </x-card.app> --}}
        </div>
    </div>
</div>
