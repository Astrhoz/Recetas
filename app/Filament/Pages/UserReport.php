<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms\Components\Select;

class UserReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static string $view = 'filament.pages.user-report';

    protected static ?int $navigationSort = 11;

    public static function getNavigationGroup(): string
    {
        return __("filament.groups.report");
    }

    public function getTitle(): string
    {
        return __("filament.pages.user");
    }

    public static function getNavigationLabel(): string
    {
        return __("filament.pages.user");
    }

    public $userId;
    public $userStats;
    public $recipes;

    public function mount()
    {
        // Inicialmente no se selecciona ningún usuario
        $this->userId = null;
        $this->updateUserData();
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('userId')
                ->label('Seleccionar usuario')
                ->options($this->getUsersOptions())
                ->searchable()
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->updateUserData($state))
                ->selectablePlaceholder(false),
        ];
    }

    public function updateUserData($userId = null)
    {
        $this->userId = $userId ?? $this->userId;
        if ($this->userId) {
            $this->userStats = $this->getUserStats();
            $this->recipes = $this->getUserRecipes();
        } else {
            $this->userStats = null;
            $this->recipes = collect();
        }
    }

    protected function getUsersOptions(): array
    {
        return DB::table('users')->pluck('name', 'id')->toArray();
    }

    protected function getUserStats()
    {
        return DB::table('users as u')
            ->leftJoin('recipes as r', 'u.id', '=', 'r.user_id')
            ->leftJoin('likes as l', 'r.id', '=', 'l.recipe_id')
            ->leftJoin('comments as c', 'r.id', '=', 'c.recipe_id')
            ->leftJoin('ratings as ra', 'r.id', '=', 'ra.recipe_id')
            ->select(
                DB::raw('COUNT(DISTINCT r.id) as recipes_count'),
                DB::raw('COUNT(DISTINCT l.id) as likes_count'),
                DB::raw('COUNT(DISTINCT c.id) as comments_count'),
                DB::raw('COUNT(DISTINCT ra.id) as ratings_count')
            )
            ->where('u.id', $this->userId)
            ->first();
    }

    protected function getUserRecipes()
    {
        return DB::table('recipes as r')
            ->leftJoin('category_recipe as cr', 'r.id', '=', 'cr.recipe_id')
            ->leftJoin('categories as cat', 'cr.category_id', '=', 'cat.id')
            ->select(
                'r.title as recipe_title',
                DB::raw('GROUP_CONCAT(cat.name SEPARATOR ", ") as categories'),
                'r.created_at'
            )
            ->where('r.user_id', $this->userId)
            ->groupBy('r.id', 'r.title', 'r.created_at')
            ->orderByDesc('r.created_at')
            ->get();
    }

    public function generatePdf($userId)
    {
        $this->userId = $userId;

        if (!$this->userId) {
            abort(404);
        }

        $userStats = $this->getUserStats();
        $recipes = $this->getUserRecipes();

        $pdf = Pdf::loadView('filament.pages.user-report-pdf', [
            'userStats' => $userStats,
            'recipes' => $recipes,
            'userName' => DB::table('users')->where('id', $this->userId)->value('name'),
            'userMail' => DB::table('users')->where('id', $this->userId)->value('email'),
        ]);

        return $pdf->download('reporte_usuario_' . $this->userId . '.pdf');
    }


}
