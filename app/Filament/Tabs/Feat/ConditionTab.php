<?php

namespace App\Filament\Tabs\Feat;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs\Tab;
use App\Models\Ability;

class ConditionTab
{
    public static function make()
    {
        return Tab::make('Условия')
            ->columns(2)
            ->schema([
                Repeater::make('condition')
                    ->label('Требования по характеристикам')
                    ->columns(2)
                    ->columnSpan(2)
                    ->schema([
                        Select::make('abilities')
                            ->label('Характеристика')
                            ->options(Ability::query()
                                ->whereNull('parent_id')
                                ->get()
                                ->pluck('name', 'name')
                                ->toArray()
                            )->required(),
                        TextInput::make('bonus')
                            ->label('Требование')
                            ->numeric()
                            ->required(),
                    ])
            ]);
    }
}
