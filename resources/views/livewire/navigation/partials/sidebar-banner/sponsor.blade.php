@production
    <x-sidebar-banner type="success" class="hidden lg:block">
        <x-slot:badge>
            <x-badge type="success" :text="__('Sponsorship')" />
        </x-slot:badge>

        {{ __('Sponsor the project and help the server to stay alive!') }}
        <a href="https://github.com/arifbudimanar/tall" target="_blank"
            class="ml-1 text-indigo-700 dark:text-indigo-300 hover:underline focus:underline">
            Github.
        </a>

        <a href="https://github.com/sponsors/arifbudimanar" target="_blank"
            class="ml-1 text-indigo-700 dark:text-indigo-300 hover:underline focus:underline">
            Sponsor.
        </a>

        <a href="https://www.paypal.me/arifbudimanarrosyid" target="_blank"
            class="ml-1 text-indigo-700 dark:text-indigo-300 hover:underline focus:underline">
            Paypal.
        </a>
    </x-sidebar-banner>
@endproduction
