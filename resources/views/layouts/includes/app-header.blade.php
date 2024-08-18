<header x-data="{ open: false }" class="flex items-center gap-4 border-b border-secondary-200 bg-secondary-100 px-6 lg:h-[60px] relative z-20">
    @include('partials.search-box')
    <nav class="hidden sm:flex items-center gap-4">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex h-[60px]">
            <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                {{ __('Inicio') }}
            </x-nav-link>
            <x-nav-link href="{{ route('my-recipes') }}" :active="request()->routeIs('my-recipes')">
                {{ __('Mis Recetas') }}
            </x-nav-link>
            <x-nav-link href="{{ route('saved-recipe') }}" :active="request()->routeIs('saved-recipe')">
                {{ __('Mi Almacén') }}
            </x-nav-link>
        </div>
    </nav>
    <!-- DropdownMenu -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <!-- Settings Dropdown -->
        <div class="relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-secondary-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-secondary-500 bg-white hover:text-secondary-700 focus:outline-none focus:bg-secondary-50 active:bg-secondary-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}
                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>
                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs font-medium text-secondary-700/80">
                        {{ __('Administrar Cuenta') }}
                    </div>
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Perfil') }}
                    </x-dropdown-link>
                    {{-- Redirección del dashboard en función del rol del usuario --}}
                    @if (auth()->user()->hasRole('super_admin'))
                        <x-dropdown-link href="/admin">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                    @else
                        <x-dropdown-link href="/user">
                            {{ __('Dashboard') }}
                        </x-dropdown-link>
                    @endif
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif
                    <div class="border-t border-secondary-200"></div>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="flex items-center sm:hidden -me-2">
        <button @click="open = !open"
            class="inline-flex items-center justify-center p-2 rounded-md text-secondary-400 hover:text-secondary-500 hover:bg-secondary-300 focus:outline-none focus:text-secondary-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden w-full absolute left-0 top-full bg-secondary-100">
        <div class="pt-2 pb-3 space-y-1 bg-secondary-50/40 border-t border-secondary-200 text-base font-medium">
            <x-responsive-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('my-recipes') }}" :active="request()->routeIs('my-recipes')">
                {{ __('Mis Recetas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('new-recipe') }}" :active="request()->routeIs('new-recipe')">
                {{ __('Mi Almacén') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-b border-secondary-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
                <div>
                    <div class="font-medium text-base text-secondary-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-secondary-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 text-sm">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                {{-- Redirección del dashboard en función del rol del usuario --}}
                @if (auth()->user()->hasRole('super_admin'))
                    <x-responsive-nav-link href="/admin">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link href="/user">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                @endif
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</header>
