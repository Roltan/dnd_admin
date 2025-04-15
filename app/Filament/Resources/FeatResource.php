<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatResource\Pages;
use App\Filament\Resources\FeatResource\RelationManagers;
use App\Filament\Tabs\Feat\ConditionTab;
use App\Filament\Tabs\Feat\FeatTab;
use App\Filament\Tabs\Feat\ResourcesTab;
use App\Filament\Tabs\SkillsTab;
use App\Models\Feat;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeatResource extends Resource
{
    protected static ?string $model = Feat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Основные')->tabs([
                        FeatTab::make(),
                        ConditionTab::make(),
                        ResourcesTab::make(),
                        SkillsTab::make()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Черта'),
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
            'index' => Pages\ListFeats::route('/'),
            'create' => Pages\CreateFeat::route('/create'),
            'edit' => Pages\EditFeat::route('/{record}/edit'),
        ];
    }
}
