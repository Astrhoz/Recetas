<x-app-layout>
    <!-- Contenedor de pestañas -->
    <div class="bg-secondary-200 rounded-md shadow-xl mx-4 md:mx-12 lg:mx-36 p-1">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <!-- Enlace a los usuarios a los que sigues -->
            <div class="flex justify-center">
                <a href="{{ route('following') }}"
                   class="text-sm font-medium py-1 px-4 w-full text-center rounded-md
                          {{ request()->routeIs('following') ? 'text-secondary-800 bg-secondary-50' : 'text-secondary-400' }}
                          hover:bg-secondary-300 transition-colors duration-300">
                    Usuarios a los que sigues
                </a>
            </div>
            <!-- Enlace a los usuarios que te siguen -->
            <div class="flex justify-center">
                <a href="{{ route('followers') }}"
                   class="text-sm font-medium py-1 px-4 w-full text-center rounded-md
                          {{ request()->routeIs('followers') ? 'text-secondary-800 bg-secondary-50' : 'text-secondary-400' }}
                          hover:bg-secondary-300 transition-colors duration-300">
                    Usuarios que te siguen
                </a>
            </div>
        </div>
    </div>

    <!-- Contenido dinámico -->
    <div class="mt-4">
        @if (request()->routeIs('following'))
            @livewire('follows.following')
        @elseif (request()->routeIs('followers'))
            @livewire('follows.followers')
        @endif
    </div>
</x-app-layout>
