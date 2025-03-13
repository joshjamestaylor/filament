<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $title;
    public $url;
    public $image;
    public $description;

    public function mount($title = '', $url = '', $image = '', $description = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->image = $image;
        $this->description = $description;


    }

    public function render()
    {
        return view('livewire.card');
    }
}
