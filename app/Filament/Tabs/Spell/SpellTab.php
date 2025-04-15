<?php

namespace App\Filament\Tabs\Spell;

use App\Models\Klass;
use App\Models\SubKlass;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

class SpellTab
{
    public static function make()
    {
        return Tab::make('Заклинание')
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                TextInput::make('scripts')
                    ->label('Скрипт'),
                Textarea::make('description')
                    ->label('Описание')
                    ->columnSpan(2)
                    ->required(),
                Select::make('klass')
                    ->label('Классы')
                    ->relationship('klass')
                    ->multiple()
                    ->preload()
                    ->live()
                    ->options(Klass::all()->pluck('name', 'id')->toArray())
                    ->required(),
                Select::make('subKlass')
                    ->label('Под классы')
                    ->multiple()
                    ->searchable()
                    ->relationship(
                        name: 'subKlass',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query, callable $get) {
                            $selectedKlasses = $get('klass');

                            return $query->whereHas('klass',
                                fn($q) => $q->whereIn('id', $selectedKlasses)
                            );
                        }
                    )

            ]);
    }
}
