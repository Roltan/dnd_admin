<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use App\Models\Ability;
use App\Models\Proficiency as ModelsProficiency;

class Proficiency
{
    public static function make()
    {
        return Tab::make('Владения')
            ->columns(2)
            ->schema([
                Select::make('save_stat')
                    ->label('Владения спас бросками')
                    ->columnSpan(2)
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
                    ->label('Владения навыками')
                    ->required('abilities')
                    ->multiple()
                    ->searchable()
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
                Select::make('proficiency')
                    ->label('Владения предметами')
                    ->columnSpan(2)
                    ->relationship('proficiencies')
                    ->multiple(true)
                    ->options(ModelsProficiency::all()
                        ->pluck('name', 'id')
                        ->toArray()
                    )
            ]);
    }
}
