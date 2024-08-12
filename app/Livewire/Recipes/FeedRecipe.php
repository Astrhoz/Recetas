<?php

namespace App\Livewire\Recipes;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Models\Recipe;

class FeedRecipe extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    protected $listeners = ['search' => 'updateSearch'];

    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function recipes()
    {
        return Recipe::orderBy('created_at', 'desc')
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(1);
    }

    public function render()
    {
        return view('livewire.recipes.feed-recipe');
    }
}
