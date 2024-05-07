<x-card.form submit="updatePassword" :title="__('Update Password')" :description="__('Ensure your account is using a long, random password to stay secure.')">
    <x-slot:form>
        {{-- Current password --}}
        <div>
            <x-input.label for="current_password" :value="__('Current Password')" required />
            <x-input.text id="current_password" type="password" class="block w-full mt-1" wire:model="current_password"
                required autocomplete="current_password" placeholder="••••••••" />
            <x-input.error for="current_password" class="mt-2" />
        </div>

        {{-- New password --}}
        <div>
            <x-input.label for="new_password" :value="__('New Password')" required />
            <x-input.text id="new_password" type="password" class="block w-full mt-1" wire:model="new_password" required
                autocomplete="new_password" placeholder="••••••••" />
            <x-input.error for="new_password" class="mt-2" />
        </div>

        {{-- New password confirmation --}}
        <div>
            <x-input.label for="new_password_confirmation" :value="__('New Password Confirmation')" required />
            <x-input.text id="new_password_confirmation" type="password" class="block w-full mt-1"
                wire:model="new_password_confirmation" required autocomplete="new_password_confirmation"
                placeholder="••••••••" />
            <x-input.error for="new_password_confirmation" class="mt-2" />
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-button.primary :title="__('Update')" loading="updatePassword">
            <x-slot:icon>
                <x-icon.check class="w-5 h-5" />
            </x-slot:icon>
        </x-button.primary>
    </x-slot:actions>
</x-card.form>
