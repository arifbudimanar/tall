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

<body class="bg-zinc-100 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100">
    {{-- Toaster --}}
    <x-toaster-hub />

    {{-- Content --}}
    <div class="min-w-full min-h-screen font-sans antialiased">
        {{ $slot }}
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
