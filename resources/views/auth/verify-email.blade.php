<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-logo class="h-16" />
        </x-slot>

        <div
            class="w-full min-w-[300px] sm:min-w-[450px] sm:max-w-md mt-6 px-6 py-4 bg-secondary-50 shadow-xl overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-secondary-400/70">
                <span class="font-semibold">{{ __('¡Antes de continuar!') }}</span><br>
                {{ __('Verifique su cuenta haciendo clic en el enlace que acabamos de enviarle al correo') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-secondary-400/70">
                    {{ __('Se ha enviado un nuevo enlace de verificación.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button type="submit">
                            {{ __('Reenviar correo') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-2 p-1 mt-4">
                <a href="{{ route('profile.show') }}"
                    class="flex items-center justify-center text-sm text-secondary-400/70 hover:text-secondary-800/80 rounded-md focus:outline-none">
                    {{ __('Editar perfil') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="flex items-center justify-center ">
                    @csrf

                    <button type="submit"
                        class="text-sm text-secondary-400/70 hover:text-secondary-800/80 rounded-md focus:outline-none ms-2">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
