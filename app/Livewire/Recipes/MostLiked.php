<?php

namespace App\Livewire\Recipes;

use Livewire\WithPagination;
use App\Models\Recipe;
use App\Models\Like;
use Livewire\Component;

class MostLiked extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        // Obtener los IDs de recetas con más likes
        $recipesWithMostLikesIds = Like::selectRaw('recipe_id, COUNT(id) as likes_count')
                                       ->groupBy('recipe_id')
                                       ->orderBy('likes_count', 'DESC')
                                       ->pluck('recipe_id');

        // Obtener los detalles de las recetas ordenadas por la cantidad de likes
        $recipes = Recipe::whereIn('id', $recipesWithMostLikesIds)
                         ->orderByRaw('FIELD(id, ' . implode(',', $recipesWithMostLikesIds->toArray()) . ')')
                         ->paginate(10); // Ajusta el número según lo necesario

        return view('livewire.recipes.most-liked', [
            'recipes' => $recipes, // Pasar las recetas a la vista
        ]);
    }
}
