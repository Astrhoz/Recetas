<?php

namespace App\Livewire\Recipes;

use Livewire\Component;
use App\Models\Recipe;

class FeedRecipe extends Component
{
    public $recipes;

    public function mount()
    {
        $this->recipes = Recipe::all();
    }

    public function render()
    {
        return view('livewire.recipes.feed-recipe');
    }
}
