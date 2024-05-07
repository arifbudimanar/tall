<div>
    <x-slot:header>
        <x-breadcrumb.link :href="route('admin.users.index')" :title="__('Users')" />
        <x-breadcrumb.item :title="$user->name" class="truncate" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        <x-card.app maxWidth="full" :title="__('View User')" :description="__('View user details and manage user roles.')">
            <x-slot:actions>
                <x-button.link.secondary :href="route('admin.users.edit', $user)" :title="__('Edit')" wire:navigate>
                    <x-slot:icon>
                        <x-icon.pencil-square class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.link.secondary>

                <x-button.danger :title="__('Delete')" wire:click="$toggle('confirming_user_deletion')">
                    <x-slot:icon>
                        <x-icon.trash class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.danger>
            </x-slot:actions>

            <x-slot:content>
                <dl class="space-y-4 sm:space-y-2">
                    {{-- Id --}}
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Id') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            {{ $user->id }}
                        </dd>
                    </div>

                    {{-- Name --}}
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Name') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            {{ $user->name }}
                        </dd>
                    </div>

                    {{-- Email --}}
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Email Address') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center">
                                @if ($user->email_verified_at)
                                    <x-icon.check-circle class="w-4 h-4 mr-1 text-indigo-600 dark:text-indigo-400" />
                                @else
                                    <x-icon.x-circle class="w-4 h-4 mr-1 text-red-600 dark:text-red-400" />
                                @endif
                                {{ $user->email }}
                            </div>
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('OAuth') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center space-x-2">
                                @if ($user->hasGithubAccount() || $user->hasGoogleAccount())
                                    @if ($user->hasGithubAccount())
                                        <p class="flex items-center justify-center">
                                            <x-icon.github class="w-4 h-4 mr-1" />
                                            Github
                                        </p>
                                    @endif
                                    @if ($user->hasGoogleAccount())
                                        <p class="flex items-center justify-center">
                                            <x-icon.google class="w-4 h-4 mr-1" />
                                            Google
                                        </p>
                                    @endif
                                @else
                                    -
                                @endif
                            </div>
                        </dd>
                    </div>

                    {{-- Roles --}}
                    {{-- <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Roles') }}
                        </dt>
                        <dd class="mt-1 space-x-2 space-y-2 sm:mt-0 sm:col-span-2">
                            <div class="flex flex-col gap-2">
                                @foreach ($user->roles as $role)
                                    @if ($role->name === 'admin')
                                        <x-badge type="success" :text="__(Str::ucfirst($role->name)) .
                                            ' : ' .
                                            __(Str::ucfirst($role->guard_name))" class="w-fit" />
                                    @else
                                        <x-badge type="info" :text="__(Str::ucfirst($role->name)) .
                                            ' : ' .
                                            __(Str::ucfirst($role->guard_name))" class="w-fit" />
                                    @endif
                                @endforeach
                            </div>
                        </dd>
                    </div> --}}

                    {{-- Created at --}}
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Created At') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            {{ $user->created_at->format('d M Y H:i') }}
                        </dd>
                    </div>

                    {{-- Updated at --}}
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="block">
                            {{ __('Updated At') }}
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            {{ $user->updated_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                </dl>
                {{-- Modal --}}
                @include('livewire.admin.users.partials.user-delete-modal')
            </x-slot:content>
        </x-card.app>
    </div>
</div>
