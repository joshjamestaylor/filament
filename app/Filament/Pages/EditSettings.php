<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Notifications\Notification;



 
class EditSettings extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = []; 
 
    protected static ?string $navigationIcon = 'heroicon-o-cog';
 
    protected static string $view = 'filament.pages.edit-settings';
 
    public function mount(): void 
    {
        $this->form->fill(); 
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
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