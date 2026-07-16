<?php

namespace App\Filament\Resources\SampleCategories\Pages;

use App\Filament\Resources\SampleCategories\SampleCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSampleCategories extends ListRecords
{
    protected static string $resource = SampleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
