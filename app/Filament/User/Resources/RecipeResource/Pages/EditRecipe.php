<?php

namespace App\Filament\User\Resources\RecipeResource\Pages;

use App\Filament\User\Resources\RecipeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipe extends EditRecord
{
    protected static string $resource = RecipeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
