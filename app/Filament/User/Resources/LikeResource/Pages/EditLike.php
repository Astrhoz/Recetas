<?php

namespace App\Filament\User\Resources\LikeResource\Pages;

use App\Filament\User\Resources\LikeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLike extends EditRecord
{
    protected static string $resource = LikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
