@props(['recipe'])

<div class="w-full max-w-md overflow-hidden rounded-lg shadow-lg bg-secondary-100">
    <div class="p-0">
        <img src="{{ asset('storage/' . $recipe->images) }}" width=600
        height=400 alt="Social Media Content" class="object-cover w-full h-56" />
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <!-- Foto de perfil del usuario -->
                    <div class="flex text-sm border-2 border-transparent rounded-full bg-secondary-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $recipe->users->profile_photo_url }}" alt="{{ $recipe->users->name }}" />
                    </div>
                @else    
                    <!-- Nombre del usuario en lugar de foto de perfil -->
                    <span class="inline-flex rounded-md">
                        <div class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-secondary-500 bg-white">
                            {{ $recipe->user->name }}
                        </div>
                    </span>
                @endif
                <div>
                    <h4 class="text-xl font-semibold text-secondary-900">{{ $recipe->users->name }}</h4>
                    <p class="text-sm text-muted-foreground text-secondary-900/70">@<span>{{ $recipe->users->name }}</span></p>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-secondary-900">{{ $recipe->title }}</h2>
                <p class="text-muted-foreground text-secondary-800/80">{{ $recipe->description }}</p>
            </div>
            <div class="flex flex-wrap gap-2 mt-4">
                @foreach($recipe->ingredients as $ingredient)
                    <div class="px-3 py-1 bg-secondary-300 rounded-full text-xs font-medium text-muted-foreground">
                        {{ $ingredient->name }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="px-6 pb-6">
        <button class="w-full text-secondary/70 hover:underline">Ver más</button>
    </div>
    <div class="bg-secondary-50/40 px-6 py-4">
        <h3 class="text-lg text-secondary/70 font-semibold mb-2">Categorías</h3>
        <div class="grid grid-cols-2 gap-4">
            @foreach($recipe->categories as $category)
                <a href="#" class="text-secondary-700 hover:underline">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>
