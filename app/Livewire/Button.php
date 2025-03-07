<?php

namespace App\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $title;
    public $url;
    public $bg_color;
    public $text_color;

    public function mount($title = 'Read more', $url = 'Click Me', $bg_color = '', $text_color = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->bg_color = $bg_color;
        $this->text_color = $text_color;

    }

    public function render()
    {
        return view('livewire.button');
    }
}
