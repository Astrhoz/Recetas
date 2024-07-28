<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ url('/') }}">
                <x-logo class="h-16 m-6" />
            </a>
        </x-slot>
        <div
            class="w-full min-w-[300px] sm:m-w-[450px] sm:max-w-md my-6 px-6 py-4 bg-secondary-50 shadow-none sm:shadow-xl overflow-hidden rounded-lg">
            <div x-data="{ recovery: false }">
                <div class="mb-4 text-sm text-secondary-400/90" x-show="! recovery">
                    {{ __('Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticador.') }}
                </div>

                <div class="mb-4 text-sm text-secondary-400/90" x-cloak x-show="recovery">
                    {{ __('Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mt-4 text-secondary/70" x-show="! recovery">
                        <x-label for="code" value="{{ __('Código') }}" />
                        <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric"
                            name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    </div>

                    <div class="mt-4 text-secondary/70" x-cloak x-show="recovery">
                        <x-label for="recovery_code" value="{{ __('Código de recuperación') }}" />
                        <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code"
                            x-ref="recovery_code" autocomplete="one-time-code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button"
                            class="text-sm text-secondary/70 hover:text-secondary-400/70 cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                            {{ __('Código de recuperación') }}
                        </button>

                        <button type="button"
                            class="text-sm text-secondary/70 hover:text-secondary-400/70 underline cursor-pointer" x-cloak
                            x-show="recovery"
                            x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                            {{ __('Use un código de autenticación') }}
                        </button>

                        <x-button class="ms-4">
                            {{ __('Acceder') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
