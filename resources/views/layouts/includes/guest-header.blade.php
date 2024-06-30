<header class="fixed w-full bg-secondary text-primary py-4 px-6 flex items-center justify-between">
    <div class="flex items-center gap-2 whitespace-nowrap pr-3">
        <img src="{{ asset('images/logo.svg') }}" alt="Logotipo" class="h-10 w-10">
        <h1 class="text-3xl font-bold font-playwrite">Recetero</h1>
    </div>
    <nav class="hidden md:flex gap-4 whitespace-nowrap px-6">
        <a href="#about" class="hover:underline">Acerca de</a>
        <a href="#explore" class="hover:underline">Explorar</a>
        <a href="#categories" class="hover:underline">Categorías</a>
        <a href="#cards" class="hover:underline">Tendencias</a>
    </nav>
    @if (Route::has('login'))
        <div class="flex items-center gap-2 whitespace-nowrap pl-3">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="px-4 py-2 rounded-md bg-primary text-secondary hover:bg-secondary-900 hover:text-primary">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="px-4 py-2 rounded-md bg-primary text-secondary hover:bg-secondary-900 hover:text-primary">
                    Iniciar Sesión
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-md border border-primary hover:bg-primary hover:text-secondary">
                        Registrarse
                    </a>
                @endif
            @endauth
        </div>
    @endif
</header>
