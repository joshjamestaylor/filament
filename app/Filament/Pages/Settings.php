<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;



class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = []; 
 
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 5;
 
    protected static string $view = 'filament.pages.edit-settings';
 
    public function mount(): void 
    {
        $setting = auth()->user()->setting; 
        if ($setting) {
            $this->form->fill([
                'site_name' => $setting->site_name,
                'site_logo' => $setting->site_logo,
                'meta_title' => $setting->meta_title,
                'meta_description' => $setting->meta_description,
                'meta_image' => $setting->meta_image,
                'light_color' => $setting->light_color,
                'dark_color' => $setting->dark_color,
                'colors' => json_decode($setting->colors, true),
                'dark_mode' => $setting->dark_mode
            ]);
        }

    }
    
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->schema([
                                TextInput::make('site_name')
                                    ->required(),
                                FileUpload::make('site_logo')
                                    ->label('Site Logo')
                                    ->image()
                                    ->directory('site-assets')
                                    ->preserveFilenames(),

                            ]),
                        
                        Tabs\Tab::make('Meta')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title'),
                                
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->maxLength(160),
                                
                                FileUpload::make('meta_image')
                                    ->label('Meta Image')
                                    ->image()
                                    ->directory('meta-images')
                                    ->preserveFilenames(),

                            ]),

                            Tabs\Tab::make('Colors')
                            ->schema([
                                Checkbox::make('dark_mode')
                                ->label('Enable Dark Mode')
                                ->default(false),

                                ColorPicker::make('light_color')
                                ->label('Light Color'),

                                ColorPicker::make('dark_color')
                                ->label('Dark Color'),

                                Repeater::make('colors')
                                    ->schema([
                                        TextInput::make('label')
                                        ->label('Color Label') 
                                        ->required(), 
                                        ColorPicker::make('color'),
                                    ])
                                    ->minItems(1) 
                                    ->maxItems(10), 
                            ]),

                            Tabs\Tab::make('Fonts')
                            ->schema([
                                Select::make('selected_font')
                                ->label('Choose Font')
                                ->options([
                                    'Times New Roman' => 'Times New Roman',
                                    'Helvetica' => 'Helvetica',
                                    'Courier New' => 'Courier New',
                                    'Georgia' => 'Georgia',
                                    'Verdana' => 'Verdana',
                                    'Trebuchet MS' => 'Trebuchet MS',
                                    'Papyrus' => 'Papyrus',
                                    //TODO: 'Custom' => 'Custom (Uploaded)',
                                ])
                                ->live()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('custom_font', $state === 'Custom' ? null : '')),
                    
                            FileUpload::make('custom_font')
                                ->label('Upload Custom Font')
                                ->disk('public')
                                ->directory('fonts')
                                ->acceptedFileTypes(['.woff', '.woff2'])
                                ->visible(fn ($get) => $get('selected_font') === 'Custom'),
                        
                            ]),
                        
                        
                    ])
            ])
            ->statePath('data');
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
    
            $setting = auth()->user()->setting ?: auth()->user()->setting()->create();
    
            $setting->update($data);
        } catch (Halt $exception) {
            return;
        }
        Notification::make() 
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
        ->send(); 
    }

}
