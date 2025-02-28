<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;

class Navigation extends Component
{
    public $pages;

    public function mount()
    {
        $this->pages = Page::where('published', true)->orderBy('sort')->get();
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
