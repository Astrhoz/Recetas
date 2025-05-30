<!-- Menú lateral para pantallas grandes -->
<div class="hidden border-r border-secondary-200 bg-secondary-100 lg:block sticky top-0 h-screen">
    <div class="flex h-full flex-col gap-2">
        <div class="flex h-[60px] items-center border-b border-secondary-200 pl-3">
            <a href="{{ url('/') }}" class="flex items-center font-semibold">
                <x-logo class="h-12" />
                <span class="text-3xl font-semibold font-playwrite cursor-pointer text-secondary">Recetero</span>
            </a>
        </div>
        <div class="flex-1 overflow-auto py-2">
            <nav>
                <!-- Nueva opción de Inicio -->
                <x-side-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                    <x-bytesize-home class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Inicio') }}
                </x-side-nav-link>

                <x-side-nav-link href="{{ route('explore') }}" :active="request()->routeIs('explore')">
                    <x-bytesize-bookmark class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Explorar') }}
                </x-side-nav-link>

                <x-side-nav-link href="{{ route('best-rated') }}" :active="request()->routeIs('best-rated')">
                    <x-bytesize-star class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Tendencias') }}
                </x-side-nav-link>

                <!-- Nueva opción de Populares -->
                <x-side-nav-link href="{{ route('most-liked') }}" :active="request()->routeIs('most-liked')">
                    <x-bytesize-heart class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Populares') }}
                </x-side-nav-link>

                <div class="flex items-center gap-3 text-secondary-500 ml-3 mt-2 mb-1 font-semibold">
                    <x-bytesize-book class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    Categorías
                </div>

                @livewire('categories.categories-options')

                <x-side-nav-link href="{{ route('following') }}" :active="request()->routeIs('following') || request()->routeIs('followers')">
                    <x-bytesize-user class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Siguiendo') }}
                </x-side-nav-link>
            </nav>
        </div>
    </div>
</div>


<!-- Menú inferior para pantallas pequeñas -->
<div
    class="fixed bottom-0 left-0 z-50 w-full h-16 bg-secondary-100 border-t border-secondary-200 flex justify-between items-center lg:hidden">
    <x-side-nav-link href="{{ url('/') }}" :active="request()->is('/')" class="flex flex-col items-center justify-center">
        <x-bytesize-home class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
        <span class="text-[10px] text-secondary-400 mt-0.5 leading-none">Inicio</span>
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('explore') }}" :active="request()->routeIs('explore')" class="flex flex-col items-center justify-center">
        <x-bytesize-bookmark class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
        <span class="text-[10px] text-secondary-400 mt-0.5 leading-none">Explorar</span>
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('best-rated') }}" :active="request()->routeIs('best-rated')"
        class="flex flex-col items-center justify-center">
        <x-bytesize-star class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
        <span class="text-[10px] text-secondary-400 mt-0.5 leading-none">Tendencias</span>
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('most-liked') }}" :active="request()->routeIs('most-liked')"
        class="flex flex-col items-center justify-center">
        <x-bytesize-heart class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
        <span class="text-[10px] text-secondary-400 mt-0.5 leading-none">Populares</span>
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('following') }}" :active="request()->routeIs('following')"
        class="flex flex-col items-center justify-center">
        <x-bytesize-user class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
        <span class="text-[10px] text-secondary-400 mt-0.5 leading-none">Siguiendo</span>
    </x-side-nav-link>
</div>
