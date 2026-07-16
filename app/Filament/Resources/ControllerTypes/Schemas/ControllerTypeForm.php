<?php

namespace App\Filament\Resources\ControllerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ControllerTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('deleted_by')
                    ->numeric()
                    ->default(0),
                TextInput::make('created_by')
                    ->numeric()
                    ->default(0),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
