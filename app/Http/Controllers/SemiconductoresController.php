<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Municipality;
use App\Models\Inscription;
use Illuminate\Database\UniqueConstraintViolationException;
use App\Mail\InscripcionConfirmada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;



class SemiconductoresController extends Controller
{
    public function index(){
        $modulos = [
            [
                'id'     => 1,
                'num'    => 1,
                'nombre' => 'Definición de características, flujo de diseño y procesos de fabricación.',
                'short'  => 'Duración: 15 horas',
                'imagen' => 'modulo1.jpg',
                'description' => 'Establecer el marco conceptual e industrial del diseño de ASICs, permitiendo a los participantes comprender el flujo completo antes de entrar al detalle técnico. Este módulo es clave para alinear expectativas, lenguaje técnico y criterios de diseño.',
                'temas'  => [
                    'Flujo completo de diseño de un circuito integrado (ASIC)',
                    'Definición de características de un circuito integrado',
                    'Procesos de fabricación y PDKs',
                    'Herramientas de diseño para ASICs',
                ],
            ],
            [
                'id'     => 2,
                'num'    => 2,
                'nombre' => 'Diseño Analógico',
                'short'  => 'Duración: 40 horas',
                'imagen' => 'modulo3.jpg',
                'description' => 'Desarrollar una comprensión sólida del diseño analógico a nivel transistor, enfatizando su impacto en el desempeño global del sistema y su interacción con bloques digitales.',
                'temas'  => [
                    'Transistor MOSFET: curvas características y polarización',
                    'Etapas de amplificación',
                    'Amplificadores diferenciales',
                    'Convertidores ADC y DAC',
                    'Otros bloques analógicos relevantes',
                ],
            ],
            [
                'id'     => 3,
                'num'    => 3,
                'nombre' => 'Diseño Digital',
                'short'  => 'Duración: 40 horas',
                'imagen' => 'modulo2.jpg',
                'description' => 'Formar a los participantes en el diseño lógico y arquitectónico de sistemas digitales, conectando el código HDL con su implementación física y su impacto en área, consumo y desempeño.',
                'temas'  => [
                    'Lenguajes de descripción de hardware (HDL)',
                    'Diseño combinacional',
                    'Diseño secuencial',
                    'Sistemas de procesamiento y memorias',
                    'Síntesis lógica y place & route',
                ],
            ],
            [
                'id'     => 4,
                'num'    => 4,
                'nombre' => 'Diseño físico y fabricación',
                'short'  => 'Duración: 25 horas',
                'imagen' => 'modulo4.jpg',
                'description' => 'Cerrar el ciclo completo del diseño de ASICs, permitiendo a los participantes comprender y ejecutar las etapas finales previas al tapeout, con énfasis en verificación y manufacturabilidad.',
                'temas'  => [
                    'Layout analógico y digital',
                    'Verificación física',
                    'Pad ring e interfaces de entrada/salida',
                    'Tapeout'
                ],
            ],
        ];
        $investigadores = [
            [
                'nombre'      => 'Dr. Iraam Antonio López Salas',
                'rol'         => 'Coordinador',
                'institucion' => 'Instituto Tecnológico de Aguascalientes',
                'foto'        => 'inv-3.jpg',
                'iniciales'   => 'IL',
            ],
        ];
        $fechas = [
            [
                'etiqueta' => 'Publicación de la convocatoria',
                'fecha'    => '21',
                'dia'      => 'Sábado 21',
                'mes'      => 'Marzo 2026',
                'definida' => true,
                'highlight'=> true,
                'modulo'   => null,
                'desc'     => null,
                'sesiones' => [],
                'opciones' => [],
            ],
            [
                'etiqueta' => 'Inicio del diplomado',
                'fecha'    => '13',
                'dia'      => 'Lunes 13',
                'mes'      => 'Abril 2026',
                'definida' => true,
                'highlight'=> true,
                'modulo'   => null,
                'desc'     => null,
                'sesiones' => [],
                'opciones' => [],
            ],
            [
                'etiqueta' => 'Definición, flujo de diseño y fabricación',
                'fecha'    => '13 abr – 10 may',
                'mes'      => 'Abril – Mayo',
                'definida' => true,
                'highlight'=> false,
                'modulo'   => 1,
                'desc'     => '15 horas · 8 síncronas · 7 asíncronas',
                'sesiones' => ['4 sesiones de 2 hrs · 16, 23, 30 de abril y 7 de mayo · 11:00–13:00'],
                'opciones' => [],
            ],
            [
                'etiqueta' => 'Diseño de circuitos integrados digitales',
                'fecha'    => '11 may – 21 jun',
                'mes'      => 'Mayo – Junio',
                'definida' => true,
                'highlight'=> false,
                'modulo'   => 2,
                'desc'     => '40 horas · 15 síncronas · 25 asíncronas',
                'sesiones' => ['6 sesiones de 2h30 · 14, 21, 28 mayo y 4, 11, 18 junio · 11:00–13:30'],
                'opciones' => [],
            ],
            [
                'etiqueta' => 'Diseño de circuitos integrados analógicos',
                'fecha'    => '22 jun – 12 jul',
                'mes'      => 'Junio – Julio',
                'definida' => true,
                'highlight'=> false,
                'modulo'   => 3,
                'desc'     => '40 horas · 15 síncronas · 25 asíncronas',
                'sesiones' => ['6 sesiones de 2h30 · 23, 25, 30 junio y 2, 7, 9 julio · 11:00–13:30'],
                'opciones' => [],
            ],
            [
                'etiqueta' => 'Semana presencial — Lab SEA Aguascalientes',
                'fecha'    => 'Agosto 2026',
                'mes'      => 'Agosto',
                'definida' => true,
                'highlight'=> false,
                'modulo'   => 4,
                'desc'     => '25 horas presenciales · Acorde a los grupos que se formen',
                'sesiones' => [],
                'opciones' => ['3 – 7 agosto', '10 – 14 agosto'],
            ],
            [
                'etiqueta' => 'Tapeout — Chip multiproyecto',
                'fecha'    => 'Septiembre 2026',
                'mes'      => 'Septiembre',
                'definida' => true,
                'highlight'=> true,
                'modulo'   => null,
                'desc'     => 'Envío del diseño final para fabricación del chip.',
                'sesiones' => [],
                'opciones' => [],
            ],
        ];
        $footerLogos = [
            ['src' => 'images/gob-blanco.png',       'alt' => 'Gobierno de México'],
            ['src' => 'images/sep-blanco.png',        'alt' => 'SEP'],
            ['src' => 'images/logo_tecnm_white.png',  'alt' => 'TecNM'],
        ];

        $footerLinks = [
            ['label' => 'Inicio',             'href' => route('index')],
            ['label' => 'Sobre el diplomado', 'href' => route('index') . '#information'],
            ['label' => 'Perfíl de Ingreso', 'href' => route('index') . '#profile'],
            ['label' => 'Módulos',            'href' => route('index') . '#modules'],
            ['label' => 'Investigadores',     'href' => route('index') . '#researches'],
            ['label' => 'Fechas',             'href' => route('index') . '#dates'],
            ['label' => 'Convocatoria',       'href' => '#'],
        ];
        $emailContacto = "diplomado_asic@aguascalientes.tecnm.mx";
        $title = "Diplomado en Diseño de Circuitos Integrados de Aplicación Específica";

        return view('diplomados.semiconductores.index' , compact('modulos', 'investigadores', 'fechas', 'footerLogos', 'footerLinks', 'emailContacto', 'title'));
    }
    public function register(){
        if (Inscription::count() >= 300) {
            return redirect()->route('index')
            ->with('cupo_lleno', 'Lo sentimos, el cupo del diplomado está completo.');
        }
        $title = 'Registro';
        $states = State::all();
        $municipalities = collect();
        return view('diplomados.semiconductores.register', compact('title','states','municipalities'));
    }

