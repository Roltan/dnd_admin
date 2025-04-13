<?php

namespace App\Filament\Tabs\Feat;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Tabs\Tab;

class ResourcesTab
{
    public static function make()
    {
        return Tab::make('Ресурс')
            ->columns(2)
            ->schema([
                TextInput::make('name_resource')
                    ->label('Название'),
                TextInput::make('value_resource')
                    ->label('Максимум')
                    ->numeric(),
                Toggle::make('reset_short_rest')
                    ->label('Восстановится ли после короткого отдыха')
                    ->default(true),
                Toggle::make('reset_initiative')
                    ->label('Восстановится ли во время броска инициативы')
                    ->default(true),
            ]);
    }
}
