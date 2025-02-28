<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Forms\Form $form): Forms\Form
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
                Tabs::make('Page Details')
                ->columnSpanFull()
                    ->tabs([
                        Tab::make('Hero')
                        ->schema([
                            TextInput::make('hero_title')
                                ->label('Hero Title')
                                ->maxLength(255),
                            TextInput::make('hero_subtitle')
                                ->label('Hero Subtitle')
                                ->maxLength(500),
                            TextInput::make('hero_button')
                                ->label('Hero Button Text')
                                ->maxLength(100),
                            FileUpload::make('hero_image')
                                ->label('Hero Image')
                                ->image()
                                ->directory('hero-images')
                                ->preserveFilenames(),
                        ]),
                        Tab::make('Content')
                            ->schema([
                                Builder::make('content')
                                    ->blocks([
                                        Builder\Block::make('paragraph')
                                            ->schema([
                                                RichEditor::make('content')
                                                    ->label('Paragraph')
                                                    ->required(),
                                            ])
                                    ]),
              
                            ]),
                        
                        Tab::make('Meta')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->maxLength(255),
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(500),
                                FileUpload::make('meta_image')
                                    ->label('Meta Image')
                                    ->image()
                                    ->directory('meta-images')
                                    ->preserveFilenames(),
                            ]),
                        
                     
                    ]),
            ]);
    }
    
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable(),
                Tables\Columns\IconColumn::make('published')->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('published'),
            ])
            ->reorderable('sort');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
