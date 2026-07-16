<?php

namespace App\Filament\Resources\ControllerTypes\Pages;

use App\Filament\Resources\ControllerTypes\ControllerTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditControllerType extends EditRecord
{
    protected static string $resource = ControllerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
