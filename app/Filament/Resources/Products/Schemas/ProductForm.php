<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code'),
                Select::make('category_id')->relationship('category', 'name')->required(),
                Select::make('sample_category_id')->relationship('sample_category', 'name')->required(),
                Select::make('controller_type_id')->relationship('controller_type', 'name')->required(),
                Select::make('motor_type_id')->relationship('motor_type', 'name')->default(0),
                TextInput::make('name'),
                TextInput::make('sku')->label('SKU'),
                RichEditor::make('short_description')->columnSpanFull()->extraAttributes(['style' => 'min-height:200px']),
                RichEditor::make('description')->columnSpanFull()->extraAttributes(['style' => 'min-height:300px']),
            ]);
    }
}
