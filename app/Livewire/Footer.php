<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting; // Make sure to import the Setting model

class Footer extends Component
{
    public $site_name;

    public function mount()
    {
        // Get the 'site_name' value from the settings table
        $this->site_name = Setting::first()->site_name ?? 'Default Site Name';
    }

    public function render()
    {
        return view('livewire.footer',[
            'site_name' => $this->site_name,


        ]);
    }
}
