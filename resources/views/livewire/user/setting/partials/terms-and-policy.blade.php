<x-card.app :title="__('Terms of Service and Privacy Policy')" :description="__(
    'Please take a moment to review our Terms of Service and Privacy Policy. By registering, you explicitly agree to comply with these Terms of Service and Privacy Policy.',
)">
    <x-slot:actions>
        <x-button.link.secondary target="_blank" :href="route('termsofservice')" :title="__('Terms of Service')" />
        <x-button.link.secondary target="_blank" :href="route('privacypolicy')" :title="__('Privacy Policy')" />
    </x-slot:actions>
</x-card.app>
