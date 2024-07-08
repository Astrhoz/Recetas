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
                <div class="flex items-center">
                    <h1 class="font-semibold text-lg md:text-2xl">Recetas</h1>
                    <button class="ml-auto">Publicar Receta</button>
                </div>
                {{-- Ejemplo de tarjeta --}}
                <div class="border shadow-sm rounded-lg">
                    <div class="flex items-center justify-between border-b px-4 py-3">
                        <div class="flex items-center gap-4">
                            <a href="#" class="flex items-center gap-2 text-sm font-semibold">
                                <div class="w-8 h-8 border">
                                    <img src="/placeholder-user.jpg" alt="Avatar"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                                Acme Cocina
                            </a>
                        </div>
                    </div>
                    <div class="p-0">
                        <img src="/placeholder.svg" alt="Imagen de la receta"
                            class="object-cover aspect-square w-full">
                    </div>
                    <div class="p-4 grid gap-2">
                        <div class="flex items-center w-full">
                            <button class="ml-auto">
                                {{-- HeartIcon --}}
                                <span class="sr-only">Me gusta</span>
                            </button>
                            <button>
                                {{-- MessageCircleIcon --}}
                                <span class="sr-only">Comentar</span>
                            </button>
                            <button>
                                {{-- SendIcon --}}
                                <span class="sr-only">Compartir</span>
                            </button>
                            <button class="ml-auto">
                                {{-- BookmarkIcon --}}
                                <span class="sr-only">Guardar</span>
                            </button>
                        </div>
                        <div class="px-2 text-sm w-full grid gap-1.5">
                            <div>
                                <a href="#" class="font-medium">
                                    john
                                </a>
                                ¡Esta receta se ve deliciosa! 😋
                            </div>
                            <div>
                                <a href="#" class="font-medium">
                                    amelia
                                </a>
                                ¡Me encanta! 😍
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    @stack('modals')

    @livewireScripts
</body>

</html>
