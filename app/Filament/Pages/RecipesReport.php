<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Select;

class RecipesReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static string $view = 'filament.pages.recipes-report';

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): string
    {
        return __("filament.groups.report");
    }

    public function getTitle(): string
    {
        return __("filament.pages.recipe");
    }

    public static function getNavigationLabel(): string
    {
        return __("filament.pages.recipe");
    }

    public $month;
    public $recipes;

    public function mount()
    {
        // Valor por defecto, el mes actual
        $this->month = now()->format('Y-m');
        $this->updateRecipeData();
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('month')
                ->label('Seleccionar mes')
                ->options($this->getMonthsOptions())
                ->default($this->month) // Asegúrate de que $this->month no sea un valor vacío
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->updateRecipeData($state))
                ->selectablePlaceholder(false),
        ];
    }


    public function updateRecipeData($month = null)
    {
        $this->month = $month ?? $this->month;
        $this->recipes = $this->getRecipes();
    }

    public function getRecipes()
    {
        return DB::table('recipes as r')
            ->leftJoin('users as u', 'r.user_id', '=', 'u.id')
            ->leftJoin('likes as l', 'r.id', '=', 'l.recipe_id')
            ->leftJoin('comments as c', 'r.id', '=', 'c.recipe_id')
            ->leftJoin('ratings as ra', 'r.id', '=', 'ra.recipe_id')
            ->leftJoin('category_recipe as cr', 'r.id', '=', 'cr.recipe_id')
            ->leftJoin('categories as cat', 'cr.category_id', '=', 'cat.id')
            ->select(
                'r.title as recipe_title',
                'u.name as user_name',
                DB::raw('GROUP_CONCAT(cat.name SEPARATOR ", ") as categories'),
                DB::raw('COUNT(DISTINCT l.id) as likes_count'),
                DB::raw('COUNT(DISTINCT c.id) as comments_count'),
                DB::raw('COUNT(DISTINCT ra.id) as ratings_count')
            )
            ->whereRaw("DATE_FORMAT(r.created_at, '%Y-%m') = ?", [$this->month])
            ->groupBy('r.id', 'r.title', 'u.id', 'u.name')
            ->orderByDesc('r.created_at')
            ->get();
    }

    protected function getMonthsOptions(): array
    {
        $months = [];
        for ($i = 0; $i < 12; $i++) {
            $date = now()->subMonths($i);
            $months[$date->format('Y-m')] = $date->translatedFormat('F Y');
        }

        return $months;
    }

    public function generatePdf($month)
    {
        // Establecer el mes a partir del parámetro recibido
        $this->month = $month;

        // Obtener las recetas para el mes especificado
        $recipes = $this->getRecipes();

        // Generar el PDF con los datos obtenidos
        $pdf = Pdf::loadView('filament.pages.recipes-report-pdf', [
            'recipes' => $recipes,
            'month' => $this->month,
        ]);

        // Retorna el PDF para ser descargado
        return $pdf->download('reporte_recetas_' . $this->month . '.pdf');
    }
}
