<?php

namespace App\View\Components;

use Illuminate\View\Component;

class combo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $options;
    public $default;
    public $attributes;
    public function __construct($name,$options=[],$default,$attributes="")
    {
        $this->name=$name;
        $this->options=$options;
        $this->default=$default;
        $this->attributes=$attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.combo');
    }
}
