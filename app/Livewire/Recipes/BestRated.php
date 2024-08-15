<?php

namespace App\Livewire\Recipes;

use Livewire\WithPagination;
use App\Models\Recipe;
use App\Models\Rating;
use Livewire\Component;

class BestRated extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        // Obtener los IDs de recetas ordenados por el promedio de calificación más alto
        $topRatedRecipeIds = Rating::selectRaw('recipe_id, AVG(score) as average_rating')
                                   ->groupBy('recipe_id')
                                   ->orderBy('average_rating', 'DESC')
                                   ->pluck('recipe_id');

        // Obtener las recetas que coinciden con los IDs obtenidos, respetando el orden
        $recipes = Recipe::whereIn('id', $topRatedRecipeIds)
                         ->orderByRaw('FIELD(id, ' . implode(',', $topRatedRecipeIds->toArray()) . ')')
                         ->paginate(10); // Ajusta el número según lo necesario

        return view('livewire.recipes.best-rated', [
            'recipes' => $recipes, // Pasar las recetas a la vista
        ]);
    }
}
