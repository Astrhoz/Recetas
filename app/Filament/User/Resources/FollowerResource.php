<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\FollowerResource\Pages;
use App\Filament\User\Resources\FollowerResource\RelationManagers;
use App\Models\Follower;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class FollowerResource extends Resource
{
    protected static ?string $model = Follower::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('followed_id', Auth::user()->id);
    }

    public static function getModelLabel(): string
    {
        return __('filament.follower.singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament.follower.plural');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->heading('')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label(__('filament.follower.user_id'))
                            ->translateLabel()
                            ->relationship('users', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('followed_id')
                            ->label(__('filament.follower.followed_id'))
                            ->translateLabel()
                            ->relationship('followeds', 'name')
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
                Tables\Columns\TextColumn::make('users.name')
                    ->label(__('filament.follower.user_id'))
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListFollowers::route('/'),
            // 'create' => Pages\CreateFollower::route('/create'),
            // 'edit' => Pages\EditFollower::route('/{record}/edit'),
        ];
    }
}
