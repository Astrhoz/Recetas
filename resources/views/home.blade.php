<x-guest-layout>
    @include('layouts.includes.guest-header')

    <section id="about" class="flex flex-col items-center justify-center bg-secondary text-center text-primary min-h-screen">
        <h1 class="mt-[4vw] text-[10vw] font-extrabold leading-none">RECETERO</h1>
        <img src="https://static.vecteezy.com/system/resources/previews/025/065/315/non_2x/fast-food-meal-with-ai-generated-free-png.png"
            alt="Recetero" class="h-[45vw] max-h-[400px] mt-[-4vw] object-cover" />
        <div class="text-lg font-thin px-8 mt-12">
            <strong>Recetero</strong> es una red social donde puedes encontrar recetas de cualquier tipo realizadas por
            otros usuarios. Principalmente queremos que encuentres recetas según los ingredientes que tengas disponible
            en tu hogar. Además, buscamos que puedas interactuar con nuestra web, de formas similares a como lo harías
            en otras páginas.
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="bg-primary py-12 px-6">
        <div id="explore" class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8">
            <!-- Receta Destacada -->
            <div>
                <img src="https://image.lexica.art/full_webp/124b0f77-5310-4c3b-93f5-eae8e05308e3"
                    alt="Receta Destacada" height="550" width="310" class="w-full h-auto rounded-lg object-cover">
            </div>
            <div class="space-y-4">
                <div class="inline-block bg-secondary text-primary px-3 py-1 rounded-md text-sm font-semibold">Receta
                    Destacada</div>
                <h2 class="font-playwrite text-secondary text-3xl font-bold">Título Receta Destacada</h2>
                <p class="text-secondary">
                    Indulge in this delectable creamy garlic shrimp pasta, a perfect balance of flavors and textures.
                    Savor
                    the tender shrimp, al dente pasta, and a rich, velvety sauce in every bite.
                </p>
                <a href="#explore"
                    class="inline-flex items-center gap-2 bg-secondary text-primary px-4 py-2 rounded-md hover:bg-secondary-900">
                    Ver receta
                    <x-bytesize-arrow-right class="h-4 w-4 text-primary" />
                </a>
            </div>
        </div>

        <!-- Buscador de recetas -->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Buscar Recetas</h2>
            </div>
            <div class="text-secondary-900">
                <input type="text" placeholder="Ingresa lo que quieres encontrar..."
                    class="w-full bg-secondary-200 border-none py-3 pl-12 pr-4 rounded-md focus:ring-2 focus:ring-primary-200 placeholder:text-secondary-300" />
            </div>
        </div>

        <!-- Categorías -->
        <div id="categories" class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Categorías de comida</h2>
                <a href="#categories" class="text-secondary hover:text-secondary-600">Ver todas</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <x-post.category-card :category="$category"/>
                @endforeach
            </div>
        </div>

        <!-- Tarjetas de recetas -->
        <div id="cards" class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Recetas Populares</h2>
                <a href="#cards" class="text-secondary hover:text-secondary-700">Ver todas</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($recipes as $recipe)
                    <x-post.post-card img="{{ $recipe->images }}"
                        title="{{ $recipe->title }}"
                        paragraph="{{ $recipe->description }}" />
                @endforeach
            </div>
        </div>
    </section>

    @include('layouts.includes.guest-footer')
</x-guest-layout>
