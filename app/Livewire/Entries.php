<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entry;

class Entries extends Component
{
    public $entries = [];
    public $slug = '';

    public function mount($block)
    {
        $entry = Entry::find($block['data']['entry']); // Fetch entry from DB

        if ($entry) {
            $this->entries = $entry->content; // Assign the 'content' array
            $this->slug = $entry->slug;
        }
        
    }

    public function render()
    {
        return view('livewire.entries');
    }
}
