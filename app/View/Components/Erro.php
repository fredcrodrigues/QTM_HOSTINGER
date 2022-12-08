<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Erro extends Component
{
    public $erros;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($erros)
    {
        $this->erros= $erros;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.erro');
    }
}
