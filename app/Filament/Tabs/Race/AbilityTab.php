<?php

namespace App\Filament\Tabs\Race;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use App\Models\Ability;

class AbilityTab
{
    public static function make()
    {
        return Tab::make('Характеристики')
            ->columns(2)
            ->schema([
                Repeater::make('abilities_bonus')
                    ->label('Бонусы к характеристикам')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        Select::make('abilities')
                            ->label('Характеристика')
                            ->multiple()
                            ->options(Ability::query()
                                ->whereNull('parent_id')
                                ->get()
                                ->pluck('name', 'name')
                                ->toArray()
                            )->required(),
                        TextInput::make('bonus')
                            ->label('Бонус')
                            ->numeric()
                            ->required(),
                    ])
            ]);
    }
}
