<?php

namespace App\Filament\Resources\SampleCategories\Pages;

use App\Filament\Resources\SampleCategories\SampleCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSampleCategory extends EditRecord
{
    protected static string $resource = SampleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
