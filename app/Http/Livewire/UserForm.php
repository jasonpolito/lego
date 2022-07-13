<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserForm extends Component
{
    public $form;

    public function mount()
    {
        $inputs = $this->form->blocks;
        foreach ($inputs as $input) {
            $name = \Str::slug($input->input('name'), '_');
            if ($input->input('allow_multiple')) {
                $this->{$name} = [];
            } else {
                $this->{$name} = '';
            }
        }
    }

    public function render()
    {
        return view('livewire.user-form');
    }

    public function submit($data)
    {
        if (count($this->form->rules())) {
            $this->validate($this->form->rules());
        }

        $this->form->submit($data);
    }
}
