<div class="hidden border-r border-secondary-200 bg-secondary-100 lg:block">
    <div class="flex h-full max-h-screen flex-col gap-2">
        <div class="flex h-[60px] items-center border-b border-secondary-200 px-6">
            <a href="#" class="flex items-center gap-2 font-semibold">
                <x-authentication-card-logo />
                <span class="text-3xl font-semibold font-playwrite cursor-pointer text-secondary">Recetas</span>
            </a>
        </div>
        <div class="flex-1 overflow-auto py-2">
            <nav>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <x-bytesize-bookmark class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Explorar') }}
                </x-side-nav-link>

                <x-side-nav-link href="{{ route('recipes') }}" :active="request()->routeIs('recipes')">
                    <x-bytesize-lightning class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    {{ __('Tendencias') }}
                </x-side-nav-link>

                {{-- Subsección con título y enlaces --}}
                <div class="flex items-center gap-3 text-secondary-500 ml-4 mt-2 mb-1 font-semibold">
                    <x-bytesize-book class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70" />
                    Categorías
                </div>
                <x-side-nav-link href="{{ route('recipes') }}" :active="request()->routeIs('recipes')" class="ml-8 text-sm">
                    {{ __('Categoría 1') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('saved-recipes') }}" :active="request()->routeIs('saved-recipes')" class="ml-8 text-sm">
                    {{ __('Categoría 2') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="ml-8 text-sm">
                    {{ __('Categoría 3') }}
                </x-side-nav-link>
                <x-side-nav-link href="{{ route('dashboard') }}" class="ml-8 text-sm">
                    {{ __('Categoría 4') }}
                </x-side-nav-link>

                {{-- Usuarios a los que está siguiendo --}}
                <x-side-nav-link href="{{ route('saved-recipes') }}" >
                    <x-bytesize-user class="h-4 w-4 text-secondary-400/70 fill-secondary-400/70"/>
                    {{ __('Siguiendo') }}
                </x-side-nav-link>
            </nav>
        </div>
    </div>
</div>
