<?php

namespace App\Filament\User\Resources\FollowerResource\Pages;

use App\Filament\User\Resources\FollowerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFollower extends CreateRecord
{
    protected static string $resource = FollowerResource::class;
}
