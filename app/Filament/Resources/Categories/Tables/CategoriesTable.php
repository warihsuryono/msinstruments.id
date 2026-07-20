<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('parentCategory.name')->label('Parent Category'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('popular_seq')->label('Popular Seq'),
                ImageColumn::make('image')->url(fn($record) => '/storage/' . $record->image),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
