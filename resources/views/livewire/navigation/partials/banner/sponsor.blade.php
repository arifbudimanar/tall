@production
    <x-banner type="success" class="{{ request()->routeIs('admin.*') ? 'lg:hidden' : '' }}">
        <span class="md:hidden">
            {{ __('Sponsor the project') }}
        </span>

        <span class="hidden md:inline-flex">
            {{ __('Sponsor the project and help the server to stay alive!') }}
        </span>

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
    </x-banner>
@endproduction
