<?php

namespace App\Filament\Tabs\Race;

use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class RaceTab
{
    public static function make()
    {
        return Tab::make('Раса')
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                TextInput::make('manual')
                    ->label('Подробности')
                    ->default('https://dnd.su/class/'),
                TextInput::make('source')
                    ->label('Источник')
                    ->default('Player`s handbook'),
                TextInput::make('speed')
                    ->label('Скорость перемещения')
                    ->numeric()
                    ->minValue(1)
                    ->default(30)
                    ->required(),
            ]);
    }
}
