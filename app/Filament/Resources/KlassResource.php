<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KlassResource\Pages;
use App\Filament\Resources\KlassResource\RelationManagers;
use App\Filament\Tabs\Klass\EquipmentTab;
use App\Filament\Tabs\Klass\KlassTab;
use App\Filament\Tabs\Klass\KlassUnitsTab;
use App\Filament\Tabs\Klass\ProficiencyTab;
use App\Filament\Tabs\Klass\SubKlassTab;
use App\Filament\Tabs\SkillsTab;
use App\Models\Klass;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KlassResource extends Resource
{
    protected static ?string $model = Klass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Основные')->tabs([
                        KlassTab::make(),
                        ProficiencyTab::make(),
                        EquipmentTab::make(),
                        SkillsTab::make(),
                        KlassUnitsTab::make(),
                        SubKlassTab::make()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Класс'),
                TextColumn::make('manual')
                    ->label('Подробности')
                    ->url(fn ($state) => $state, true),
                TextColumn::make('source')
                    ->label('Источник'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKlasses::route('/'),
            'create' => Pages\CreateKlass::route('/create'),
            'edit' => Pages\EditKlass::route('/{record}/edit'),
        ];
    }
}
