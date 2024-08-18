<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoriesOptions extends Component
{
    public $categories = [];

    public function mount() {
        $this->categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'desc')
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.categories.categories-options', [
            'categories' => $this->categories,
        ]);
    }
}
