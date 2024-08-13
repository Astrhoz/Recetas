<?php

namespace App\Livewire\Recipes;

use Livewire\Component;
use App\Models\Recipe;

class DetailRecipe extends Component
{
    public Recipe $recipe;

    public function render()
    {
        return view('livewire.recipes.detail-recipe');
    }
}
