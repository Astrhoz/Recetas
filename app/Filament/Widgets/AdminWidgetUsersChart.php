<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AdminWidgetUsersChart extends ChartWidget
{
    protected static ?string $heading = null;

    public function __construct()
    {
        static::$heading = __('filament.widgets.user_growth_heading');
    }

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

        return [
            'labels' => array_keys($dates),
            'datasets' => [
                [
                    'label' => __('filament.widgets.user_growth_label'),
                    'data' => array_values($userCounts),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
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
