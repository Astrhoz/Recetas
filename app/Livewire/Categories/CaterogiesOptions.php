<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoriesOptions extends Component
{
    public function render()
    {
        // Obtener las categorías ordenadas por el número de recetas y tomar las 4 primeras
        $categories = Category::withCount('recipes')
            ->orderBy('recipes_count', 'desc')
            ->take(4)
            ->get();

        // Pasar las categorías filtradas a la vista
        return view('livewire.categories.categories-options', [
            'categories' => $categories,
        ]);
    }
}

