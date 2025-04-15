<?php

namespace App\Filament\Tabs\Background;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use App\Models\Ability;
use App\Models\Proficiency as ModelsProficiency;
use Illuminate\Contracts\Database\Query\Builder;

class ProficiencyTab
{
    public static function make()
    {
        return Tab::make('Владения')
            ->columns(1)
            ->schema([
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
                Select::make('proficiency')
                    ->label('Владения предметами')
                    ->relationship('proficiencies', 'name')
                    ->multiple()
                    ->searchable()
            ]);
    }
}
