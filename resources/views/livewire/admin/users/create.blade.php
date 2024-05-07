<div>
    <x-slot:header>
        <x-breadcrumb.link :href="route('admin.users.index')" :title="__('Users')" />
        <x-breadcrumb.item :title="__('Create')" />
    </x-slot:header>

    <div class="py-2 space-y-2 sm:py-8 sm:space-y-8">
        <x-card.form submit="createUser" maxWidth="full" :title="__('Create User')" :description="__('Create new user.')">
            <x-slot:form>
                {{-- Name --}}
                <div>
                    <x-input.label for="name" :value="__('Name')" required />
                    <x-input.text id="name" type="text" class="block w-full mt-1" wire:model="name" required
                        autofocus autocomplete="name" placeholder="{{ __('Full Name') }}" />
                    <x-input.error for="name" class="mt-2" />
                </div>

                {{-- Email --}}
                <div>
                    <x-input.label for="email" :value="__('Email')" required />
                    <x-input.text id="email" type="text" class="block w-full mt-1" wire:model="email" required
                        autocomplete="email" placeholder="{{ __('example@mail.com') }}" />
                    @production
                        <p class ="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                            {{ __('Please use a real email address.') }} {{ __('The password will be "password".') }}
                        </p>
                    @endproduction
                    <x-input.error for="email" class="mt-2" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                <x-button.primary :title="__('Save')" loading="createUser">
                    <x-slot:icon>
                        <x-icon.plus class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.primary>

                <x-button.muted :title="__('Cancel')" loading="cancelCreate" wire:click="cancelCreate" />
            </x-slot:actions>
        </x-card.form>
    </div>
</div>
