<?php

namespace App\Filament\Tabs\Background;

use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class BackgroundTab
{
    public static function make()
    {
        return Tab::make('Происхождение')
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
