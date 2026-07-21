<?php

namespace App\Filament\Resources\HeroImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class HeroImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')->directory('hero_images')->image()->imageEditor(),
            ]);
    }
}
