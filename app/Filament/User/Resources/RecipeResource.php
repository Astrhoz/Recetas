<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\RecipeResource\Pages;
use App\Filament\User\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): string
    {
        return __("filament.groups.content");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function getModelLabel(): string
    {
        return __('filament.recipe.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.recipe.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading('')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('filament.recipe.title'))
                            ->translateLabel()
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label(__('filament.recipe.description'))
                            ->translateLabel()
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('ingredients')
                            ->label(__('filament.recipe.ingredients'))
                            ->translateLabel()
                            ->relationship()
                            ->required()
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('filament.recipe.ingredient_name'))
                                    ->translateLabel()
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('quantity')
                                    ->label(__('filament.recipe.quantity'))
                                    ->translateLabel()
                                    ->required()
                                    ->numeric(),

                                Forms\Components\TextInput::make('unit_of_measurement')
                                    ->label(__('filament.recipe.unit_of_measurement'))
                                    ->translateLabel()
                                    ->required(),
                            ])
                            ->columns(3),

                        Forms\Components\RichEditor::make('steps')
                            ->label(__('filament.recipe.steps'))
                            ->translateLabel()
                            ->required()
                            ->fileAttachmentsDirectory('steps-recipes')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('tips')
                            ->label(__('filament.recipe.tips'))
                            ->translateLabel()
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Select::make('categories')
                            ->label(__('filament.recipe.categories'))
                            ->translateLabel()
                            ->required()
                            ->multiple()
                            ->relationship('categories', 'name')
                            ->searchable()
                            ->preload(),

                        Forms\Components\FileUpload::make('images')
                            ->label(__('filament.recipe.images'))
                            ->translateLabel()
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->directory('recipes'),

                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament.recipe.title'))
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('filament.recipe.description'))
                    ->translateLabel()
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label(__('filament.recipe.categories'))
                    ->translateLabel(),
                Tables\Columns\ImageColumn::make('images')
                    ->label(__('filament.recipe.images'))
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.recipe.created_at'))
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.recipe.updated_at'))
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
