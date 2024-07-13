<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminWidgetChart extends ChartWidget
{
    protected static ?string $heading = 'User and Recipe Growth';

    protected function getData(): array
    {
        // Definir el rango de fechas (últimos 30 días)
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        // Obtener los datos de crecimiento de usuarios por día
        $userGrowth = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Obtener los datos de crecimiento de recetas por día
        $recipeGrowth = Recipe::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Generar una lista completa de fechas dentro del rango
        $dates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[$date->format('Y-m-d')] = 0;  // Inicializar con 0
        }

        // Preparar los datos de crecimiento de usuarios
        $userCounts = $dates;
        foreach ($userGrowth as $user) {
            $userCounts[$user->date] = $user->count;
        }

        // Preparar los datos de crecimiento de recetas
        $recipeCounts = $dates;
        foreach ($recipeGrowth as $recipe) {
            $recipeCounts[$recipe->date] = $recipe->count;
        }

        return [
            'labels' => array_keys($dates),
            'datasets' => [
                [
                    'label' => 'User Growth',
                    'data' => array_values($userCounts),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
                [
                    'label' => 'Recipe Growth',
                    'data' => array_values($recipeCounts),
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}