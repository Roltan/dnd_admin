<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class EquipmentTab
{
    public static function make()
    {
        return Tab::make('Снаряжение')
            ->columns(1)
            ->schema([
                TextInput::make('money')
                    ->label('Деньги в обмен на снаряжение')
                    ->required(),
                Textarea::make('equipment')
                    ->label('Доступное начальное снаряжение')
                    ->hint('Тут необходимо закодировать логическое выражение о доступных вариантах начального снаряжения')
                    ->helperText("
                        КАЖДЫЙ специальный символ должен отделяться пробелами.\n
                        Пробелы в названиях предметом заменять на '_'.\n
                        Названия предметов всегда писать в единственном числе.\n
                        'и', 'или' - логические операторы.\n
                        Разрешены скобки, которые объединяют часть выражения в одно целое для операторов вокруг скобок.\n
                        Перед названием можно поставить число, определяющее количество этого предмета, без указания числа, будет 1.\n
                        '#' - означает что следующее слово надо воспринимать как категорию предметов, а не 1 предмет
                    ")
                    ->required(),
            ]);
    }
}
