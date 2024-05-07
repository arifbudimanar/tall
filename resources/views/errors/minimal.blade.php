<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <title>
        {{ config('app.name', 'Laravel') }} - @yield('title')
    </title>

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Styles --}}
    @livewireStyles
</head>

<body class="antialiased bg-white dark:bg-zinc-900">
    <div class="flex flex-col items-center justify-center min-h-screen py-10">
        <header class="z-50 flex justify-center w-full pb-4">
            <nav class="px-4 sm:px-6 lg:px-8" aria-label="Logo">
                <x-logo />
            </nav>
        </header>

        <main id="content">
            <div class="px-4 mx-auto text-center sm:px-6 lg:px-8">
                <h1 class="block font-bold text-center text-zinc-800 text-7xl sm:text-9xl dark:text-white">
                    @yield('code')</h1>
                <p class="mt-3 text-zinc-600 dark:text-zinc-400"> @yield('message')</p>
                @if ($exception->getStatusCode() == 404)
                    <p class="text-zinc-600 dark:text-zinc-400">{{ __('Sorry, we can\'t find that page.') }}</p>
                @endif
                @if ($exception->getStatusCode() == 503)
                    <p class="text-zinc-600 dark:text-zinc-400">
                        {{ __('We are currently performing some maintenance. We will be back shortly.') }}
                    </p>
                @endif
                <div class="flex flex-col items-center justify-center gap-2 pt-4 sm:flex-row sm:gap-3">
                    <x-button.link.primary :href="route('home')" :title="__('Home')" wire:navigate class="w-full max-w-48" />
                </div>
            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>
