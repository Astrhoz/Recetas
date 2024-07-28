<?php

namespace App\Filament\User\Resources\FollowerResource\Pages;

use App\Filament\User\Resources\FollowerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFollower extends EditRecord
{
    protected static string $resource = FollowerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
