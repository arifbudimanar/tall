<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="{{ asset('favicon-24x24.svg') }}" rel="icon" media="(prefers-color-scheme: light)" />
    <link href="{{ asset('favicon-24x24-dark.svg') }}" rel="icon" media="(prefers-color-scheme: dark)" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="{{ asset('lali.png') }}">
    <meta property="og:description"
        content="A TALL Stack boilerplate with minimalist design, ready to boost your web app development journey.">
    <meta name="description"
        content="A TALL Stack boilerplate with minimalist design, ready to boost your web app development journey.">

    <title>
        {{ $title ?? null ? config('app.name', 'Laravel') . ' - ' . __($title) : config('app.name', 'Laravel') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen overflow-y-auto font-sans antialiased bg-zinc-100 dark:bg-zinc-950">
    {{-- Toaster --}}
    <x-toaster-hub />

    @livewire('navigation.app-navigation')

    {{-- Page Heading --}}
    @isset($header)
        <header class="pt-16 bg-white border-b dark:bg-zinc-900 border-zinc-200 dark:border-zinc-800">
            @production
                @livewire('navigation.partials.banner.offline')
            @endproduction
            @include('livewire.navigation.partials.banner.admin-mode')
            @include('livewire.navigation.partials.banner.sponsor')

            <div class="flex items-center justify-between h-16 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- Header --}}
                <ol class="flex items-center w-full" aria-label="Breadcrumb">
                    {{ $header }}
                </ol>

                {{-- Actions --}}
                {{-- @isset($actions)
                    <div class="space-x-2">
                        {{ $actions }}
                    </div>
                @endisset --}}
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main>
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts
</body>

</html>
