<?php

namespace App\Filament\Resources\MotorTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MotorTypeForm
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
