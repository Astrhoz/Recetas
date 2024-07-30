<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @elseif (session()->has('error'))
        <div class="bg-red-500 text-white p-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
        @foreach ($recipes as $recipe)
        <div class="bg-secondary-100 shadow-md rounded-lg overflow-hidden flex flex-col lg:flex-row">
            <img src="{{ asset('storage/' . $recipe->images) }}" alt="Receta popular" class="w-full lg:w-1/3 h-64 object-cover">
            <div class="p-4 flex flex-col justify-between lg:w-2/3 relative">
                <div>
                    <h3 class="text-secondary-900 text-xl font-semibold mb-2"> {{ $recipe->title }} </h3>
                    <p class="text-secondary-800 mb-4 font-light">
                        {{ \Illuminate\Support\Str::limit($recipe->description, 100) }}
                    </p>
                </div>
                <div class="text-center mb-4">
                    <a href="#" class="inline-flex text-sm items-center gap-2 text-secondary-600 underline hover:text-secondary-300">
                        Ver receta
                    </a>
                </div>
            </div>
            <div class="bg-secondary-50/50 rounded-r flex flex-col justify-center p-4 space-y-2">
                <a href="{{ route('edit-recipe', $recipe->id) }}" class="inline-flex items-center gap-2 justify-center bg-secondary-200 text-secondary px-3 py-1 text-sm rounded-md hover:bg-secondary-300">
                    Editar
                </a>
                <button wire:click="confirmDelete({{ $recipe->id }})" class="inline-flex items-center justify-center gap-2 text-red-500/70 px-3 py-1 text-sm hover:text-red-700/70">
                    Eliminar
                </button>
            </div>
        </div>            
        @endforeach
    </div>

    <!-- Modal de Confirmación -->
    @if ($showModal)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-20">
        <div class="bg-primary p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-lg text-secondary-900/70 font-semibold mb-4">Confirmación de Eliminación</h3>
            <p class="mb-4 text-secondary-800">¿Estás seguro de que deseas eliminar esta receta?</p>
            <div class="flex justify-end space-x-2">
                <button wire:click="$set('showModal', false)" class="px-4 py-2 bg-gray-300 text-secondary-700 rounded-md hover:bg-secondary-300">
                    Cancelar
                </button>
                <button wire:click="deleteRecipe({{ $recipeIdToDelete }})" class="px-4 py-2 bg-red-500/70 text-primary rounded-md hover:bg-red-600/70">
                    Eliminar
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
