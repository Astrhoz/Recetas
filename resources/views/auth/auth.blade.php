<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo" class="w-full max-w-lg mx-auto">
            <div class="flex flex-col items-center justify-center">
                <x-authentication-card-logo />

                <div class="text-center mt-5">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-50">
                        <strong>Bienvenido a Recetero</strong>
                    </h2>
                    <p class="mt-2 text-8xl text-gray-600 dark:text-gray-400">
                        Inicie sesión en su cuenta o cree una nueva     
                    </p>   
                </div>
                
                <!-- Tabs -->
                <div class="w-full max-w-lg mx-auto grid grid-cols-2 py-1 px-1 bg-gray-200 p-4 rounded-md mt-5">
                        
                        <div class="flex justify-center " >
                            <a href="{{ route('login') }}" 
                            class="text-sm font-medium {{ request()->routeIs('login') ? 'text-primary-600 bg-white' : 'text-primary-600 bg-gray-300' }} hover:underline dark:text-primary-500 py-1 w-full flex justify-center rounded-md transition">
                                Iniciar sesión
                            </a>
                        </div>
                        
                        <div class="flex justify-center ">
                            <a href="{{ route('register') }}" 
                            class="text-sm font-medium {{ request()->routeIs('register') ? 'text-primary-600 bg-white' : 'text-primary-600 bg-gray-300' }} hover:underline dark:text-primary-500 py-1 w-full flex justify-center rounded-md transition">
                                Registrarse
                            </a>
                        </div>    
                </div>  
                
            </div>
        </x-slot>

        <div class="w-full max-w-lg mx-auto mt-6 space-y-8">
            <!-- Authentication Forms -->
            @if (request()->routeIs('login'))
                @include('auth.login')
            @elseif (request()->routeIs('register'))
                @include('auth.register')
            @endif
        </div>
    </x-authentication-card>
</x-guest-layout>

