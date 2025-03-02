<?php

namespace App\Livewire;

use Livewire\Component;

class Hero extends Component
{
    public $page;

    public function mount($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.hero', [
            'heroImage' => $this->page->hero_image,
            'heroTitle' => $this->page->hero_title,
            'heroSubtitle' => $this->page->hero_subtitle,
            'heroButton' => $this->page->hero_button,
            'heroBgColor' => $this->page->hero_bg_color,
            'heroAccentColor' => $this->page->hero_accent_color,
            'heroTextColor' => $this->page->hero_text_color,
            'heroLayout' => $this->page->hero_layout,
            'heroInvert' => $this->page->hero_invert

        ]);
    }
}
