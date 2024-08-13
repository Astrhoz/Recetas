<div class="w-full text-secondary-900 bg-secondary-50 shadow-md rounded-lg overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-playwrite text-4xl font-bold">{{ $recipe->title }}</h1>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-secondary-400/80 hover:bg-secondary-200 py-2 px-3 rounded-full">
                <x-bytesize-arrow-left class="h-5 w-5 "/>
                Regresar
            </a>
        </div>
        <p class="text-secondary-900 mb-6">{{ $recipe->description }}</p>
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('storage/' . $recipe->images) }}" alt="Imagen de {{ $recipe->title }}" class="w-full md:w-1/2 lg:w-1/3 h-auto object-cover rounded-lg shadow-md">
        </div>

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
