<?php

namespace App\Filament\Resources\Parameters\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParametersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sample_category.name')->searchable(),
                TextColumn::make('code')->searchable(),
                TextColumn::make('name')->searchable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
