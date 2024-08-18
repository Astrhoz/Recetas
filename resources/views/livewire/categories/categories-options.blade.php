<div>
    @foreach($categories as $category)
        @php
            // Generar la URL para la categoría actual
            $categoryUrl = route('categories.show', ['category' => $category->id]);

            // Comparar la URL generada con la URL actual para activar el enlace
            $isActive = request()->url() == $categoryUrl;
        @endphp

        <x-side-nav-link 
            href="{{ $categoryUrl }}" 
            :active="$isActive"
            class="ml-8 text-sm" 
            :key="$category->id"
        >
            {{ $category->name }}
        </x-side-nav-link>
    @endforeach
</div>
