<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class Settings extends Component
{
    public $selected_font = '';
    public $custom_font;

    public function mount()
    {
        $this->selected_font = Setting::first()->selected_font ?? 'Times New Roman';
        $this->custom_font = Setting::first()->custom_font ?? '';

    }

    public function render()
    {
        return view('livewire.settings', [
            'selected_font' => $this->selected_font,
            'custom_font' => $this->custom_font
        ]);
    }
}
