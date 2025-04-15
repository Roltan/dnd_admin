<?php

namespace App\Filament\Tabs\Background;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class EquipmentTab
{
    public static function make()
    {
        return Tab::make('Снаряжение')
            ->columns(1)
            ->schema([
                Repeater::make('equipment')
                    ->label('Начальное снаряжение')
                    ->schema([
                        Repeater::make('items')
                            ->label('Вариант')
                            ->columns(2)
                            ->schema([
                                Select::make('type')
                                    ->label('Тип')
                                    ->searchable()
                                    ->options(\App\Models\Equipment::all()
                                        ->pluck('name', 'name')
                                        ->toArray()
                                    )
                                    ->required(),
                                TextInput::make('count')
                                    ->label('Количество')
                                    ->numeric()
                                    ->default(1)
                            ])
                            ->collapsible()
                            ->cloneable()
                    ])
                    ->collapsible()
                    ->cloneable()
                    ->required()
            ]);
    }
}
