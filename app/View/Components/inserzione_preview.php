<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inserzione_preview extends Component
{
    /**Stato corrente dell'inserzione
     *
     */
    public $stato;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stato)
    {
        $this -> stato = $stato;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inserzione-preview');
    }
}
