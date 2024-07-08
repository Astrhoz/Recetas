<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-secondary-100/80">
    <x-banner />

    <div class="grid min-h-screen w-full lg:grid-cols-[280px_1fr]">
        {{-- Menú lateral --}}
        @include('layouts.includes.app-side-bar')

        {{-- Contenido principal --}}
        <div class="flex flex-col">

            {{-- Encabezado --}}
            @include('layouts.includes.app-header')

            {{-- Contenido principal --}}
            <main class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    @include('layouts.includes.guest-footer')


    @stack('modals')

    @livewireScripts
</body>

</html>
