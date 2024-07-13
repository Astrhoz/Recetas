<?php

namespace App\Filament\User\Widgets;

use App\Models\Recipe;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class UserWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        // Obtener el usuario actualmente autenticado
        $user = Auth::user();
        // Obtener el número de recetas del usuario actualmente autenticado
        $recipeCount = Recipe::where('user_id', $user->id)->count();

        return [
            Stat::make('Recipes', $recipeCount),
        ];
    }
}
