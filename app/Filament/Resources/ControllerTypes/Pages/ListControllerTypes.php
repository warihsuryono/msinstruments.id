<?php

namespace App\Filament\Resources\ControllerTypes\Pages;

use App\Filament\Resources\ControllerTypes\ControllerTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListControllerTypes extends ListRecords
{
    protected static string $resource = ControllerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
