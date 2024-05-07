<x-card.app :title="__('Linked Accounts')" :description="__('Manage linked accounts.')">
    <x-slot:content>
        <div class="flex flex-col gap-4">
            @if ($user->hasGithubAccount() && Route::has('oauth.redirect.github'))
                <div class="inline-flex max-w-sm gap-2">
                    <x-button.link.secondary :title="$user->github_name" class="w-fit">
                        <x-slot:icon>
                            <x-icon.github class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>

                    <x-button.muted loading="removeGithubAccount" wire:click="removeGithubAccount">
                        <x-icon.link-off class="w-5 h-5" wire:loading.class="hidden" wire:target="removeGithubAccount" />
                    </x-button.muted>
                </div>
            @elseif (Route::has('oauth.redirect.github'))
                <div class="inline-flex max-w-sm">
                    <x-button.link.secondary :href="route('oauth.redirect.github')" :title="__('Connect with Github')" class="w-fit">
                        <x-slot:icon>
                            <x-icon.github class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>
                </div>
            @endif

            @if ($user->hasGoogleAccount() && Route::has('oauth.redirect.google'))
                <div class="inline-flex max-w-sm gap-2">
                    <x-button.link.secondary :title="$user->google_name" class="w-fit">
                        <x-slot:icon>
                            <x-icon.google class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>

                    <x-button.muted loading="removeGoogleAccount" wire:click="removeGoogleAccount">
                        <x-icon.link-off class="w-5 h-5" wire:loading.class="hidden"
                            wire:target="removeGoogleAccount" />
                    </x-button.muted>
                </div>
            @elseif (Route::has('oauth.redirect.google'))
                <div class="inline-flex max-w-sm">
                    <x-button.link.secondary :href="route('oauth.redirect.google')" :title="__('Connect with Google')" class="w-fit">
                        <x-slot:icon>
                            <x-icon.google class="w-5 h-5" />
                        </x-slot:icon>
                    </x-button.link.secondary>
                </div>
            @endif
        </div>
    </x-slot:content>
</x-card.app>
