<?php

namespace App\Livewire\Recipes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Recipe;

class FeedRecipe extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    // Maneja la búsqueda a través de query string y listeners
    protected $queryString = ['search'];

    // Listeners que actualizan la búsqueda
    protected $listeners = ['search' => 'updateSearch'];

    // Método que actualiza la búsqueda y reinicia la paginación
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage(); // Reiniciar paginación cuando se actualiza la búsqueda
    }

    // Propiedad computada para obtener las recetas en función del término de búsqueda
    public function getRecipesProperty()
    {
        return Recipe::orderBy('created_at', 'desc')
            ->with('users')
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.recipes.feed-recipe', [
            'recipes' => $this->recipes, // Pasar las recetas a la vista
        ]);
    }
}
