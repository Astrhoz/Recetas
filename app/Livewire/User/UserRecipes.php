<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class UserRecipes extends Component
{
    public $recipes;
    public $showModal = false;
    public $recipeIdToDelete;

    public function mount()
    {
        // Obtén el usuario actual
        $user = Auth::user();

        // Obtén las recetas creadas por el usuario actual
        $this->recipes = Recipe::where('user_id', $user->id)->get();
    }

    public function deleteRecipe($recipeId)
    {
        // Encuentra la receta o muestra un error si no se encuentra
        $recipe = Recipe::where('id', $recipeId)->where('user_id', Auth::id())->first();

        if ($recipe) {
            $recipe->delete();
            // Actualiza la lista de recetas
            $this->recipes = Recipe::where('user_id', Auth::id())->get();
            // Cierra el modal
            $this->showModal = false;
            // Mensaje de éxito
            session()->flash('message', 'Receta eliminada exitosamente.');
        } else {
            // Mensaje de error si la receta no se encuentra
            session()->flash('error', 'No se pudo encontrar la receta.');
        }
    }

    public function confirmDelete($recipeId)
    {
        $this->recipeIdToDelete = $recipeId;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.user.user-recipes');
    }
}
