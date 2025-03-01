<?php

namespace App\Livewire;

use Livewire\Component;

class Block extends Component
{
    public $block;

    public function mount($block)
    {
        $this->block = $block;
    }

    public function render()
    {
        return view('livewire.block');
    }
}
