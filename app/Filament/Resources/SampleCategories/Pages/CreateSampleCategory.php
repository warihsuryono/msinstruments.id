<?php

namespace App\Filament\Resources\SampleCategories\Pages;

use App\Filament\Resources\SampleCategories\SampleCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSampleCategory extends CreateRecord
{
    protected static string $resource = SampleCategoryResource::class;
}
