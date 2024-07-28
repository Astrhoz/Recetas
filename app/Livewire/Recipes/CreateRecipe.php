<?php

namespace App\Livewire\Recipes;

use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CreateRecipe extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título de la receta')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('ingredients')
                    ->label('Ingredientes')
                    ->relationship()
                    ->required()
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nombre del ingrediente')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Descripción')
                            ->required(),    

                        Forms\Components\TextInput::make('quantity')
                            ->label('Cantidad')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('unit_of_measurement')
                            ->label('Unidad de medida')
                            ->required(),
                    ])
                    ->columns(4),

                Forms\Components\RichEditor::make('steps')
                    ->label('Pasos para la preparación')
                    ->required()
                    ->fileAttachmentsDirectory('steps-recipes')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('tips')
                    ->label('Consejos')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('amount_of_ingredients')
                    ->label('Cantidad de ingredientes')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('categories')
                    ->label('Categorías')
                    ->required()
                    ->multiple()
                    ->relationship('categories', 'name')
                    ->searchable()
                    ->preload(),

                Forms\Components\FileUpload::make('images')
                    ->label('Imágenes')
                    ->required()
                    ->image()
                    ->imageEditor()
                    ->directory('recipes'),
            ])
            ->statePath('data')
            ->model(Recipe::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        // Añadir el user_id al array de datos
        $data['user_id'] = Auth::id();

        $record = Recipe::create($data);

        $this->form->model($record)->saveRelationships();

        // Redireccionar a una ruta específica después de guardar
        return redirect()->route('my-recipes'); // Cambia 'ruta.destino' por el nombre de tu ruta
    }

    public function render(): View
    {
        return view('livewire.recipes.create-recipe');
    }
}
