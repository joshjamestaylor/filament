<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entry;

class Entries extends Component
{
    public $entries = [];
    public $slug = '';
    public $linked_page = '';
    public $entries_layout;

    public function mount($block, $entries_layout = 'show')
    {
        $entry = Entry::find($block['data']['entry']); // Fetch entry from DB
        $this->entries_layout = $block['data']['entries_layout'];
        $this->linked_page = $block['data']['linked_page'];

        if ($entry) {
            $this->entries = $entry->content; // Assign the 'content' array
            $this->slug = $entry->slug;

            // Apply filtering logic here
            if ($this->entries_layout === 'show-preview') {
                $this->entries = array_slice($this->entries, 0, 3);
            }
        }
    }

    public function render()
    {
        return view('livewire.entries', [
            'entries_layout' => $this->entries_layout,
            'entries' => $this->entries,
            'slug' => $this->slug,
            'linked_page' => $this->linked_page,

        ]);
    }
}
