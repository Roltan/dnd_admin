<?php

namespace App\Filament\Resources\FeatResource\Pages;

use App\Filament\Resources\FeatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeat extends EditRecord
{
    protected static string $resource = FeatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
