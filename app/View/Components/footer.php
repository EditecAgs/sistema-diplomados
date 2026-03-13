<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class footer extends Component
{
    public string $email;
    public string $sitio;
    public string $ciudad;
    public string $programa;
    public string $institucion;
    public string $anio;
    public array  $logos;
    public array  $navLinks;

    public function __construct(
        string $programa    = 'Diplomado en Semiconductores',
        string $institucion = 'Tecnológico Nacional de México',
        string $email       = 'contacto@ita.edu.mx',
        string $sitio       = 'https://www.ita.edu.mx',
        string $ciudad      = 'Aguascalientes, México',
        string $anio        = '2026',
        array  $logos       = [],
        array  $navLinks    = [],
    )
    {
        $this->programa    = $programa;
        $this->institucion = $institucion;
        $this->email       = $email;
        $this->sitio       = $sitio;
        $this->ciudad      = $ciudad;
        $this->anio        = $anio;
        $this->logos       = $logos;
        $this->navLinks    = $navLinks;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
