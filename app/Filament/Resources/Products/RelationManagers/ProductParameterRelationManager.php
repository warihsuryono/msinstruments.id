<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductParameterRelationManager extends RelationManager
{
    protected static string $relationship = 'product_parameter';
    protected static ?string $title = 'Parameter';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parameter_id')->required()->allowHtml(true)->searchable()->preload()
                    ->relationship(
                        name: 'parameter',
                        titleAttribute: 'name',
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
                TextColumn::make('parameter.name')->searchable(),
                TextColumn::make('range')->searchable(),
                TextColumn::make('principle')->searchable(),
                TextColumn::make('resolution')->searchable(),
                TextColumn::make('accuracy')->searchable(),
                TextColumn::make('response_time')->searchable(),
                TextColumn::make('specification')->searchable(),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make()->label('New Parameter'),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
