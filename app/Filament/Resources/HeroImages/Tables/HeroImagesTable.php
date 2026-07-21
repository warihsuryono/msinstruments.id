<?php

namespace App\Filament\Resources\HeroImages\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class HeroImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->url(fn($record) => '/storage/' . $record->image),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
