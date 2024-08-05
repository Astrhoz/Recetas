<?php

namespace App\Filament\User\Resources\LikeResource\Pages;

use App\Filament\User\Resources\LikeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLike extends CreateRecord
{
    protected static string $resource = LikeResource::class;
}
