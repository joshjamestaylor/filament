<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Models\Form;
use App\Models\Entry;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\{Repeater, Builder, FileUpload, Select, Toggle, TextInput, Textarea, RichEditor, Tabs};
use Filament\Forms\Components\Tabs\Tab;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    private static function getColors()
    {
        $setting = Setting::first();

        if ($setting && $setting->colors) {
            return collect(json_decode($setting->colors, true))
                ->pluck('color', 'label')
                ->filter()
                ->mapWithKeys(fn ($color, $label) => [$color => $label])
                ->toArray();
        }

        return [];
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        $colors = self::getColors();

        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live()
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Str::slug($state))),

            Forms\Components\TextInput::make('slug'),
            Forms\Components\Toggle::make('published')->label('Publish Page'),

            Tabs::make('Page Details')
                ->columnSpanFull()
                ->tabs([
                    self::createHeroTab($colors),
                    self::createContentTab($colors),
                    self::createMetaTab(),
                ]),
        ]);
    }

    private static function createHeroTab($colors)
    {
        return Tab::make('Hero')->schema([
            Select::make('hero_layout')
                ->label('Hero Layout')
                ->options([
                    'image-background' => 'Background Image',
                    'image-half' => 'Half-screen Image',
                    'image-boxed' => 'Boxed Image',
                ])
                ->required(),
            Toggle::make('hero_invert')->label('Invert Hero')->helperText('Swap text and image placement'),
            TextInput::make('hero_title')->label('Hero Title')->maxLength(255),
            TextInput::make('hero_subtitle')->label('Hero Subtitle')->maxLength(500),
            TextInput::make('hero_button')->label('Hero Button Text')->maxLength(100),
            FileUpload::make('hero_image')->label('Hero Image')->image()->directory('hero-images')->preserveFilenames(),
            Select::make('hero_bg_color')->label('Hero Background Color')->allowHtml()->options($colors),
            Select::make('hero_accent_color')->label('Hero Accent Color')->allowHtml()->options($colors),
            Select::make('hero_text_color')->label('Hero Text Color')->options(['light' => 'Light', 'dark' => 'Dark'])->default('dark'),
        ]);
    }

    private static function createContentTab($colors)
    {
        return Tab::make('Content')->schema([
            Builder::make('content')->blocks([
                Builder\Block::make('block')->schema(self::getBlockSchema($colors)),
                Builder\Block::make('entries')->schema(self::getEntriesSchema($colors)),
                Builder\Block::make('form')->schema(self::getFormSchema($colors)),
            ])->collapsible(),
        ]);
    }

    private static function getBlockSchema($colors)
    {
        return [
            Select::make('block_layout')
                ->label('Block Layout')
                ->options([
                    'image-background' => 'Background Image',
                    'image-half' => 'Half-screen Image',
                    'image-boxed' => 'Boxed Image',
                ])
                ->required(),
            Toggle::make('block_invert')->label('Block invert')->helperText('Swap text and image placement'),
            TextInput::make('block_title')->label('Block Title')->maxLength(255),
            Textarea::make('block_description')->label('Block Description')->maxLength(500),
            FileUpload::make('block_image')->label('Block Image')->image()->directory('block-images')->preserveFilenames(),
            Select::make('bg_color')->label('Background Color')->allowHtml()->options($colors),
            Select::make('accent_color')->label('Accent Color')->allowHtml()->options($colors),
            Select::make('text_color')->label('Text Color')->options(['light' => 'Light', 'dark' => 'Dark'])->default('dark'),
            Repeater::make('block_content')
            ->label('Block content')
            ->schema([
                Select::make('block_content_type')
                    ->label('Block Content Type')
                    ->options([
                        'text' => 'Text',
                        'image' => 'Image',
                        'button' => 'Button',
                    ])
                    ->reactive(),
    
                RichEditor::make('block_content_text')
                    ->label('Text Content')
                    ->maxLength(500)
                    ->visible(fn ($get) => $get('block_content_type') === 'text'),
    
                FileUpload::make('block_content_image')
                    ->label('Image Content')
                    ->image()
                    ->directory('block-content-image')
                    ->preserveFilenames()
                    ->visible(fn ($get) => $get('block_content_type') === 'image'),
                
                TextInput::make('block_content_button_title')
                    ->label('Button Title')
                    ->maxLength(100)
                    ->visible(fn ($get) => $get('block_content_type') === 'button'),
        
                TextInput::make('block_content_button_url')
                    ->label('Button URL')
                    ->url()
                    ->maxLength(255)
                    ->visible(fn ($get) => $get('block_content_type') === 'button'),
                    
                Select::make('block_content_button_bg_color')->label('Background Color')->allowHtml()->options($colors),
                Select::make('block_content_button_text_color')->options(['light' => 'Light', 'dark' => 'Dark'])


            ])
            ->collapsible()
            ->orderable(),
    
        ];
    }

    private static function getFormSchema($colors)
    {
        return [
            Select::make('form')
                ->label('Form')
                ->options(fn () => Form::pluck('title', 'id')->toArray())
                ->nullable(),
    
        ];
    }

    private static function getEntriesSchema($colors)
    {
        return [
            Select::make('entry')->label('Entry')->options(fn () => Entry::pluck('title', 'id')->toArray())->required(),
            Select::make('entries_layout')
                ->label('Entries Layout')
                ->options([
                    'show-preview' => 'Show Preview',
                    'show-all' => 'Show All',

                ])
                ->required(),
                
            Select::make('linked_page')
                ->label('Linked Page')
                ->options(fn () => Page::pluck('title', 'slug')->toArray())
                ->nullable(),
        ];
    }

    private static function createMetaTab()
    {
        return Tab::make('Meta')->schema([
            TextInput::make('meta_title')->label('Meta Title')->maxLength(255),
            Textarea::make('meta_description')->label('Meta Description')->maxLength(500),
            FileUpload::make('meta_image')->label('Meta Image')->image()->directory('meta-images')->preserveFilenames(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
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
