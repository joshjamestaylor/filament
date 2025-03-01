<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Setting;


class Navigation extends Component
{
    public $pages;
    public $site_name;

    public function mount()
    {
        $this->pages = Page::where('published', true)->orderBy('sort')->get();
        $this->site_name = Setting::first()->site_name;

    }

    public function render()
    {
        return view('livewire.navigation',[
            'site_name' => $this->site_name,


        ]);
    }
}
