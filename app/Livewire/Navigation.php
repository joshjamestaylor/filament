<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Setting;


class Navigation extends Component
{
    public $pages;
    public $site_name;

    public $isMobileMenuOpen = false;
    public $openDropdown = null;

    public function toggleMobileMenu()
    {
        $this->isMobileMenuOpen = !$this->isMobileMenuOpen;
    }

    public function toggleDropdown($dropdown)
    {
        $this->openDropdown = ($this->openDropdown === $dropdown) ? null : $dropdown;
    }

    public function closeDropdown()
    {
        $this->openDropdown = null;
    }

    public function mount()
    {
        $this->pages = Page::where('published', true)->orderBy('sort')->get();
        $this->site_name = Setting::first()->site_name ?? 'Default Site Name';

    }

    public function render()
    {
        return view('livewire.navigation',[
            'site_name' => $this->site_name,


        ]);
    }
}
