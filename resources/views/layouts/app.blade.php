<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles

    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-secondary-100/80">
    <div class="grid min-h-screen w-full lg:grid-cols-[280px_1fr]">
        {{-- Menú lateral --}}
        @include('layouts.includes.app-side-bar')

        {{-- Contenido principal --}}
        <div class="flex flex-col">

            {{-- Encabezado --}}
            @include('layouts.includes.app-header')

            {{-- Contenido principal --}}
            <main class="flex flex-1 flex-col gap-4 p-4 md:gap-8 md:p-6">
                <div
                    class="w-full bg-secondary-50 py-3 px-4 flex items-center justify-between rounded-md shadow-md sticky top-0 z-10">
                    <h1 class="text-lg text-secondary-900 font-semibold">{{ $title ?? 'Título de la Pestaña' }}</h1>
                    @if ((request()->routeIs('new-recipe')) || (request()->routeIs('edit-recipe')))
                        <a href="{{ url('/') }}"
                            class="bg-red-500/90 text-white/90 text-sm p-2 rounded hover:bg-red-600/90 hover:cursor-pointer">
                            Cancelar
                        </a>
                    @else
                        <a href="{{ route('new-recipe') }}"
                            class="bg-secondary-800 text-primary text-sm p-2 rounded hover:bg-secondary-900 hover:cursor-pointer">
                            Crear Receta
                        </a>
                    @endif
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>

    @include('layouts.includes.guest-footer')


    @filamentScripts

    @vite('resources/js/app.js')
</body>

</html>
