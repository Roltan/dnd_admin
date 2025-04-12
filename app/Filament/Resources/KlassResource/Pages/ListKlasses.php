<?php

namespace App\Filament\Resources\KlassResource\Pages;

use App\Filament\Resources\KlassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKlasses extends ListRecords
{
    protected static string $resource = KlassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
