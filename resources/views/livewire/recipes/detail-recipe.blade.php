<div>
    <div class="w-full text-secondary-900 bg-secondary-50 shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <h1 class="font-playwrite text-4xl font-bold">{{ $recipe->title }}</h1>
                    <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-secondary-400/80 hover:bg-secondary-200 py-2 px-3 rounded-full">
                        <x-bytesize-arrow-left class="h-5 w-5 "/>
                        Regresar
                    </a>
                </div>

                <!-- Publicado por y fecha -->
                <div class="flex items-center mt-2 text-secondary-700">
                    @if($recipe->users->profile_photo_path)
                        <img src="{{ asset('storage/' . $recipe->users->profile_photo_path) }}" alt="{{ $recipe->users->name }}" class="w-8 h-8 rounded-full mr-2">
                    @else
                        <div class="w-8 h-8 rounded-full bg-purple-200 flex items-center justify-center text-secondary-800 text-sm font-semibold mr-2">
                            {{ strtoupper(substr($recipe->users->name, 0, 1)) }}{{ strtoupper(substr($recipe->users->name, strpos($recipe->users->name, ' ') + 1, 1)) }}
                        </div>
                    @endif
                    <p class="text-sm">
                        Por {{ $recipe->users->name }} • Publicada el {{ $recipe->created_at->format('d M, Y') }}
                    </p>
                </div>
            </div>

            <p class="text-secondary-900 mb-6">{{ $recipe->description }}</p>
            <div class="flex items-center justify-center mb-6">
                <img src="{{ asset('storage/' . $recipe->images) }}" alt="Imagen de {{ $recipe->title }}" class="w-full md:w-1/2 lg:w-1/3 h-auto object-cover rounded-lg shadow-md">
            </div>

            <!-- Componente para calificar la receta -->
            <livewire:ratings.rate-recipe :recipeId="$recipe->id" />

            <h2 class="text-2xl font-semibold mb-3">Ingredientes</h2>
            <ul class="list-disc pl-8 mb-6">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="text-secondary-900 mb-3">{{ $ingredient->quantity }} {{ $ingredient->unit_of_measurement }} de {{ $ingredient->name }}</li>
                @endforeach
            </ul>

            <h2 class="text-2xl font-semibold mb-3">Preparación</h2>
            <div class="text-secondary-900 prose mb-6">
                {!! $recipe->steps !!}
            </div>

            <h2 class="text-2xl font-semibold mb-3">Consejos</h2>
            <p class="text-secondary-900 mb-6">{{ $recipe->tips }}</p>

            <h2 class="text-2xl font-semibold mb-3">Categorías</h2>
            <ul class="list-disc pl-5 mb-6">
                @foreach ($recipe->categories as $category)
                    <li class="text-secondary-900 mb-3">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="p-6">
        <!-- Componente para los comentarios -->
        <livewire:comments.comments-recipe :recipeId="$recipe->id" />
    </div>
</div>
