<?php

namespace App\View\Components;

use Illuminate\View\Component;

class following-preview extends Component
{

    public $topOfferta
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topOfferta)
    {
        $this -> topOfferta = $topOfferta
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.following-preview');
    }
}
