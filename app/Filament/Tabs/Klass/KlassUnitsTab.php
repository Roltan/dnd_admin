<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class KlassUnitsTab
{
    public static function make()
    {
        return Tab::make('Классовый ресурс')
            ->columns(1)
            ->schema([
                Repeater::make('units')
                    ->label('Классовые ресурсы')
                    ->relationship('units')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Название')
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('lvl')
                            ->label('Уровень получения')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(20)
                            ->required(),
                        TextInput::make('value')
                            ->label('Максимум')
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                        Toggle::make('is_resources')
                            ->label('Лимит или расходный')
                            ->default(true),
                        Toggle::make('reset_short_rest')
                            ->label('Восстановится ли после короткого отдыха')
                            ->default(true),
                        Toggle::make('reset_initiative')
                            ->label('Восстановится ли во время броска инициативы')
                            ->default(true),

                    ])
                    ->collapsible()
                    ->cloneable()
            ]);
    }
}
