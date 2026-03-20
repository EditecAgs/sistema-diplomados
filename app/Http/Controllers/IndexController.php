<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
         $diplomados = [
            [
                'id'          => 1,
                'titulo'      => 'Diplomado en Diseño de ASICs',
                'descripcion' => 'Del concepto al tapeout. Diseño de circuitos integrados de aplicación específica.',
                'area'        => 'Electrónica',
                'institucion' => 'ITA · TecNM',
                'horas'       => 120,
                'modalidad'   => 'Teórico-Práctica',
                'modulos'     => 4,
                'status'      => 'open',
                'imagen'      => 'asic.jpg',
                'url'         => route('semiconductores.index'),
            ],
        ];
        $title = "Oferta Diplomados TECNM";
        return view('index', compact('diplomados', 'title'));
    }
}
