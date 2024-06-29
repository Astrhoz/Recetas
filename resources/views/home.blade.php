<x-guest-layout>
    @include('layouts.includes.guest-header')

    <section class="flex flex-col items-center justify-center min-h-scree bg-secondary text-center text-primary py-20">
        <h1 class="text-[10vw] font-bold leading-none">RECETERO</h1>
        <img
            src="https://static.vecteezy.com/system/resources/previews/025/065/315/non_2x/fast-food-meal-with-ai-generated-free-png.png"
            alt="Recetero"
            class="h-[400px] mt-[-50px] object-cover mb-"
        />
        <div class="text-lg px-4 mt-12">
            <strong>Recetero</strong> es una red social donde puedes encotrar recetas de cualquier tipo realizadas por otros usuario, principalmente queremos que encuntres recetas según los ingredientes que tengas disponible en tu hogar.
            Además buscamos que puedas interactuar con nuestra web, de formas similares a como lo harías en otras páginas.
        </div>
    </section>

    <section class="bg-primary py-12 px-6">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8">
            <!--Receta Destacada-->
            <div>
                <img src="https://image.lexica.art/full_webp/124b0f77-5310-4c3b-93f5-eae8e05308e3" alt="Receta Destacada" height="550" width="310" class="w-full h-auto rounded-lg object-cover">
            </div>
            <div class="space-y-4">
                <div class="inline-block bg-secondary text-primary px-3 py-1 rounded-md text-sm">Receta Destacada</div>
                <h2 class="text-secondary text-3xl font-bold">Título Receta Destacada</h2>
                <p class="text-secondary">
                    Indulge in this delectable creamy garlic shrimp pasta, a perfect balance of flavors and textures. Savor
                    the tender shrimp, al dente pasta, and a rich, velvety sauce in every bite.
                </p>
                <a
                    href="#"
                    class="inline-flex items-center gap-2 bg-secondary text-primary px-4 py-2 rounded-md hover:bg-secondary-900"
                >
                    Ver receta
                </a>
            </div>
        </div>
        <!--Buscador de recetas-->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Buscar Recetas</h2>
            </div>
            <div class="text-secondary-900">
                <input
                    type="text"
                    placeholder="Ingresa tu lo quieres encontrar..."
                    class="w-full bg-secondary-200 border-none py-3 pl-12 pr-4 rounded-md focus:ring-2 focus:ring-primary-400 placeholder:text-secondary-300"
                />
            </div>
        </div>
        <!--Categorías-->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Categorías de comida</h2>
                <a href="#" class="text-secondary hover:text-secondary-900">Ver todas</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <a href="#" class="bg-secondary rounded-lg p-4 flex flex-col items-center gap-2 hover:bg-secondary-900">
                    <span class="text-primary font-medium">Esaladas</span>
                </a>
                <a href="#" class="bg-secondary rounded-lg p-4 flex flex-col items-center gap-2 hover:bg-secondary-900">
                    <span class="text-primary font-medium">Fritos</span>
                </a>
                <a href="#" class="bg-secondary rounded-lg p-4 flex flex-col items-center gap-2 hover:bg-secondary-900">
                    <span class="text-primary font-medium">Pizzas</span>
                </a>
                <a href="#" class="bg-secondary rounded-lg p-4 flex flex-col items-center gap-2 hover:bg-secondary-900">
                    <span class="text-primary font-medium">Haburguesas</span>
                </a>
            </div>
        </div>
        <!--Tarjetas de recetas-->
        <div class="max-w-5xl mx-auto mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-secondary text-2xl font-bold">Recetas Populares</h2>
                <a href="#" class="text-secondary hover:text-secondary-900">Ver todas</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
                <x-post.post-card img="https://image.lexica.art/full_webp/0c164d71-4aa3-4625-bba0-a1b40c60c3be"
                title="Baked Salmon with Lemon Dill Sauce" paragraph="Elevate your dinner with this delicious baked salmon recipe, topped with a tangy lemon dill sauce."/>
            </div>
        </div>
    </section>

    @include('layouts.includes.guest-footer')
</x-guest-layout>
