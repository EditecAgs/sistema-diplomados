<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemiconductoresController extends Controller
{
    public function index(){
        $modulos = [
            [
                'id'     => 1,
                'num'    => 1,
                'nombre' => 'Física de semiconductores',
                'short'  => 'Fundamentos físicos y materiales',
                'imagen' => 'modulo1.jpg',
                'temas'  => [
                    'Estructuras Cristalinas',
                    'Materiales Semiconductores',
                    'Bandas de energía y portadores de carga',
                    'Materiales extrínsecos',
                    'Síntesis y caracterización fisicoquímica',
                ],
            ],
            [
                'id'     => 2,
                'num'    => 2,
                'nombre' => 'Diseño de circuitos integrados digitales',
                'short'  => 'Técnicas y herramientas CAD digitales',
                'imagen' => 'modulo2.jpg',
                'temas'  => [
                    'Tecnologías CMOS',
                    'Estructuras básicas',
                    'Circuitos combinacionales',
                    'Circuitos Secuenciales',
                    'Herramientas CAD',
                    'Aplicaciones',
                ],
            ],
            [
                'id'     => 3,
                'num'    => 3,
                'nombre' => 'Diseño de circuitos integrados analógicos',
                'short'  => 'Técnicas de diseño analógico',
                'imagen' => 'modulo3.jpg',
                'temas'  => [
                    'Región de operación de transistores MOS',
                    'Polarización',
                    'Estructuras básicas',
                    'Herramientas CAD',
                ],
            ],
            [
                'id'     => 4,
                'num'    => 4,
                'nombre' => 'Fabricación y layout para CI',
                'short'  => 'Procesos de fabricación y verificación',
                'imagen' => 'modulo4.jpg',
                'temas'  => [
                    'Proceso fotolitográfico',
                    'Proceso de diseño del layout para CI',
                    'Verificación',
                ],
            ],
            [
                'id'     => 5,
                'num'    => 5,
                'nombre' => 'Tecnologías emergentes',
                'short'  => 'IoT, IA, FPGA, cuántica y más',
                'imagen' => 'modulo5.jpg',
                'temas'  => [
                    'Otros transistores',
                    'Computación cuántica e Inteligencia Artificial',
                    'Internet de las cosas (IoT) y sistemas embebidos',
                    'FPGA',
                    'Diseño de PCB',
                    'Paneles solares',
                ],
            ],
        ];
        $investigadores = [
            [
                'nombre'      => 'Dr. Iram Antonio López Salas',
                'rol'         => 'Coordinador',
                'institucion' => 'Instituto Tecnológico de Aguascalientes',
                'foto'        => 'inv-3.jpg',
                'iniciales'   => 'IL',
            ],
        ];
        $fechas = [
            [
                'etiqueta' => 'Convocatoria',
                'fecha'    => null,
                'mes'      => null,
                'definida' => false,
            ],
            [
                'etiqueta' => 'Inscripciones',
                'fecha'    => null,
                'mes'      => null,
                'definida' => false,
            ],
            [
                'etiqueta' => 'Inicio',
                'fecha'    => null,
                'mes'      => null,
                'definida' => false,
            ],
            [
                'etiqueta' => 'Finalización',
                'fecha'    => null,
                'mes'      => null,
                'definida' => false,
            ],
        ];
        $footerLogos = [
            ['src' => 'images/gob-blanco.png',       'alt' => 'Gobierno de México'],
            ['src' => 'images/sep-blanco.png',        'alt' => 'SEP'],
            ['src' => 'images/logo_tecnm_white.png',  'alt' => 'TecNM'],
        ];

        $footerLinks = [
            ['label' => 'Inicio',             'href' => route('index')],
            ['label' => 'Sobre el diplomado', 'href' => route('index') . '#sobre'],
            ['label' => 'Módulos',            'href' => route('index') . '#modulos'],
            ['label' => 'Investigadores',     'href' => route('index') . '#investigadores'],
            ['label' => 'Fechas',             'href' => route('index') . '#fechas'],
            ['label' => 'Convocatoria',       'href' => route('index') . '#convocatoria'],
        ];
        $emailContacto = "prueba@mail.com";

        return view('diplomados.semiconductores.index' , compact('modulos', 'investigadores', 'fechas', 'footerLogos', 'footerLinks', 'emailContacto'));
    }
}
