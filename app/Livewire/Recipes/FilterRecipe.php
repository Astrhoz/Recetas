<?php

namespace App\Livewire\Recipes;

use App\Models\Recipe;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class FilterRecipe extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $recipes = [];

    // Vinculamos la propiedad $data con la URL
    protected $queryString = [
        'data' => ['except' => []], // Aseguramos que solo se agregue a la URL si tiene valores
    ];

    public function mount(): void
    {
        $this->form->fill($this->data);

        // Si hay filtros aplicados en la URL, realiza la búsqueda automáticamente
        if ($this->hasActiveFilters()) {
            $this->search();
        }
    }

    protected function hasActiveFilters(): bool
    {
        // Comprueba si hay filtros activos en los datos
        return array_filter($this->data, fn($value) => !empty($value)) !== [];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Búsqueda de Recetas')
                    ->schema([
                        Forms\Components\Grid::make(['default' => 1, 'md' => 3])
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Título de la receta')
                                    ->maxLength(255),

                                Forms\Components\Select::make('categories')
                                    ->label('Categorías')
                                    ->multiple()
                                    ->relationship('categories', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->dehydrated(true),

                                Forms\Components\Select::make('ingredients')
                                    ->label('Ingredientes')
                                    ->multiple()
                                    ->relationship('ingredients', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->dehydrated(true),
                            ]),
                    ])
                    ->columns(1),

                Forms\Components\Grid::make(['default' => 1, 'md' => 2])
                    ->schema([
                        Forms\Components\Fieldset::make('Rango de likes')
                            ->schema([
                                Forms\Components\TextInput::make('min-likes')
                                    ->label('Mínimo')
                                    ->minValue(1)
                                    ->numeric(),
                                
                                Forms\Components\TextInput::make('max-likes')
                                    ->label('Máximo')
                                    ->numeric()
                                    ->gt('min-likes'),
                            ])
                            ->columnSpan(1),
                        
                        Forms\Components\Fieldset::make('Calificación')
                            ->schema([
                                Forms\Components\TextInput::make('min-rate')
                                    ->label('Mínimo')
                                    ->minValue(1)
                                    ->numeric()
                                    ->lt('max-rate'),
                                
                                Forms\Components\TextInput::make('max-rate')
                                    ->label('Máximo')
                                    ->numeric()
                                    ->maxValue(5)
                                    ->gt('min-rate'),
                            ])
                            ->columnSpan(1),
                    ]),
            ])
            ->statePath('data')
            ->model(Recipe::class);
    }

    public function search()
    {
        $data = $this->form->getState();

        $recipesQuery = Recipe::query()->with('users');

        // Filtrando recetas
        if (!empty($data['title'])) {
            $recipesQuery->where('title', 'like', '%' . $data['title'] . '%');
        }

        if (!empty($data['categories'])) {
            foreach ($data['categories'] as $categoryId) {
                $recipesQuery->whereHas('categories', function (Builder $query) use ($categoryId) {
                    $query->where('categories.id', $categoryId);
                });
            }
        }

        if (!empty($data['ingredients'])) {
            $ingredientNames = \App\Models\Ingredient::whereIn('id', $data['ingredients'])
                ->pluck('name')
                ->toArray();

            foreach ($ingredientNames as $ingredientName) {
                $recipesQuery->whereHas('ingredients', function (Builder $query) use ($ingredientName) {
                    $query->where('name', $ingredientName);
                });
            }
        }

        if (!empty($data['min-likes']) || !empty($data['max-likes'])) {
            $likesQuery = \App\Models\Like::selectRaw('recipe_id, COUNT(*) AS like_count')
                ->groupBy('recipe_id');

            if (!empty($data['min-likes'])) {
                $likesQuery->having('like_count', '>=', $data['min-likes']);
            }

            if (!empty($data['max-likes'])) {
                $likesQuery->having('like_count', '<=', $data['max-likes']);
            }

            $filteredRecipeIds = $likesQuery->pluck('recipe_id')->toArray();

            $recipesQuery->whereIn('id', $filteredRecipeIds);
        }

        if (!empty($data['min-rate']) || !empty($data['max-rate'])) {
            $recipesQuery->whereHas('ratings', function (Builder $query) use ($data) {
                $query->selectRaw('recipe_id, AVG(score) as average_rating')
                    ->groupBy('recipe_id');
                
                if (!empty($data['min-rate'])) {
                    $query->having('average_rating', '>=', $data['min-rate']);
                }

                if (!empty($data['max-rate'])) {
                    $query->having('average_rating', '<=', $data['max-rate']);
                }
            });
        }

        $this->recipes = $recipesQuery->get();

        if ($this->recipes->isEmpty()) {
            noty()->closeWith(['click', 'button'])
                ->info('¡No se encontraron recetas que coincidan!');
        }
    }

    public function render(): View
    {
        return view('livewire.recipes.filter-recipe', [
            'recipes' => $this->recipes
        ]);
    }
}
