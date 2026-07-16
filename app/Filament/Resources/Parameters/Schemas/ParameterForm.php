<?php

namespace App\Filament\Resources\Parameters\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ParameterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sample_category_id')->relationship('sample_category', 'name')->required(),
                TextInput::make('code'),
                TextInput::make('name'),
            ]);
    }
}
