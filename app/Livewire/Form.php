<?php

namespace App\Livewire;

use App\Models\Form as FormModel;
use Livewire\Component;

class Form extends Component
{
    public $block;
    public $form;

    public function mount($block)
    {
        // Assuming $block contains the form ID
        $this->form = FormModel::find($block['data']['form']);
    }

    public function render()
    {
        return view('livewire.form', [
            'form' => $this->form,
        ]);
    }
}
