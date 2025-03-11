<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Filament\Resources\FormResource\Widgets\SubmissionTable;
use App\Models\Form;
use Filament\Forms\Form as FilamentForm;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

class FormResource extends Resource
{
    protected static ?string $model = Form::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(FilamentForm $form): FilamentForm
    {
        return $form
            ->schema([
                Tabs::make('Form Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Fields')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Form Title')
                                    ->required(),
    
                                Repeater::make('fields')
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('field_title')
                                            ->label('Field Title')
                                            ->maxLength(255),
                                        Select::make('field_type')
                                            ->label('Field type')
                                            ->options([
                                                'text' => 'Text',
                                            ])
                                            ->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            FormResource\Widgets\SubmissionTable::class, // Ensure correct namespace
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }
}
