<?php

namespace App\Filament\Resources\ControllerTypes;

use App\Filament\Resources\ControllerTypes\Pages\CreateControllerType;
use App\Filament\Resources\ControllerTypes\Pages\EditControllerType;
use App\Filament\Resources\ControllerTypes\Pages\ListControllerTypes;
use App\Filament\Resources\ControllerTypes\Schemas\ControllerTypeForm;
use App\Filament\Resources\ControllerTypes\Tables\ControllerTypesTable;
use App\Models\ControllerType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ControllerTypeResource extends Resource
{
    protected static ?string $model = ControllerType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'ControllerType';

    public static function form(Schema $schema): Schema
    {
        return ControllerTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ControllerTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListControllerTypes::route('/'),
            'create' => CreateControllerType::route('/create'),
            'edit' => EditControllerType::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
