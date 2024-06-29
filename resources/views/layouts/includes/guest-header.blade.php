<header class="fixed w-full bg-secondary text-primary py-4 px-6 flex items-center justify-between">
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo.svg') }}" alt="Logotipo" class="h-10 w-10">
        <h1 class="text-2xl font-bold">Recetero</h1>
    </div>
    <nav class="hidden md:flex items-center gap-4">
        <a href="#" class="hover:underline">Explorar</a>
        <a href="#" class="hover:underline">Tendencias</a>
        <a href="#" class="hover:underline">Categorías</a>
        <a href="#" class="hover:underline">Acerca de</a>
    </nav>
    @if (Route::has('login'))
        <div class="flex items-center gap-2">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-primary ring-1 ring-transparent transition hover:text-secondary/70 focus:outline-none"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="px-4 py-2 rounded-md bg-primary text-secondary hover:bg-secondary-900 hover:text-primary"
                >
                    Iniciar Sesión
                </a>
                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="px-4 py-2 rounded-md border border-primary hover:bg-primary hover:text-secondary"
                >
                    Registrarse
                </a>
                @endif
            @endauth
        </div>
    @endif
</header>
