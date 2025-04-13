<?php

namespace App\Filament\Tabs\Feat;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs\Tab;

class FeatTab
{
    public static function make()
    {
        return Tab::make('Черта')
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->columnSpan(2)
                    ->required(),
                TextInput::make('manual')
                    ->label('Подробности')
                    ->default('https://dnd.su/class/'),
                TextInput::make('source')
                    ->label('Источник')
                    ->default('Player`s handbook'),

            ]);
    }
}
