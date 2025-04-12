<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use App\Models\Ability;

class Klass
{
    public static function make()
    {
        return Tab::make('Класс')
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
                    ->label('Происхождение')
                    ->default('Player`s handbook'),
                Select::make('dice_hp')
                    ->label('Кость здоровья')
                    ->options([
                        '6' => '1d6',
                        '8' => '1d8',
                        '10' => '1d10',
                        '12' => '1d12',
                    ])
                    ->required(),
                Select::make('save_stat')
                    ->label('Владения спас бросками')
                    ->options([
                        'Сила',
                        'Интеллект',
                        'Ловкость',
                        'Мудрость',
                        'Телосложение',
                        'Харизма'
                    ])
                    ->multiple(true)
                    ->required(),
                Select::make('abilities')
                    ->label('Навыки')
                    ->required('abilities')
                    ->multiple()
                    ->options(Ability::query()
                        ->whereNotNull('parent_id')
                        ->pluck('name', 'id')
                        ->toArray()
                    )
                    ->required(),
                TextInput::make('abilities_count')
                    ->label('Количество навыков')
                    ->numeric()
                    ->required(),
                TextInput::make('sub_klass_lvl')
                    ->label("Уровень получения под класса")
                    ->numeric()
                    ->required(),
                Select::make('abilities_spell')
                    ->label('Заклинательная характеристика')
                    ->options([
                        'Сила',
                        'Интеллект',
                        'Ловкость',
                        'Мудрость',
                        'Телосложение',
                        'Харизма'
                    ]),
            ]);
    }
}
