<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $recipe->title }}</h1>
            <p class="text-gray-700 mb-6">{{ $recipe->description }}</p>

            <h2 class="text-2xl font-semibold mb-3">Ingredientes</h2>
            <ul class="list-disc pl-5 mb-6">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="text-gray-800">{{ $ingredient->quantity }} {{ $ingredient->unit_of_measurement }} de {{ $ingredient->name }}</li>
                @endforeach
            </ul>

            <h2 class="text-2xl font-semibold mb-3">Preparación</h2>
            <div class="prose lg:prose-xl mb-6">
                {!! $recipe->steps !!}
            </div>

            <h2 class="text-2xl font-semibold mb-3">Consejos</h2>
            <p class="text-gray-800 mb-6">{{ $recipe->tips }}</p>

            <h2 class="text-2xl font-semibold mb-3">Categorías</h2>
            <ul class="list-disc pl-5 mb-6">
                @foreach ($recipe->categories as $category)
                    <li class="text-gray-800">{{ $category->name }}</li>
                @endforeach
            </ul>

            <h2 class="text-2xl font-semibold mb-3">Imágenes</h2>
            <img src="{{ asset('storage/' . $recipe->images) }}" alt="Imagen de {{ $recipe->title }}" class="w-full md:w-1/2 lg:w-1/3 h-auto object-cover rounded-lg shadow-md">
        </div>
    </div>
</div>