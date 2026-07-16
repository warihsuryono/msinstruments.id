<?php

namespace App\Filament\Resources\ControllerTypes\Pages;

use App\Filament\Resources\ControllerTypes\ControllerTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateControllerType extends CreateRecord
{
    protected static string $resource = ControllerTypeResource::class;
}
