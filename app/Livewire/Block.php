<?php

namespace App\Livewire;

use Livewire\Component;

class Block extends Component
{
    public $block;

    public function mount($block)
    {
        // You can set the $block data here if it's not passed from the parent
        $this->block = $block;
    }

    public function render()
    {
        return view('livewire.block');
    }
}
