<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductPriceRelationManager extends RelationManager
{
    protected static string $relationship = 'product_price';
    protected static ?string $title = 'Prices';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('min_qty')->label('Minimum Qty')->numeric()->default(1),
                TextInput::make('idr')->label('Rp.')->numeric()->default(0),
                TextInput::make('usd')->label('$.')->numeric()->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Prices')
            ->columns([
                TextColumn::make('min_qty')->label('Minimum Qty')->numeric(),
                TextColumn::make('idr')->label('IDR')->numeric(),
                TextColumn::make('usd')->label('USD')->numeric(),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make()->label('New Price'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
