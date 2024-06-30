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
                        <a href="{{ route('register') }}">
                            {{ __('Registrar') }}
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

        <!-- Mostrar mensaje de estado -->
        @if (session('status'))
        <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-950">
            <div class="w-full max-w-md space-y-8">
                {{ session('status') }}
            </div>
        </div>
        @endif

        <!-- Formulario de inicio de sesión -->
        <form id="signInForm" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4 flex justify-between items-center">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                @endif
            </div>
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="custom-button-width ms-4">
                    {{ __('Acceder') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>
