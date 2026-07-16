<?php

namespace App\Filament\Resources\SampleCategories;

use App\Filament\Resources\SampleCategories\Pages\CreateSampleCategory;
use App\Filament\Resources\SampleCategories\Pages\EditSampleCategory;
use App\Filament\Resources\SampleCategories\Pages\ListSampleCategories;
use App\Filament\Resources\SampleCategories\Schemas\SampleCategoryForm;
use App\Filament\Resources\SampleCategories\Tables\SampleCategoriesTable;
use App\Models\SampleCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SampleCategoryResource extends Resource
{
    protected static ?string $model = SampleCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SampleCategory';

    public static function form(Schema $schema): Schema
    {
        return SampleCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SampleCategoriesTable::configure($table);
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
            'index' => ListSampleCategories::route('/'),
            'create' => CreateSampleCategory::route('/create'),
            'edit' => EditSampleCategory::route('/{record}/edit'),
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
