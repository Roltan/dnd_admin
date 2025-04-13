<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use App\Models\Ability;
use App\Models\Proficiency as ModelsProficiency;
use Illuminate\Contracts\Database\Query\Builder;

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
                    ->options(Ability::query()
                        ->whereNull('parent_id')
                        ->pluck('name', 'id')
                        ->toArray())
                    ->multiple()
                    ->required(),
                Select::make('abilities')
                    ->label('Владения навыками')
                    ->relationship(
                        name: 'abilities',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereNotNull('parent_id')
                    )
                    ->multiple()
                    ->searchable()
                    ->required(),
                TextInput::make('abilities_count')
                    ->label('Количество навыков')
                    ->numeric()
                    ->required(),
                Select::make('proficiency')
                    ->label('Владения предметами')
                    ->columnSpan(2)
                    ->relationship('proficiencies', 'name')
                    ->multiple()
                    ->searchable()
            ]);
    }
}
