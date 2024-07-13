@props(['recipe'])

<div class="bg-secondary rounded-lg">
    <img src="{{ asset('storage/' . $recipe->images) }}" alt="Receta popular" width="550" height="310" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <h3 class="text-primary text-xl font-semibold mb-2"> {{ $recipe->title }} </h3>
        <p class="text-primary mb-4 font-extralight">
            {{ \Illuminate\Support\Str::limit($recipe->description, 100) }}
        </p>
        <a href="#" class="inline-flex items-center gap-2 bg-secondary-100/80 text-secondary px-4 py-2 rounded-md hover:bg-secondary-900 hover:text-primary">
            Ver receta
        </a>
    </div>
</div>
