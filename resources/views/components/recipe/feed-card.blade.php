<div class="w-full max-w-md overflow-hidden rounded-lg shadow-lg bg-secondary-100">
    <div class="p-0">
        <img src="/placeholder.svg" width=600
        height=400 alt="Social Media Content" class="object-cover w-full h-56" />
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full bg-secondary-300 transition">
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                @endif
                <div>
                    <h3 class="text-xl font-semibold text-secondary-900">Usuario</h3>
                    <p class="text-sm text-muted-foreground text-secondary-900/70">@usuario</p>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-secondary-900">Titulo</h2>
                <p class="text-muted-foreground text-secondary-800/80">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit omnis totam aperiam distinctio possimus quod cupiditate sed ipsum sunt, nesciunt maiores id minus, ipsam quam ratione similique vitae. Minus, hic.</p>
            </div>
            <div class="flex flex-wrap gap-2 mt-4">
                <div class="px-3 bg-secondary-300 py-1 bg-muted rounded-full text-xs font-medium text-muted-foreground">
                    Tag 1
                </div>
                <div class="px-3 bg-secondary-300 py-1 bg-muted rounded-full text-xs font-medium text-muted-foreground">
                    Tag 2
                </div>
                <div class="px-3 bg-secondary-300 py-1 bg-muted rounded-full text-xs font-medium text-muted-foreground">
                    Tag 3
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 pb-6">
        <button class="w-full text-secondary/70 hover:underline">Ver más</button>
    </div>
    <div class="bg-secondary-50/40 px-6 py-4">
        <h3 class="text-lg text-secondary/70 font-semibold mb-2">Categorías</h3>
        <div class="grid grid-cols-2 gap-4">
            <a href="#" class="text-secondary-700 hover:underline">Dietas</a>
            <a href="#" class="text-secondary-700 hover:underline">Ensaladas</a>
            <a href="#" class="text-secondary-700 hover:underline">Pizza</a>
            <a href="#" class="text-secondary-700 hover:underline">Tecnología</a>
        </div>
    </div>
</div>
