<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('parent_id')
                    ->required()
                    ->numeric()
                    ->default(0),
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
