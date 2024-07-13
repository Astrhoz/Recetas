<nav class="bg-secondary w-full fixed p-5 md:flex md:items-center md:justify-between text-primary shadow">
    <div class="flex justify-between items-center">
        <span class="text-3xl font-semibold font-playwrite cursor-pointer text-primary">
            {{-- Logotipo --}}
            Recetero
        </span>
        <span class="cursor-pointer mx-2 md:hidden block" onclick="toggleMenu()">
            <x-bytesize-menu class="h-6 w-6 text-primary" name="menu" />
        </span>
    </div>
    <div>
        <ul id="nav-menu" class="md:flex -z-10 md:items-center md:static absolute bg-secondary w-full left-0 md:w-auto md:py-0 top-[-400px] md:pl-0 pl-7 text-nowrap">
            <li class="mx-4 my-6 md:my-0"><a href="#about" class="text-md hover:text-lg duration-300">Acerca de</a></li>
            <li class="mx-4 my-6 md:my-0"><a href="#explore" class="text-md hover:text-lg duration-300">Explorar</a></li>
            <li class="mx-4 my-6 md:my-0"><a href="#categories" class="text-md hover:text-lg duration-300">Categorias</a>
            </li>
            <li class="mx-4 my-6 md:my-0"><a href="#cards" class="text-md hover:text-lg duration-300">Tendencias</a></li>
            @if (Route::has('login'))
                <div class="flex items-center gap-2 whitespace-nowrap pl-4 my-6 md:my-0">
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
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('nav-menu');
        if (menu.classList.contains('top-[-400px]')) {
            menu.classList.remove('top-[-400px]');
            menu.classList.add('top-[76px]'); // Ajusta esta altura según tu diseño
        } else {
            menu.classList.remove('top-[76px]');
            menu.classList.add('top-[-400px]');
        }
    }
</script>
