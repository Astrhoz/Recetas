<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CommentResource\Pages;
use App\Filament\User\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function getModelLabel(): string
    {
        return __('filament.comment.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.comment.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->label(__('filament.comment.content'))
                            ->translateLabel()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')
                    ->label(__('filament.comment.content'))
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('recipes.title')
                    ->label(__('filament.comment.recipe_id'))
                    ->translateLabel()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('recipes.images')
                    ->label(__('filament.comment.recipe_image'))
                    ->translateLabel(),
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
            'index' => Pages\ListComments::route('/'),
            // 'create' => Pages\CreateComment::route('/create'),
            // 'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
