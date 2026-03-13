<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $inicio;
    public $convocatoria;
    public $plataforma;
    public $registro;

    public function __construct($inicio = '#', $convocatoria = '#', $plataforma = '#', $registro = '#')
    {
        $this->inicio = $inicio;
        $this->convocatoria = $convocatoria;
        $this->plataforma = $plataforma;
        $this->registro = $registro;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
