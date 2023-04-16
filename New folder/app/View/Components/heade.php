<?php

namespace App\View\Components;

use Illuminate\View\Component;

class heade extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $publicurl;
    public function __construct($publicurl)
    {
        //
        $this->publicurl =$publicurl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heade');
    }
}
