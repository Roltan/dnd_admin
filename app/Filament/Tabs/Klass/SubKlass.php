<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class SubKlass
{
    public static function make()
    {
        return Tab::make('Под классы')
            ->columns(1)
            ->schema([
                Repeater::make('subKlass')
                    ->label('Подклассы')
                    ->relationship('subKlass')
                    ->schema([
                        TextInput::make('name')
                            ->label('Название')
                            ->required(),

                        Tabs::make('Характиристика подкласса')->tabs([
                            Skills::make(),
                            KlassUnits::make(),
                        ])
                    ])
            ]);
    }
}
