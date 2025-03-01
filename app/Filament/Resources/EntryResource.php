<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntryResource\Pages;
use App\Models\Entry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

class EntryResource extends Resource
{
    protected static ?string $model = Entry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live()
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))),
            Forms\Components\TextInput::make('slug')
                ->required(),
            Forms\Components\Toggle::make('published')
                ->label('Publish Page'),
            Builder::make('content')
                ->columnSpanFull()
                ->blocks([
                    Builder\Block::make('entry')
                        ->schema([
                            TextInput::make('entry_title')
                            ->label('Entry Title')
                            ->maxLength(255)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('entry_slug', \Str::slug($state))),
                        Forms\Components\TextInput::make('entry_slug')
                            ->required(),
                        Textarea::make('entry_description')
                            ->label('Entry Description')
                            ->maxLength(500),
                        FileUpload::make('entry_image')
                            ->label('Entry Image')
                            ->image()
                            ->directory('entry-images')
                            ->preserveFilenames(),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable(),
                Tables\Columns\IconColumn::make('published')->boolean(),
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
            'index' => Pages\ListEntries::route('/'),
            'create' => Pages\CreateEntry::route('/create'),
            'edit' => Pages\EditEntry::route('/{record}/edit'),
        ];
    }
}
