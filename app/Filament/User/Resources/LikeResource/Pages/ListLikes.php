<?php

namespace App\Filament\User\Resources\LikeResource\Pages;

use App\Filament\User\Resources\LikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLikes extends ListRecords
{
    protected static string $resource = LikeResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
