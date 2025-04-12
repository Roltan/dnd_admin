<?php

namespace App\Filament\Resources\KlassResource\Pages;

use App\Filament\Resources\KlassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKlass extends EditRecord
{
    protected static string $resource = KlassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
