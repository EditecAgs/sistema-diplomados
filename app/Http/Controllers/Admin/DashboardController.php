<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\InscriptionStatus;
use App\Models\Graduate;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $diplomadoId = $request->get('diplomado_id');
        
        $diplomados = Graduate::all();
        
        if (!$diplomadoId && $diplomados->isNotEmpty()) {
            $diplomadoId = $diplomados->first()->id;
        }
        
        $diplomadoActual = $diplomadoId ? Graduate::find($diplomadoId) : null;
        
        $stats = $this->getEstadisticas($diplomadoId);
        $chartData = $this->getChartData($diplomadoId);
        $estadosMexico = $this->getEstadosMexico($diplomadoId);
            $instituciones = $this->getInstituciones($diplomadoId); // ✅ Nueva línea

        
        return view('admin.pages.dashboard', compact('diplomados', 'diplomadoActual', 'stats', 'chartData', 'estadosMexico','instituciones', 'diplomadoId'));
    }

    private function getEstadisticas($diplomadoId)
    {
        // Total de inscripciones
        $total = Inscription::count();
    
        $statusQuery = InscriptionStatus::query();
        if ($diplomadoId) {
            $statusQuery->where('id_graduate', $diplomadoId);
        }
    
        $aceptados = (clone $statusQuery)->where('status', 'aceptado')->count();
        $rechazados = (clone $statusQuery)->where('status', 'rechazado')->count();
        $pendientes = $total - $aceptados - $rechazados;
        
        // Porcentajes
        $porcentajeAceptacion = $total > 0 ? round(($aceptados / $total) * 100, 1) : 0;
        $porcentajeRechazo = $total > 0 ? round(($rechazados / $total) * 100, 1) : 0;
        $porcentajePendiente = $total > 0 ? round(($pendientes / $total) * 100, 1) : 0;
        
        // ✅ ESTADÍSTICAS SOLO DE ACEPTADOS
        // Obtener IDs de inscripciones aceptadas
        $inscripcionesAceptadasIds = InscriptionStatus::where('status', 'aceptado')
            ->when($diplomadoId, function($q) use ($diplomadoId) {
                $q->where('id_graduate', $diplomadoId);
            })
            ->pluck('id_inscription');
        
        // Estadísticas por género (solo aceptados)
        $hombres = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'M')->count();
        $mujeres = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'F')->count();
        $noEspecificado = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'ND')->count();
        
        // Estadísticas por sector (solo aceptados)
        $sectorPublico = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('sector', 'publico')->count();
        $sectorPrivado = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('sector', 'privado')->count();
        
        // Estadísticas por función laboral (solo aceptados)
        $funcionEmpleado = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('job_function', 'empleado')->count();
        $funcionEmpleador = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('job_function', 'empleador')->count();
        $funcionDocente = Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('job_function', 'docente')->count();
        
        return [
            'total' => $total,
            'aceptados' => $aceptados,
            'rechazados' => $rechazados,
            'pendientes' => $pendientes,
            'porcentaje_aceptacion' => $porcentajeAceptacion,
            'porcentaje_rechazo' => $porcentajeRechazo,
            'porcentaje_pendiente' => $porcentajePendiente,
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'no_especificado' => $noEspecificado,
            'sector_publico' => $sectorPublico,
            'sector_privado' => $sectorPrivado,
            'funcion_empleado' => $funcionEmpleado,
            'funcion_empleador' => $funcionEmpleador,
            'funcion_docente' => $funcionDocente,
        ];
    }
    
    private function getChartData($diplomadoId)
    {
        // Query base para inscripciones del diplomado
        $query = Inscription::query();
        if ($diplomadoId) {
            $query->whereHas('status', function($q) use ($diplomadoId) {
                $q->where('id_graduate', $diplomadoId);
            });
        }
        
        $total = $query->count();
        
        // Estados
        $statusQuery = InscriptionStatus::query();
        if ($diplomadoId) {
            $statusQuery->where('id_graduate', $diplomadoId);
        }
        
        $aceptados = (clone $statusQuery)->where('status', 'aceptado')->count();
        $rechazados = (clone $statusQuery)->where('status', 'rechazado')->count();
        $pendientes = $total - $aceptados - $rechazados;
        
        // Datos para gráfica de torta (estados)
        $estadosData = [
            'labels' => ['Aceptados', 'Rechazados', 'Pendientes'],
            'data' => [$aceptados, $rechazados, $pendientes],
            'colors' => ['#10b981', '#ef4444', '#f59e0b']
        ];
        
        // ✅ GRÁFICA DE GÉNERO SOLO PARA ACEPTADOS
        $inscripcionesAceptadasIds = InscriptionStatus::where('status', 'aceptado')
            ->when($diplomadoId, function($q) use ($diplomadoId) {
                $q->where('id_graduate', $diplomadoId);
            })
            ->pluck('id_inscription');
        
        $generoData = [
            'labels' => ['Masculino', 'Femenino', 'No especificado'],
            'data' => [
                Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'M')->count(),
                Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'F')->count(),
                Inscription::whereIn('id', $inscripcionesAceptadasIds)->where('gender', 'ND')->count()
            ],
            'colors' => ['#3b82f6', '#ec4899', '#9ca3af']
        ];
        
        return [
            'estados' => $estadosData,
            'genero' => $generoData,
        ];
    }

    private function getEstadosMexico($diplomadoId)
    {
        // ✅ ESTADOS DE MÉXICO SOLO PARA ACEPTADOS
        $inscripcionesAceptadasIds = InscriptionStatus::where('status', 'aceptado')
            ->when($diplomadoId, function($q) use ($diplomadoId) {
                $q->where('id_graduate', $diplomadoId);
            })
            ->pluck('id_inscription');
        
        $query = Inscription::select('state_id', DB::raw('COUNT(*) as total'))
            ->with('state')
            ->whereIn('id', $inscripcionesAceptadasIds);
            
        $estados = $query->groupBy('state_id')
            ->orderBy('total', 'desc')
            ->get();
        
        $totalInscripciones = $estados->sum('total');
        
        return [
            'data' => $estados,
            'total' => $totalInscripciones,
            'top' => $estados->take(5)
        ];
    }

    private function getInstituciones($diplomadoId)
{
    // Obtener IDs de inscripciones aceptadas
    $inscripcionesAceptadasIds = InscriptionStatus::where('status', 'aceptado')
        ->when($diplomadoId, function($q) use ($diplomadoId) {
            $q->where('id_graduate', $diplomadoId);
        })
        ->pluck('id_inscription');
    
    // Consulta de instituciones (solo aceptados)
    $instituciones = Inscription::select('institution', DB::raw('COUNT(*) as total'))
        ->whereIn('id', $inscripcionesAceptadasIds)
        ->whereNotNull('institution')
        ->where('institution', '!=', '')
        ->groupBy('institution')
        ->orderBy('total', 'desc')
        ->get();
    
    $totalInstituciones = $instituciones->sum('total');
    
    return [
        'data' => $instituciones,
        'total' => $totalInstituciones,
        'top' => $instituciones->take(10),
        'count' => $instituciones->count()
    ];
}
}