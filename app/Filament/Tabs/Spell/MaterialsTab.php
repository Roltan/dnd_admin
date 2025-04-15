<?php

namespace App\Filament\Tabs\Spell;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class MaterialsTab
{
    public static function make()
    {
        return Tab::make('Материалы')
            ->columns(3)
            ->schema([
                Toggle::make('need_verbal')
                    ->label('Необходимость вербального компонента')
                    ->default(true),
                Toggle::make('need_semant')
                    ->label('Необходимость семантического компонента')
                    ->default(true),
                Toggle::make('need_material')
                    ->label('Необходимость материального компонента')
                    ->default(false),
                Repeater::make('materials')
                    ->columnSpan(3)
                    ->columns(2)
                    ->collapsible()
                    ->cloneable()
                    ->schema([
                        TextInput::make('name')
                            ->label('Название предмета')
                            ->required(),
                        TextInput::make('count')
                            ->label('Количество')
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                    ])
            ]);
    }
}
