<?php

namespace App\Filament\Tabs\Klass;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class Equipment
{
    public static function make()
    {
        return Tab::make('Снаряжение')
            ->columns(1)
            ->schema([
                TextInput::make('money')
                    ->label('Деньги в обмен на снаряжение')
                    ->required(),
                Repeater::make('equipment')
                    ->label('Начальное снаряжение')
                    ->schema([
                        Repeater::make('items')
                            ->label('Вариант')
                            ->columns(2)
                            ->schema([
                                Select::make('type')
                                    ->label('Тип')
                                    ->searchable()
                                    ->options($equipment = [
                                        // Оружие
                                        'Короткий меч',
                                        'Длинный меч',
                                        'Боевой топор',
                                        'Молот',
                                        'Кинжал',
                                        'Арбалет',
                                        'Лук со стрелами',
                                        'Булава',
                                        'Копье',
                                        'Палица',
                                        'Длинный меч',
                                        'Рапира',

                                        // Доспехи
                                        'Кожаный доспех',
                                        'Кольчужная рубаха',
                                        'Щит',
                                        'Стеганый доспех',

                                        // Снаряжение
                                        'Набор артиста',
                                        'Набор дипломата',
                                        'Рюкзак',
                                        'Походное снаряжение',
                                        'Набор путешественника',
                                        'Мешок с инструментами',
                                        'Воровские инструменты',
                                        'Набор для грима',
                                        'Зелье лечения',
                                        'Священный символ',
                                        'Магический фокус',
                                        'Дротики',
                                        'Горсть серебряных монет',

                                        // Прочее
                                        'Веревка',
                                        'Факелы',
                                        'Трут и огниво',
                                        'Котелок',
                                        'Чернила и перо',
                                        'Бумага',
                                        'Фляга с водой',
                                        'Паек',
                                        'Лопатка',
                                        'Молоток и колья',

                                        // Для магических классов
                                        'Книга заклинаний',
                                        'Компонентная сумка',
                                        'Друидский фокус',

                                        // Для ремесленников
                                        'Кузнечные инструменты',
                                        'Алхимический набор',
                                        'Набор травника',

                                        // Для музыкантов
                                        'Лютня',
                                        'Флейта',
                                        'Барабан'
                                    ])
                                    ->required(),
                                TextInput::make('count')
                                    ->label('Количество')
                                    ->numeric()
                                    ->default(1)
                            ])
                            ->collapsible()
                            ->cloneable()
                    ])
                    ->collapsible()
                    ->cloneable()
                    ->required()
            ]);
    }
}
