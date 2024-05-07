<x-card.app :title="__('Browser Sessions')" :description="__('Manage and log out your active sessions on other browsers and devices.')">
    <x-slot:content>
        <div class="max-w-lg text-sm">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>

        <div class="mt-4 space-y-4">
            @foreach ($sessions as $session)
                <div class="flex items-center">
                    <div>
                        @if ($session->device->desktop)
                            <x-icon.computer-desktop class="w-6 h-6" />
                        @elseif ($session->device->tablet)
                            <x-icon.device-tablet class="w-6 h-6" />
                        @else
                            <x-icon.device-phone-mobile class="w-6 h-6" />
                        @endif
                    </div>

                    <div class="ml-4">
                        <div class="text-sm">
                            {{ $session->device->platform ?? __('Unknown') }} -
                            {{ $session->device->browser ?? __('Unknown') }}
                        </div>

                        <div>
                            <div class="text-xs">
                                {{ $session->ip_address }}
                                @if ($session->is_current_device)
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">
                                        {{ __('This device') }}
                                    </span>
                                @else
                                    {{ __('Last active') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if (count($sessions) > 1)
            <div class="mt-4">
                <x-button.danger :title="__('Log Out Other Browser Sessions')" wire:click="$toggle('confirming_logout_other_browser_sessions')">
                    <x-slot:icon>
                        <x-icon.arrow-out class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.danger>
            </div>
        @endif

        <x-modal.dialog submit="logoutOtherBrowserSessions" wire:model="confirming_logout_other_browser_sessions"
            title="{{ __('Log Out Other Browser Sessions') }}">
            <x-slot:form>
                <div class="max-w-lg text-sm">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-input.label for="password" :value="__('Password')" required />
                    <x-input.text id="password" type="password" class="block w-full mt-1" wire:model="password"
                        required autocomplete="password" placeholder="••••••••" />
                    <x-input.error for="password" class="mt-2" />
                </div>
            </x-slot:form>

            <x-slot:actions>
                <x-button.danger type="submit" :title="__('Confirm')" loading="logoutOtherBrowserSessions">
                    <x-slot:icon>
                        <x-icon.check class="w-5 h-5" />
                    </x-slot:icon>
                </x-button.danger>

                <x-button.muted :title="__('Cancel')" wire:click="$toggle('confirming_logout_other_browser_sessions')" />
            </x-slot:actions>
        </x-modal.dialog>
    </x-slot:content>
</x-card.app>
