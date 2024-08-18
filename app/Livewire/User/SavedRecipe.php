<?php

namespace App\Livewire\User;

use Livewire\WithPagination;
use App\Models\Recipe;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SavedRecipe extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        // Obtener los IDs de recetas a las que el usuario ha dado like
        $likedRecipeIds = Like::where('user_id', $userId)
                              ->pluck('recipe_id');

        // Obtener las recetas que coinciden con los IDs obtenidos
        $recipes = Recipe::whereIn('id', $likedRecipeIds)
                         ->paginate(10); // Ajusta el número según lo necesario

        return view('livewire.user.saved-recipe', [
            'recipes' => $recipes, // Pasar las recetas a la vista
        ]);
    }
}
