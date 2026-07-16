<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->searchable(),
                TextColumn::make('category.name')->searchable(),
                TextColumn::make('controller_type.name')->searchable(),
                TextColumn::make('motor_type.name')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('sku')->label('SKU')->searchable(),
                TextColumn::make('short_description')->searchable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category_id')->label('Category')->multiple(true)->relationship('category', 'name')->preload()->searchable(),
                SelectFilter::make('controller_type_id')->label('Controller Type')->multiple(true)->relationship('controller_type', 'name')->preload()->searchable(),
                SelectFilter::make('motor_type_id')->label('Motor Type')->multiple(true)->relationship('motor_type', 'name')->preload()->searchable(),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
