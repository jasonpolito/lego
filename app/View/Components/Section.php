<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Section extends Component
{
    public $class;
    public $id;
    public $uuid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = '', $id = false)
    {
        $this->class = $class;
        $this->id = $id;
        $this->uuid = uniqid();
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.section');
    }
}