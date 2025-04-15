<?php

namespace App\Filament\Tabs\Spell;

use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class PropertyTab
{
    public static function make()
    {
        return Tab::make('Свойства')
            ->columns(2)
            ->schema([
                TextInput::make('distance')
                    ->label('Дистанция')
                    ->numeric()
                    ->minValue(0),
                TextInput::make('time_cast')
                    ->label('Время сотворения')
                    ->numeric()
                    ->minValue(0),
                TextInput::make('duration')
                    ->label('Длительность')
                    ->numeric()
                    ->minValue(0),
                Toggle::make('need_concentration')
                    ->label('Необходимость концентрации')
                    ->default(false),
                TextInput::make('lvl')
                    ->label('Уровень ячейки')
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
                Toggle::make('can_lower_lvl')
                    ->label('Могут ли использоваться меньшие ячейки')
                    ->default(false),
            ]);
    }
}
