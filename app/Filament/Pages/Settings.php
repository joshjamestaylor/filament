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



class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = []; 
 
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 5;
 
    protected static string $view = 'filament.pages.edit-settings';
 
    public function mount(): void 
    {
        // Assuming your setting model is tied to the authenticated user
        $setting = auth()->user()->setting; 
        if ($setting) {
            // Populate the form with the saved setting data
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
                        // General tab
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
                        
                        // Meta tab
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
                                        TextInput::make('label') // Add a label field
                                        ->label('Color Label') // Set the label for the label field
                                        ->required(), // Optional: Make the label field required
                                        ColorPicker::make('color'),
                                    ])
                                    ->minItems(1) // Optional: you can set a minimum number of items
                                    ->maxItems(10), // Optional: you can set a maximum number of items
                            ]),
                        
                        // Socials tab
                        
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
    
            // Ensure the user has a setting, create one if it doesn't exist
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