    public function municipiosPorEstado($stateId)
    {
        $municipios = Municipality::where('id_state', $stateId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($municipios);
    }

    public function store(Request $request)
    {
        if (Inscription::count() >= 300) {
            return back()->withErrors([
                'general' => 'Lo sentimos, el cupo del diplomado está completo. No es posible recibir más solicitudes en este momento.',
            ]);
        }

        $request->validate(
            [
                'rfc'              => ['required', 'string', 'min:12', 'max:13', 'regex:/^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$/i', 'unique:inscriptions,rfc'],
                'curp'             => ['required', 'string', 'size:18', 'regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9]{2}$/i', 'unique:inscriptions,curp'],
                'nombre'           => ['required', 'string', 'max:100'],
                'apellidos'        => ['required', 'string', 'max:100'],
                'genero'           => ['required', 'in:M,F,ND'],
                'email'            => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:150', 'unique:inscriptions,email'],
                'estado'           => ['required', 'exists:states,id'],
                'municipio'        => ['required', 'exists:municipalities,id'],
                'ciudad'           => ['required', 'string', 'max:100'],
                'sector'           => ['required', 'in:publico,privado'],
                'funcion_laboral'  => ['required', 'in:empleado,empleador,docente'],
                'institucion'      => ['required', 'string', 'max:200'],
                'cv'               => ['required', 'file', 'mimes:pdf', 'max:5120'],
                'carta_compromiso' => ['required', 'file', 'mimes:pdf', 'max:5120'],
                'carta_jefe'       => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
            ],
            [
                'rfc.required'              => 'El RFC es obligatorio.',
                'rfc.min'                   => 'El RFC debe tener mínimo 12 caracteres.',
                'rfc.max'                   => 'El RFC debe tener máximo 13 caracteres.',
                'rfc.regex'                 => 'El formato del RFC no es válido.',
                'rfc.unique'                => 'El RFC ya está registrado en el sistema.',
                'curp.required'             => 'El CURP es obligatorio.',
                'curp.size'                 => 'El CURP debe tener exactamente 18 caracteres.',
                'curp.regex'                => 'El formato del CURP no es válido.',
                'curp.unique'               => 'El CURP ya está registrado en el sistema.',
                'nombre.required'           => 'El nombre es obligatorio.',
                'apellidos.required'        => 'Los apellidos son obligatorios.',
                'genero.required'           => 'El género es obligatorio.',
                'genero.in'                 => 'El género seleccionado no es válido.',
                'email.required'            => 'El correo electrónico es obligatorio.',
                'email.string'              => 'El correo electrónico debe ser texto.',
                'email.lowercase'           => 'El correo electrónico debe estar en minúsculas.',
                'email.email'               => 'El correo electrónico no es válido o el dominio no existe.',
                'email.max'                 => 'El correo electrónico no debe superar los 150 caracteres.',
                'email.unique'              => 'El correo electrónico ya está registrado.',
                'estado.required'           => 'El estado es obligatorio.',
                'estado.exists'             => 'El estado seleccionado no es válido.',
                'municipio.required'        => 'El municipio es obligatorio.',
                'municipio.exists'          => 'El municipio seleccionado no es válido.',
                'ciudad.required'           => 'La ciudad es obligatoria.',
                'sector.required'           => 'El sector es obligatorio.',
                'sector.in'                 => 'El sector seleccionado no es válido.',
                'funcion_laboral.required'  => 'La función laboral es obligatoria.',
                'funcion_laboral.in'        => 'La función laboral seleccionada no es válida.',
                'institucion.required'      => 'La empresa o institución es obligatoria.',
                'cv.required'               => 'El currículum vitae es obligatorio.',
                'cv.mimes'                  => 'El CV debe ser un archivo PDF.',
                'cv.max'                    => 'El CV no debe superar los 5 MB.',
                'carta_compromiso.required' => 'La carta compromiso firmada es obligatoria.',
                'carta_compromiso.mimes'    => 'La carta compromiso debe ser un archivo PDF.',
                'carta_compromiso.max'      => 'La carta compromiso no debe superar los 5 MB.',
                'carta_jefe.mimes'          => 'La carta de apoyo debe ser un archivo PDF.',
                'carta_jefe.max'            => 'La carta de apoyo no debe superar los 5 MB.',
            ]
        );

        // Guardar archivos
        $cvPath              = $request->file('cv')
                                ->store('registros/cv', 'local');

        $cartaCompromisoPath = $request->file('carta_compromiso')
                                ->store('registros/cartas-compromiso', 'local');

        $cartaJefePath       = $request->hasFile('carta_jefe')
                                ? $request->file('carta_jefe')->store('registros/cartas-jefe', 'local')
                                : null;

        // Guardar en BD
        try {
            $inscription = Inscription::create([
                'rfc'                    => strtoupper($request->rfc),
                'curp'                   => strtoupper($request->curp),
                'first_name'             => $request->nombre,
                'last_name'              => $request->apellidos,
                'gender'                 => $request->genero,
                'email'                  => $request->email,
                'state_id'               => $request->estado,
                'municipality_id'        => $request->municipio,
                'city'                   => $request->ciudad,
                'sector'                 => $request->sector,
                'job_function'           => $request->funcion_laboral,
                'institution'            => $request->institucion,
                'cv_path'                => $cvPath,
                'commitment_letter_path' => $cartaCompromisoPath,
                'support_letter_path'    => $cartaJefePath,
            ]);

        } catch (UniqueConstraintViolationException $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'general' => 'Algunos datos ya están registrados. Verifica tu RFC, CURP o correo electrónico.',
                ]);
        }

        // Enviar correo — separado para que un fallo no afecte el registro
        try {
            Mail::to($inscription->email)
                ->send(new InscripcionConfirmada($inscription));
        } catch (\Exception $e) {
            Log::error('Error enviando correo de inscripción ID ' . $inscription->id . ': ' . $e->getMessage());
        }

        return back()->with('success', '¡Tu solicitud fue enviada correctamente! Nos pondremos en contacto contigo pronto. Si tienes alguna duda comunícate al correo diplomado_asic@aguascalientes.tecnm.mx');
    }
}
