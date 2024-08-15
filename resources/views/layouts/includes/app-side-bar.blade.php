<div class="hidden border-r border-secondary-200 bg-secondary-100 lg:block">
    <div class="flex h-full max-h-screen flex-col gap-2">
        <div class="flex h-[60px] items-center border-b border-secondary-200 pl-3">
            <a href="{{ url('/') }}" class="flex items-center font-semibold">
                <x-logo class="h-12" />
                <span class="text-3xl font-semibold font-playwrite cursor-pointer text-secondary">Recetas</span>
            </a>
        </div>
        <div class="flex-1 overflow-auto py-2">
            <nav>
                <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')">
                    <x-bytesize-bookmark class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Explorar') }}
                </x-side-nav-link>

                <x-side-nav-link href="{{ route('best-rated') }}" :active="request()->routeIs('best-rated')">
                    <x-bytesize-star class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Tendencias') }}
                </x-side-nav-link>

                <x-side-nav-link href="{{ route('most-liked') }}" :active="request()->routeIs('most-liked')">
                    <x-bytesize-heart class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Populares') }}
                </x-side-nav-link>

                {{-- Subsección con título y enlaces --}}
                <div class="flex items-center gap-3 text-secondary-500 ml-4 mt-2 mb-1 font-semibold">
                    <x-bytesize-book class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    Categorías
                </div>
                <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')" class="ml-8 text-sm">
                    {{ __('Categoría 1') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')" class="ml-8 text-sm">
                    {{ __('Categoría 2') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')" class="ml-8 text-sm">
                    {{ __('Categoría 3') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('new-recipe') }}" class="ml-8 text-sm">
                    {{ __('Categoría 4') }}
                </x-side-nav-link>

                {{-- Usuarios a los que está siguiendo --}}
                <x-side-nav-link href="{{ route('following') }}" :active="(request()->routeIs('following')) || (request()->routeIs('followers'))">
                    <x-bytesize-user class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Siguiendo') }}
                </x-side-nav-link>
            </nav>
        </div>
    </div>
</div>

<div class="fixed bottom-0 left-0 z-50 w-full h-16 bg-secondary-100 border-t border-secondary-200 flex justify-around items-center lg:hidden">
    <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')">
        <x-bytesize-bookmark class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')">
        <x-bytesize-lightning class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')">
        <x-bytesize-book class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
    </x-side-nav-link>

    <x-side-nav-link href="{{ route('following') }}" :active="request()->routeIs('following') || (request()->routeIs('followers'))">
        <x-bytesize-user class="h-6 w-6 text-secondary-400/70 fill-secondary-400/70" />
    </x-side-nav-link>
</div>






