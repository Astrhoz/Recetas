<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\Select;

class CategoriesReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static string $view = 'filament.pages.categories-report';

    protected static ?int $navigationSort = 12;

    public static function getNavigationGroup(): string
    {
        return __("filament.groups.report");
    }

    public function getTitle(): string
    {
        return __("filament.pages.category");
    }

    public static function getNavigationLabel(): string
    {
        return __("filament.pages.category");
    }

    public $categoryId;
    public $categoryStats;
    public $recipes;

    public function mount()
    {
        $this->categoryId = null;
        $this->updateCategoryData();
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('categoryId')
                ->label('Seleccionar categoría')
                ->options($this->getCategoriesOptions())
                ->searchable()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->updateCategoryData($state))
                ->selectablePlaceholder(false),
        ];
    }

    public function updateCategoryData($categoryId = null)
    {
        $this->categoryId = $categoryId ?? $this->categoryId;
        if ($this->categoryId) {
            $this->categoryStats = $this->getCategoryStats();
            $this->recipes = $this->getCategoryRecipes();
        } else {
            $this->categoryStats = null;
            $this->recipes = collect();
        }
    }

    protected function getCategoriesOptions(): array
    {
        return DB::table('categories')->pluck('name', 'id')->toArray();
    }

    protected function getCategoryStats()
    {
        return DB::table('categories as c')
            ->leftJoin('category_recipe as cr', 'c.id', '=', 'cr.category_id')
            ->leftJoin('recipes as r', 'cr.recipe_id', '=', 'r.id')
            ->leftJoin('likes as l', 'r.id', '=', 'l.recipe_id')
            ->leftJoin('comments as co', 'r.id', '=', 'co.recipe_id')
            ->leftJoin('ratings as ra', 'r.id', '=', 'ra.recipe_id')
            ->select(
                DB::raw('COUNT(DISTINCT r.id) as recipes_count'),
                DB::raw('COUNT(DISTINCT l.id) as likes_count'),
                DB::raw('COUNT(DISTINCT co.id) as comments_count'),
                DB::raw('COUNT(DISTINCT ra.id) as ratings_count')
            )
            ->where('c.id', $this->categoryId)
            ->first();
    }

    protected function getCategoryRecipes()
    {
        return DB::table('recipes as r')
            ->leftJoin('category_recipe as cr', 'r.id', '=', 'cr.recipe_id')
            ->leftJoin('users as u', 'r.user_id', '=', 'u.id')
            ->select(
                'r.title as recipe_title',
                'u.name as user_name',
                'r.created_at'
            )
            ->where('cr.category_id', $this->categoryId)  // Corregido: Filtrar por categoría
            ->groupBy('r.id', 'r.title', 'r.created_at', 'u.name')
            ->orderByDesc('r.created_at')
            ->get();
    }

    public function generatePdf($categoryId)
    {
        $this->categoryId = $categoryId;

        if (!$this->categoryId) {
            abort(404);
        }

        // Obtener el nombre y la descripción de la categoría
        $categoryName = DB::table('categories')->where('id', $this->categoryId)->value('name');
        $categoryDescription = DB::table('categories')->where('id', $this->categoryId)->value('description');

        // Reemplazar espacios y caracteres especiales en el nombre de la categoría para que sea válido en un nombre de archivo
        $safeCategoryName = preg_replace('/[^A-Za-z0-9\-]/', '_', $categoryName);

        $categoryStats = $this->getCategoryStats();
        $recipes = $this->getCategoryRecipes();

        $pdf = Pdf::loadView('filament.pages.categories-report-pdf', [
            'categoryStats' => $categoryStats,
            'recipes' => $recipes,
            'categoryName' => $categoryName,
            'categoryDescription' => $categoryDescription,
        ]);

        return $pdf->download('Reporte_Categoria_' . $safeCategoryName . '.pdf');
    }

}
