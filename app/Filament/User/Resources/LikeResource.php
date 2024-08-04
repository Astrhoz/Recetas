<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\LikeResource\Pages;
use App\Filament\User\Resources\LikeResource\RelationManagers;
use App\Models\Like;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LikeResource extends Resource
{
    protected static ?string $model = Like::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?int $navigationSort = 5;

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
        return __('filament.like.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.like.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading('')
                    ->schema([
                        Forms\Components\Select::make('recipe_id')
                            ->label(__('filament.like.recipe_id'))
                            ->translateLabel()
                            ->relationship('recipes', 'title')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('recipes.title')
                    ->label(__('filament.like.recipe_id'))
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('recipes.images')
                    ->label(__('filament.like.recipe_image'))
                    ->translateLabel(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListLikes::route('/'),
            // 'create' => Pages\CreateLike::route('/create'),
            // 'edit' => Pages\EditLike::route('/{record}/edit'),
        ];
    }
}
