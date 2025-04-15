<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpellResource\Pages;
use App\Filament\Resources\SpellResource\RelationManagers;
use App\Filament\Tabs\Spell\MaterialsTab;
use App\Filament\Tabs\Spell\PropertyTab;
use App\Filament\Tabs\Spell\SpellTab;
use App\Models\Spell;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class SpellResource extends Resource
{
    protected static ?string $model = Spell::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Основные')->tabs([
                        SpellTab::make(),
                        PropertyTab::make(),
                        MaterialsTab::make(),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Название'),
                TextColumn::make('klass.name')
                    ->searchable()
                    ->label('Классы'),
                TextColumn::make('subKlass.name')
                    ->searchable()
                    ->label('Подклассы'),
                TextColumn::make('lvl')
                    ->sortable()
                    ->label("Уровень ячейки")
            ])
            ->filters([
                SelectFilter::make('lvl')
                    ->label('Уровень ячейки')
                    ->options([
                        1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9
                    ])
                    ->multiple(),

                SelectFilter::make('klass')
                    ->label('Класс')
                    ->relationship('klass', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),
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
            'index' => Pages\ListSpells::route('/'),
            'create' => Pages\CreateSpell::route('/create'),
            'edit' => Pages\EditSpell::route('/{record}/edit'),
        ];
    }
}
