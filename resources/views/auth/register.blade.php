<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="flex flex-col items-center justify-center">
                <x-authentication-card-logo />
                <div class="text-center mt-6">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-50">
                        Bienvenido a Recetario
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Inicia sesión o crea una cuenta nueva.
                    </p>
                </div>
                <div class="mt-4">
                    <nav class="flex justify-center space-x-4">
                    <x-button class="ms-4">
                        <a href="{{ route('login') }}">
                            {{ __('Inicio de Sesion') }}
                        </a>
                    </x-button>
                    </nav>

                    <style>
                        .custom-button-width {
                            width: 225px; /* Ajusta este valor según sea necesario */
                        }

                        #signUpTab:focus, #signUpTab:active,
                        #signInTab:focus, #signInTab:active {
                            background-color: white; /* Cambia a fondo blanco */
                            color: #333; /* Cambia a color de texto oscuro */
                        }
                    </style>
                </div>
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <!-- FORMULARIO DE REGISTRO -->
        <form id="signUpForm" method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-button class="custom-button-width ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
