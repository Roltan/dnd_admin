<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class Equipment
{
    public static function make()
    {
        return Tab::make('Снаряжение')
            ->columns(1)
            ->schema([
                TextInput::make('money')
                    ->label('Деньги в обмен на снаряжение')
                    ->required(),
                Repeater::make('equipment')
                    ->label('Начальное снаряжение')
                    ->schema([
                        Select::make('select')
                            ->label('Варианты для выбора')
                            ->options([])
                            ->multiple()
                            ->required()
                    ])
                    ->required()
                    ->collapsible()
                    ->cloneable(),
            ]);
    }
}
