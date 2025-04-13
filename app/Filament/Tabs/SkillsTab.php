<?php

namespace App\Filament\Tabs;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class SkillsTab
{
    public static function make()
    {
        return Tab::make('Способности')
                ->columns(1)
                ->schema([
                    Repeater::make('skills')
                        ->label('Способности')
                        ->relationship('skills')
                        ->columns(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Название')
                                ->columnSpan(2)
                                ->required(),

                            Textarea::make('description')
                                ->label('Описание')
                                ->columnSpan(2)
                                ->required(),

                            TextInput::make('lvl')
                                ->label('Уровень получения')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(20)
                                ->required(),

                            TextInput::make('script')
                                ->label('Скрипт способности')
                                ->nullable(),

                            Toggle::make('set_price')
                                ->label('Расходует рессурс')
                                ->default(false)
                                ->required()
                        ])
                        ->collapsible()
                        ->cloneable()
                ]);
    }
}
