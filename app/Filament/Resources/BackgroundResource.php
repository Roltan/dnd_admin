<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BackgroundResource\Pages;
use App\Filament\Resources\BackgroundResource\RelationManagers;
use App\Filament\Tabs\Background\BackgroundTab;
use App\Filament\Tabs\Background\EquipmentTab;
use App\Filament\Tabs\Background\ProficiencyTab;
use App\Filament\Tabs\SkillsTab;
use App\Models\Background;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BackgroundResource extends Resource
{
    protected static ?string $model = Background::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Основные')->tabs([
                        BackgroundTab::make(),
                        EquipmentTab::make(),
                        ProficiencyTab::make(),
                        SkillsTab::make(),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Происхождение'),
                TextColumn::make('manual')
                    ->label('Подробности')
                    ->url(fn ($state) => $state, true),
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
            'index' => Pages\ListBackgrounds::route('/'),
            'create' => Pages\CreateBackground::route('/create'),
            'edit' => Pages\EditBackground::route('/{record}/edit'),
        ];
    }
}
