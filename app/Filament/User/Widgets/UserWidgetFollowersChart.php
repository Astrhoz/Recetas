<?php

namespace App\Filament\User\Widgets;

use App\Models\Follower;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserWidgetFollowersChart extends ChartWidget
{
    protected static ?string $heading = 'Followers';

    protected function getData(): array
    {
        $user = Auth::user();

        // Definir el rango de fechas (últimos 30 días)
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        // Obtener los datos de crecimiento de seguidores del usuario autenticado por día
        $followerGrowth = Follower::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('followed_id', $user->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Generar una lista completa de fechas dentro del rango
        $dates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates[$date->format('Y-m-d')] = 0;  // Inicializar con 0
        }

        // Preparar los datos de crecimiento de seguidores
        $followerCounts = $dates;
        foreach ($followerGrowth as $follower) {
            $followerCounts[$follower->date] = $follower->count;
        }

        return [
            'labels' => array_keys($followerCounts),
            'datasets' => [
                [
                    'label' => 'Follower Growth',
                    'data' => array_values($followerCounts),
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
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
