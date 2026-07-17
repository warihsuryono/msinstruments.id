<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductParameterRelationManager extends RelationManager
{
    protected static string $relationship = 'product_parameter';
    protected static ?string $title = 'Parameters';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parameter_id')->label('Name')->required()->allowHtml(true)->searchable()->preload()
                    ->relationship(
                        'parameter',
                        'name',
                        modifyQueryUsing: function ($query) {
                            $query->where('sample_category_id', $this->ownerRecord->sample_category_id);
                        }
                    ),
                TextInput::make('range'),
                TextInput::make('principle'),
                TextInput::make('resolution'),
                TextInput::make('accuracy'),
                TextInput::make('response_time'),
                TextInput::make('specification'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Parameters')
            ->columns([
                TextColumn::make('parameter.name')->label('Name')->html(),
                TextColumn::make('range')->html(),
                TextColumn::make('principle')->html(),
                TextColumn::make('resolution')->html(),
                TextColumn::make('accuracy')->html(),
                TextColumn::make('response_time')->html(),
                TextColumn::make('specification')->html(),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make()->label('New Parameter'),
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
