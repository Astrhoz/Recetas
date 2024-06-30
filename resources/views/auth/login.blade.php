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
                        <button id="signUpTab" class="custom-button-width px-10 py-2 rounded-full bg-gray-300 dark:bg-gray-600 text-center cursor-pointer hover:bg-white dark:hover:bg-white hover:text-gray-600 dark:hover:text-gray-600 border border-gray-400 dark:border-gray-700">
                            Registrarse
                        </button>
                        <button id="signInTab" class="custom-button-width px-10 py-2 rounded-full bg-gray-300 dark:bg-gray-600 text-center cursor-pointer hover:bg-white dark:hover:bg-white hover:text-gray-600 dark:hover:text-gray-600 border border-gray-400 dark:border-gray-700">
                            Iniciar Sesión
                        </button>
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


        <!-- Formulario de registro (inicialmente oculto) -->
        <form id="signUpForm" class="hidden" method="POST" action="{{ route('register') }}">
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

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('Estoy de acuerdo con los <a href=":terms_link" target="_blank" class="underline">términos de servicio</a> y la <a href=":privacy_link" target="_blank" class="underline">política de privacidad</a>', [
                            'terms_link' => route('terms.show'),
                            'privacy_link' => route('policy.show'),
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>

        <!-- JavaScript para alternar formularios -->
        <script>
            document.getElementById('signInTab').addEventListener('click', function() {
                document.getElementById('signInForm').classList.remove('hidden');
                document.getElementById('signUpForm').classList.add('hidden');
            });

            document.getElementById('signUpTab').addEventListener('click', function() {
                document.getElementById('signUpForm').classList.remove('hidden');
                document.getElementById('signInForm').classList.add('hidden');
            });
        </script>

    </x-authentication-card>
</x-guest-layout>
