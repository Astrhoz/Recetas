<x-validation-errors class="mb-4" />

@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}"> 
    @csrf  

    <div class="mb-4 ">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-50">
            <strong>Iniciar sesión en su cuenta</strong>
        </h2>
    </div>

    <div class="space-y-2">
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="nombre@ejemplo.com" required autofocus autocomplete="username" />
    </div>

    <div class="mt-4 space-y-2">
        <div class="flex items-center justify-between">
            <x-label for="password" value="{{ __('Contraseña') }}" />
            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-primary-600 hover:underline text-gray-600 " href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
    </div>


    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-checkbox id="remember_me" name="remember" />
            <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-button class="w-full flex justify-center">
            {{ __('Acceder') }}
        </x-button>
    </div>
</form>