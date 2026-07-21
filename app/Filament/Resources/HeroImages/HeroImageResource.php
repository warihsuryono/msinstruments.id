<?php

namespace App\Filament\Resources\HeroImages;

use App\Filament\Resources\HeroImages\Pages\CreateHeroImage;
use App\Filament\Resources\HeroImages\Pages\EditHeroImage;
use App\Filament\Resources\HeroImages\Pages\ListHeroImages;
use App\Filament\Resources\HeroImages\Schemas\HeroImageForm;
use App\Filament\Resources\HeroImages\Tables\HeroImagesTable;
use App\Models\HeroImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroImageResource extends Resource
{
    protected static ?string $model = HeroImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HeroImage';

    public static function form(Schema $schema): Schema
    {
        return HeroImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroImagesTable::configure($table);
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
            'index' => ListHeroImages::route('/'),
            'create' => CreateHeroImage::route('/create'),
            'edit' => EditHeroImage::route('/{record}/edit'),
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
