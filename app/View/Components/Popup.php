<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Popup extends Component
{
    public $domId;

    public function __construct($domId)
    {
        $this->domId = $domId;
    }
   /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popup');
    }
}
