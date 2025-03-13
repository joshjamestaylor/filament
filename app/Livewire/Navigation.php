<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Setting;


class Navigation extends Component
{
    public $pages;
    public $site_name;

    public $selected_font;
    public $custom_font;

    public $isMobileMenuOpen = false;

    public function toggleMobileMenu()
    {
        $this->isMobileMenuOpen = !$this->isMobileMenuOpen;
    }



    public function mount()
    {
        $this->pages = Page::where('published', true)->orderBy('sort')->get();
        $this->site_name = Setting::first()->site_name ?? 'Default Site Name';

        $this->selected_font = Setting::first()->font ?? 'Times New Roman';
        $this->custom_font = Setting::first()->custom_font ?? '';


    }

    public function render()
    {
        return view('livewire.navigation',[
            'site_name' => $this->site_name,
            'selected_font' => $this->selected_font,
            'custom_font' => $this->custom_font,


        ]);
    }
}
