<?php

namespace App\Filament\Tabs\Race;

use App\Filament\Tabs\SkillsTab;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class SubRaceTab
{
    public static function make()
    {
        return Tab::make('Под расы')
            ->columns(2)
            ->schema([
                Repeater::make('SubRace')
                    ->columns(1)
                    ->columnSpan(2)
                    ->relationship('subRace')
                    ->schema([
                        TextInput::make('name')
                            ->label('Название')
                            ->required(),

                        Tabs::make('Особенности под расы')->tabs([
                            SkillsTab::make(),
                            AbilityTab::make(),
                        ])
                    ])
            ]);
    }
}
