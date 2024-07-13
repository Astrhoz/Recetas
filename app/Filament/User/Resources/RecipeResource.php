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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading('')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('ingredients')
                            ->relationship()
                            ->required()
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('description')
                                    ->required(),

                                Forms\Components\TextInput::make('quantity')
                                    ->required()
                                    ->numeric(),

                                Forms\Components\TextInput::make('unit_of_measurement')
                                    ->required(),
                            ])
                            ->columns(4),

                        Forms\Components\RichEditor::make('steps')
                            ->required()
                            ->fileAttachmentsDirectory('steps-recipes')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('tips')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('amount_of_ingredients')
                            ->required()
                            ->numeric(),

                        Forms\Components\Select::make('categories')
                            ->required()
                            ->multiple()
                            ->relationship('categories', 'name')
                            ->searchable()
                            ->preload(),

                        Forms\Components\FileUpload::make('images')
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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ,
                Tables\Columns\TextColumn::make('users.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
