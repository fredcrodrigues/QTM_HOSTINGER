<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $alerta;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alerta)
    {
        $this->alerta= $alerta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
