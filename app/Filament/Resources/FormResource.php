<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResource\Pages;
use App\Models\Form;
use Filament\Forms;
use Filament\Forms\Form as FilamentForm;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

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
    
                        Tab::make('Submissions')
                            ->schema([

                            ]),
                    ]),
                    
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
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
            'index' => Pages\ListForms::route('/'),
            'create' => Pages\CreateForm::route('/create'),
            'edit' => Pages\EditForm::route('/{record}/edit'),
        ];
    }
}
