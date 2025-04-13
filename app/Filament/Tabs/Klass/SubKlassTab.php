<?php

namespace App\Filament\Tabs\Klass;

use App\Filament\Tabs\SkillsTab;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class SubKlassTab
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

                        Tabs::make('Особенности подкласса')->tabs([
                            SkillsTab::make(),
                            KlassUnitsTab::make(),
                        ])
                    ])
            ]);
    }
}
