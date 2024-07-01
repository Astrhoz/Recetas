<x-validation-errors class="mb-4" />

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-10 ">
        <h2 class="text-3xl font-medium text-secondary">
            <strong>Crea una cuenta nueva</strong>
        </h2>
    </div>

    <div class="space-y-2">
        <x-label class="text-secondary/70" for="name" value="{{ __('Nombre completo') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="John Wilson" required autofocus autocomplete="name" />
    </div>

    <div class="mt-4 space-y-2">
        <x-label class="text-secondary/70" for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="nombre@ejemplo.com" required autocomplete="username" />
    </div>

    <div class="mt-4 space-y-2">
        <x-label class="text-secondary/70" for="password" value="{{ __('Contraseña') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
    </div>

    <div class="my-4 space-y-2">
        <x-label class="text-secondary/70" for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-label for="terms">
                <div class="flex items-center">
                    <x-checkbox name="terms" id="terms" required />
                    <div class="ms-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-label>
        </div>
    @endif


    <div class="flex items-center justify-end">
        <x-button class="w-full flex justify-center mt-10">
            {{ __('Registrarse') }}
        </x-button>
    </div>
</form>