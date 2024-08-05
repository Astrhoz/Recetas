<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FollowerResource\Pages;
use App\Filament\Resources\FollowerResource\RelationManagers;
use App\Models\Follower;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FollowerResource extends Resource
{
    protected static ?string $model = Follower::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

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
                Tables\Columns\TextColumn::make('followeds.name')
                    ->label(__('filament.follower.followed_id'))
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament.follower.created_at'))
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament.follower.updated_at'))
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
            'index' => Pages\ListFollowers::route('/'),
            'create' => Pages\CreateFollower::route('/create'),
            'edit' => Pages\EditFollower::route('/{record}/edit'),
        ];
    }
}
