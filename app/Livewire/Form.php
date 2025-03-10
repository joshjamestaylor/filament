<?php


namespace App\Livewire;

use App\Models\Form as FormModel;
use App\Models\Submission;
use Livewire\Component;

class Form extends Component
{
    public $block;
    public $form;
    public $answers = []; // Array to hold answers
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    public function mount($block)
    {
        // Assuming $block contains the form ID
        $this->form = FormModel::find($block['data']['form']);
    }

    public function submit()
    {
        // Assuming the answers are coming from a form input and are stored in $this->answers
        // Example: $this->answers = ['question_1' => 'answer_1', 'question_2' => 'answer_2'];

        // Create a new submission with the form answers stored as JSON
        Submission::create([
            'form_id' => $this->form->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'answers' => $this->answers, // Storing answers as JSON
        ]);

        session()->flash('success', 'Form saved successfully!');
    }

    public function render()
    {
        return view('livewire.form', [
            'form' => $this->form,
        ]);
    }
}
