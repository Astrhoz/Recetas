<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo" class="w-full max-w-lg mx-auto">
            <div class="flex flex-col items-center justify-center">
                <!--<x-authentication-card-logo />-->

                <div>
                    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-secondary">
                        <strong>Bienvenido a Recetero</strong>
                    </h2>
                    <p class="mt-2 text-center text-sm text-secondary/70">
                        Inicie sesión en su cuenta o cree una nueva     
                    </p>   
                </div>
            </div>
        </x-slot>

        <!-- Tabs -->
        <div class="grid grid-cols-2 p-1 bg-secondary-200 rounded-md mt-6 shadow-lg">
            <div class="flex justify-center">
                <a href="{{ route('login') }}" 
                class="text-sm font-medium {{ request()->routeIs('login') ? 'text-secondary-800/80 bg-secondary-50' : 'text-secondary-400/90' }} py-1 w-full flex justify-center rounded-md">
                    Iniciar sesión
                </a>
            </div>        
            <div class="flex justify-center">
                <a href="{{ route('register') }}" 
                class="text-sm font-medium {{ request()->routeIs('register') ? 'text-secondary-800/80 bg-secondary-50' : 'text-secondary-400/90' }} py-1 w-full flex justify-center rounded-md">
                    Registrarse
                </a>
            </div>    
        </div>

        <div class="w-full min-w-[300px] sm:min-w-[450px] sm:max-w-md mt-6 px-6 py-4 bg-secondary-50 shadow-xl overflow-hidden sm:rounded-lg">
            <!-- Authentication Forms -->
            @if (request()->routeIs('login'))
                @include('auth.login')
            @elseif (request()->routeIs('register'))
                @include('auth.register')
            @endif
        </div>
    </x-authentication-card>
</x-guest-layout>
