<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\RatingResource\Pages;
use App\Filament\User\Resources\RatingResource\RelationManagers;
use App\Models\Rating;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): string
    {
        return __("filament.groups.interaction");
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function getModelLabel(): string
    {
        return __('filament.rating.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.rating.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading('')
                    ->schema([
                        Forms\Components\TextInput::make('score')
                            ->label(__('filament.rating.score'))
                            ->translateLabel()
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('score')
                    ->label(__('filament.rating.score'))
                    ->translateLabel()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('recipes.title')
                    ->label(__('filament.rating.recipe_id'))
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('recipes.images')
                    ->label(__('filament.rating.recipe_image'))
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRatings::route('/'),
            // 'create' => Pages\CreateRating::route('/create'),
            // 'edit' => Pages\EditRating::route('/{record}/edit'),
        ];
    }
}
