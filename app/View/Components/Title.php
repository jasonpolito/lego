<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    public $el;
    public $class;
    public $display;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($el = 'h1', $class = '', $display = null)
    {
        $this->el = $el;
        $this->display = $display ?? $el;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.title');
    }
}