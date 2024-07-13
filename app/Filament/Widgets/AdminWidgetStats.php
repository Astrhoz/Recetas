<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

class AdminWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener el número de categorías, recetas y usuarios
        $categoryCount = Category::count();
        $recipeCount = Recipe::count();
        $userCount = User::count();

        return [
            Stat::make('Recipes', $recipeCount),
            Stat::make('Categories', $categoryCount),
            Stat::make('Users', $userCount),
        ];
    }
}
