@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="space-y-6">
    {{-- Header con selector de diplomado --}}
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-chart-simple text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                    <div class="flex items-center gap-2 mt-0.5">
                        <p class="text-gray-500 text-sm">Estadísticas y métricas</p>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <div class="flex items-center gap-1 text-xs text-gray-400">
                            <i class="far fa-calendar-alt"></i>
                            <span>{{ now()->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                {{-- Selector de diplomado --}}
                @if($diplomados->count() > 0)
                <div class="relative">
                    <select id="diplomado-selector" class="appearance-none bg-white border border-gray-200 rounded-xl px-4 py-2.5 pr-10 text-sm text-gray-700 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm">
                        @foreach($diplomados as $diplomado)
                            <option value="{{ $diplomado->id }}" {{ $diplomadoActual && $diplomadoActual->id == $diplomado->id ? 'selected' : '' }}>
                                {{ $diplomado->name }}
                            </option>
                        @endforeach
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                </div>
                @endif
                {{-- Botón de refrescar --}}
                <button onclick="window.location.reload()" class="w-10 h-10 bg-white border border-gray-200 rounded-xl flex items-center justify-center hover:bg-gray-50 transition shadow-sm">
                    <i class="fas fa-rotate-right text-gray-500 text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Tarjetas de estadísticas principales --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Total Participantes --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-white to-blue-50/30 rounded-2xl shadow-sm border border-blue-100 p-5 hover:shadow-lg hover:border-blue-200 transition-all duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 bg-blue-500/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium uppercase tracking-wide">Total Solicitudes</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ number_format($stats['total']) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
            </div>
            <div class="relative mt-4 pt-3 border-t border-blue-100">
                <div class="flex items-center gap-2 text-xs text-blue-500">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Inscripciones totales</span>
                </div>
            </div>
        </div>
    
        {{-- Aceptados --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-white to-green-50/30 rounded-2xl shadow-sm border border-green-100 p-5 hover:shadow-lg hover:border-green-200 transition-all duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 bg-green-500/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium uppercase tracking-wide">Aceptados</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ number_format($stats['aceptados']) }}</p>
                </div>
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-check-circle text-white text-lg"></i>
                </div>
            </div>
            <div class="relative mt-4 pt-3 border-t border-green-100">
                <div class="flex items-center justify-between text-xs">
                    <span class="text-green-600">{{ $stats['porcentaje_aceptacion'] }}% del total</span>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-arrow-up text-green-500"></i>
                        <span class="text-green-600">+{{ $stats['aceptados'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Rechazados --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-white to-red-50/30 rounded-2xl shadow-sm border border-red-100 p-5 hover:shadow-lg hover:border-red-200 transition-all duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 bg-red-500/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-red-600 text-sm font-medium uppercase tracking-wide">Rechazados</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ number_format($stats['rechazados']) }}</p>
                </div>
                <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-times-circle text-white text-lg"></i>
                </div>
            </div>
            <div class="relative mt-4 pt-3 border-t border-red-100">
                <div class="flex items-center justify-between text-xs">
                    <span class="text-red-600">{{ $stats['porcentaje_rechazo'] }}% del total</span>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-arrow-down text-red-500"></i>
                        <span class="text-red-600">{{ $stats['rechazados'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Pendientes --}}
        <div class="group relative overflow-hidden bg-gradient-to-br from-white to-yellow-50/30 rounded-2xl shadow-sm border border-yellow-100 p-5 hover:shadow-lg hover:border-yellow-200 transition-all duration-300">
            <div class="absolute top-0 right-0 w-20 h-20 bg-yellow-500/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-yellow-600 text-sm font-medium uppercase tracking-wide">Pendientes</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2">{{ number_format($stats['pendientes']) }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-clock text-white text-lg"></i>
                </div>
            </div>
            <div class="relative mt-4 pt-3 border-t border-yellow-100">
                <div class="flex items-center justify-between text-xs">
                    <span class="text-yellow-600">{{ $stats['porcentaje_pendiente'] }}% del total</span>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-hourglass-half text-yellow-500"></i>
                        <span class="text-yellow-600">Por evaluar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Gráficas --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Gráfica de estados --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="px-5 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-sm">
                            <i class="fas fa-chart-pie text-white text-sm"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Estado de solicitudes</h3>
                    </div>
                    <div class="flex gap-3 text-xs">
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span class="text-gray-500">Aceptados: {{ number_format($stats['aceptados']) }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            <span class="text-gray-500">Rechazados: {{ number_format($stats['rechazados']) }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                            <span class="text-gray-500">Pendientes: {{ number_format($stats['pendientes']) }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-4 text-xs text-gray-500">
                    <div class="flex items-center gap-2">
                        <span class="font-medium">Total:</span>
                        <span class="font-bold text-gray-700">{{ number_format($stats['total']) }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-medium">Tasa de aceptación:</span>
                        <span class="font-bold text-green-600">{{ $stats['porcentaje_aceptacion'] }}%</span>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="h-64">
                    <canvas id="estadosChart"></canvas>
                </div>
            </div>
        </div>
        
        {{-- Gráfica de género --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="px-5 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center shadow-sm">
                            <i class="fas fa-venus-mars text-white text-sm"></i>
                        </div>
                        <h3 class="font-semibold text-gray-800">Distribución por género</h3>
                    </div>
                    <div class="flex gap-3 text-xs">
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span class="text-gray-500">H: {{ number_format($stats['hombres']) }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                            <span class="text-gray-500">M: {{ number_format($stats['mujeres']) }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                            <span class="text-gray-500">NE: {{ number_format($stats['no_especificado']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="h-64">
                    <canvas id="generoChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Estadísticas adicionales --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Distribución por sector --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="px-5 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-pie text-indigo-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Distribución por sector</h3>
                </div>
            </div>
            <div class="p-5 space-y-5">
                {{-- Barra pública --}}
                <div class="group cursor-pointer">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-university text-indigo-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Sector Público</p>
                                <p class="text-xs text-gray-400">Instituciones gubernamentales</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-indigo-600">{{ number_format($stats['sector_publico']) }}</p>
                            <p class="text-xs text-gray-400">{{ $stats['total'] > 0 ? round(($stats['sector_publico'] / $stats['total']) * 100, 1) : 0 }}%</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-400 to-indigo-600 h-3 rounded-full transition-all duration-700 transform origin-left group-hover:scale-x-100" 
                            style="width: {{ $stats['total'] > 0 ? ($stats['sector_publico'] / $stats['total']) * 100 : 0 }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                </div>
                {{-- Barra privada --}}
                <div class="group cursor-pointer">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-building text-gray-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Sector Privado</p>
                                <p class="text-xs text-gray-400">Empresas y organizaciones</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-600">{{ number_format($stats['sector_privado']) }}</p>
                            <p class="text-xs text-gray-400">{{ $stats['total'] > 0 ? round(($stats['sector_privado'] / $stats['total']) * 100, 1) : 0 }}%</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-400 to-gray-600 h-3 rounded-full transition-all duration-700 transform origin-left" 
                            style="width: {{ $stats['total'] > 0 ? ($stats['sector_privado'] / $stats['total']) * 100 : 0 }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                </div>
                {{-- Diferencia --}}
                <div class="pt-3 mt-2 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-chart-line text-gray-400 text-xs"></i>
                            <span class="text-xs text-gray-500">Diferencia</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-medium text-gray-600">
                                {{ $stats['sector_publico'] > $stats['sector_privado'] ? 'Público lidera' : ($stats['sector_privado'] > $stats['sector_publico'] ? 'Privado lidera' : 'Empate') }}
                            </span>
                            <span class="text-xs font-bold text-indigo-600">
                                 ± {{ number_format(abs($stats['sector_publico'] - $stats['sector_privado'])) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Distribución por función laboral --}}
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-white">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-bar text-purple-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Distribución por función laboral</h3>
                </div>
            </div>
            <div class="p-5 space-y-5">
                {{-- Empleado --}}
                <div class="group cursor-pointer">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-user-tie text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Empleado</p>
                                <p class="text-xs text-gray-400">Trabajador en relación de dependencia</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-blue-600">{{ number_format($stats['funcion_empleado']) }}</p>
                            <p class="text-xs text-gray-400">{{ $stats['total'] > 0 ? round(($stats['funcion_empleado'] / $stats['total']) * 100, 1) : 0 }}%</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-3 rounded-full transition-all duration-700" 
                            style="width: {{ $stats['total'] > 0 ? ($stats['funcion_empleado'] / $stats['total']) * 100 : 0 }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                </div>     
                {{-- Empleador --}}
                <div class="group cursor-pointer">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-line text-green-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Empleador</p>
                                <p class="text-xs text-gray-400">Dueño o socio de negocio</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-green-600">{{ number_format($stats['funcion_empleador']) }}</p>
                            <p class="text-xs text-gray-400">{{ $stats['total'] > 0 ? round(($stats['funcion_empleador'] / $stats['total']) * 100, 1) : 0 }}%</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-700" 
                            style="width: {{ $stats['total'] > 0 ? ($stats['funcion_empleador'] / $stats['total']) * 100 : 0 }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                </div>
                {{-- Docente --}}
                <div class="group cursor-pointer">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chalkboard-user text-purple-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Docente</p>
                                <p class="text-xs text-gray-400">Personal académico y educativo</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-purple-600">{{ number_format($stats['funcion_docente']) }}</p>
                            <p class="text-xs text-gray-400">{{ $stats['total'] > 0 ? round(($stats['funcion_docente'] / $stats['total']) * 100, 1) : 0 }}%</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-3 rounded-full transition-all duration-700" 
                            style="width: {{ $stats['total'] > 0 ? ($stats['funcion_docente'] / $stats['total']) * 100 : 0 }}%; transition: width 1s ease-in-out;">
                        </div>
                    </div>
                </div>
                {{-- Función predominante --}}
                @php
                    $funciones = [
                        'empleado' => ['nombre' => 'Empleado', 'valor' => $stats['funcion_empleado'], 'color' => 'blue'],
                        'empleador' => ['nombre' => 'Empleador', 'valor' => $stats['funcion_empleador'], 'color' => 'green'],
                        'docente' => ['nombre' => 'Docente', 'valor' => $stats['funcion_docente'], 'color' => 'purple']
                    ];
                    $predominante = collect($funciones)->sortByDesc('valor')->first();
                @endphp
                <div class="pt-3 mt-2 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-trophy text-yellow-500 text-xs"></i>
                            <span class="text-xs text-gray-500">Función predominante</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-medium text-gray-600">{{ $predominante['nombre'] }}</span>
                            <span class="text-xs font-bold text-{{ $predominante['color'] }}-600">
                                {{ number_format($predominante['valor']) }} ({{ $stats['total'] > 0 ? round(($predominante['valor'] / $stats['total']) * 100, 1) : 0 }}%)
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección de Estados de la República --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-blue-500 rounded-xl blur-md opacity-30"></div>
                        <div class="relative w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-map-marked-alt text-white text-sm"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Participantes por Estado</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Distribución geográfica de los inscritos aceptados</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 bg-white rounded-lg px-3 py-1.5 shadow-sm">
                        <i class="fas fa-flag-checkered text-blue-500 text-xs"></i>
                        <span class="text-xs text-gray-500">Cobertura:</span>
                        <span class="text-xs font-bold text-blue-600">{{ number_format(($estadosMexico['data']->count() / 32) * 100, 1) }}%</span>
                    </div>
                    <div class="bg-blue-500 rounded-lg px-3 py-1.5 shadow-sm">
                        <span class="text-xs text-white/80">Total</span>
                        <span class="text-lg font-bold text-white ml-1">{{ number_format($estadosMexico['total']) }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="mb-5">
                <div class="relative">
                    <input type="text" 
                        id="searchEstado" 
                        placeholder="Buscar estado por nombre..." 
                        class="w-full pl-10 pr-12 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50/50">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <div class="absolute right-3.5 top-1/2 -translate-y-1/2">
                        <span id="estadosCount" class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ $estadosMexico['data']->count() }} estados</span>
                    </div>
                </div>
            </div>
            
            <div class="space-y-3 max-h-80 overflow-y-auto pr-2 custom-scroll" id="estadosList">
                @forelse($estadosMexico['data'] as $estado)
                <div class="estado-item group hover:bg-gradient-to-r hover:from-blue-50 hover:to-transparent p-3 rounded-xl transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-center mb-1.5">
                        <div class="flex items-center gap-3">
                            <div class="w-7 text-center">
                                @if($loop->iteration == 1)
                                    <span class="text-lg">🥇</span>
                                @elseif($loop->iteration == 2)
                                    <span class="text-lg">🥈</span>
                                @elseif($loop->iteration == 3)
                                    <span class="text-lg">🥉</span>
                                @else
                                    <span class="text-xs font-bold text-gray-400">{{ $loop->iteration }}</span>
                                @endif
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition">
                                    {{ $estado->state->name ?? 'N/A' }}
                                </span>
                                <span class="ml-2 text-xs text-gray-400">
                                    {{ $estadosMexico['total'] > 0 ? round(($estado->total / $estadosMexico['total']) * 100, 1) : 0 }}%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-base font-bold text-gray-800">{{ number_format($estado->total) }}</span>
                            <div class="hidden sm:block w-16 bg-gray-100 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" 
                                    style="width: {{ $estadosMexico['total'] > 0 ? min(($estado->total / $estadosMexico['total']) * 100, 100) : 0 }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full transition-all duration-500 group-hover:from-blue-500 group-hover:to-blue-700" 
                            style="width: {{ $estadosMexico['total'] > 0 ? ($estado->total / $estadosMexico['total']) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 text-gray-400">
                    <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-chart-bar text-2xl text-gray-300"></i>
                    </div>
                    <p class="text-sm font-medium">No hay datos de estados disponibles</p>
                    <p class="text-xs mt-1">Los participantes aceptados aparecerán aquí</p>
                </div>
                @endforelse
            </div>
            
            @if($estadosMexico['top']->isNotEmpty())
            <div class="mt-6 pt-5 border-t border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-trophy text-yellow-600 text-xs"></i>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Top 5 estados con más participantes</p>
                    </div>
                    <div class="text-xs text-gray-400">
                        {{ $estadosMexico['top']->sum('total') }} participantes
                        <span class="ml-1">({{ $estadosMexico['total'] > 0 ? round(($estadosMexico['top']->sum('total') / $estadosMexico['total']) * 100, 1) : 0 }}%)</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                    @foreach($estadosMexico['top'] as $index => $estado)
                    <div class="group text-center p-3 bg-gradient-to-b from-gray-50 to-white rounded-xl border border-gray-100 hover:shadow-md hover:border-blue-200 transition-all duration-200">
                        <div class="relative mb-2">
                            <div class="w-12 h-12 mx-auto rounded-full flex items-center justify-center 
                                @if($index == 0) bg-gradient-to-br from-yellow-400 to-yellow-500 shadow-md
                                @elseif($index == 1) bg-gradient-to-br from-gray-300 to-gray-400 shadow-md
                                @elseif($index == 2) bg-gradient-to-br from-orange-400 to-orange-500 shadow-md
                                @else bg-blue-100 @endif">
                                @if($index == 0)
                                    <i class="fas fa-crown text-white text-sm"></i>
                                @elseif($index == 1)
                                    <i class="fas fa-medal text-white text-sm"></i>
                                @elseif($index == 2)
                                    <i class="fas fa-medal text-white text-sm"></i>
                                @else
                                    <span class="text-sm font-bold text-blue-600">{{ $index + 1 }}</span>
                                @endif
                            </div>
                            <div class="absolute -top-1 -right-1 w-5 h-5 bg-white rounded-full shadow-sm flex items-center justify-center">
                                <span class="text-[9px] font-bold text-gray-500">{{ $estadosMexico['total'] > 0 ? round(($estado->total / $estadosMexico['total']) * 100, 1) : 0 }}%</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-gray-800 truncate group-hover:text-blue-600 transition" 
                        title="{{ $estado->state->name ?? 'N/A' }}">
                            {{ Str::limit($estado->state->name ?? 'N/A', 12) }}
                        </p>
                        <p class="text-lg font-bold text-gray-700 mt-1">{{ number_format($estado->total) }}</p>
                        <div class="w-full bg-gray-100 rounded-full h-1 mt-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-1 rounded-full" 
                                style="width: {{ $estadosMexico['total'] > 0 ? min(($estado->total / $estadosMexico['total']) * 100, 100) : 0 }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($estadosMexico['data']->isNotEmpty())
            <div class="mt-5 pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-4 text-xs">
                    <div class="flex items-center gap-1">
                        <i class="fas fa-chart-line text-green-500 text-xs"></i>
                        <span class="text-gray-500">Mayor:</span>
                        <span class="font-semibold text-gray-700">{{ $estadosMexico['data']->first()->state->name ?? 'N/A' }}</span>
                        <span class="text-blue-600">({{ number_format($estadosMexico['data']->first()->total ?? 0) }})</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-chart-line text-red-500 text-xs"></i>
                        <span class="text-gray-500">Menor:</span>
                        <span class="font-semibold text-gray-700">{{ $estadosMexico['data']->last()->state->name ?? 'N/A' }}</span>
                        <span class="text-blue-600">({{ number_format($estadosMexico['data']->last()->total ?? 0) }})</span>
                    </div>
                </div>
                <div class="text-xs text-gray-400">
                    <i class="far fa-clock mr-1"></i>
                    Actualizado: {{ now()->format('d/m/Y H:i') }}
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Sección de Instituciones --}}
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-purple-500 rounded-xl blur-md opacity-30"></div>
                        <div class="relative w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-building text-white text-sm"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Instituciones participantes</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Distribución por institución de procedencia</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 bg-white rounded-lg px-3 py-1.5 shadow-sm">
                        <i class="fas fa-building text-purple-500 text-xs"></i>
                        <span class="text-xs text-gray-500">Instituciones:</span>
                        <span class="text-xs font-bold text-purple-600">{{ number_format($instituciones['count']) }}</span>
                    </div>
                    <div class="bg-purple-500 rounded-lg px-3 py-1.5 shadow-sm">
                        <span class="text-xs text-white/80">Total</span>
                        <span class="text-lg font-bold text-white ml-1">{{ number_format($instituciones['total']) }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="mb-5">
                <div class="relative">
                    <input type="text" 
                           id="searchInstitucion" 
                           placeholder="Buscar institución por nombre..." 
                           class="w-full pl-10 pr-12 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-gray-50/50">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <div class="absolute right-3.5 top-1/2 -translate-y-1/2">
                        <span id="institucionesCount" class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ $instituciones['data']->count() }} instituciones</span>
                    </div>
                </div>
            </div>
            
            <div class="space-y-3 max-h-80 overflow-y-auto pr-2 custom-scroll" id="institucionesList">
                @forelse($instituciones['data'] as $institucion)
                <div class="institucion-item group hover:bg-gradient-to-r hover:from-purple-50 hover:to-transparent p-3 rounded-xl transition-all duration-200 cursor-pointer">
                    <div class="flex justify-between items-center mb-1.5">
                        <div class="flex items-center gap-3">
                            <div class="w-7 text-center">
                                @if($loop->iteration == 1)
                                    <span class="text-lg">🏆</span>
                                @elseif($loop->iteration == 2)
                                    <span class="text-lg">🥈</span>
                                @elseif($loop->iteration == 3)
                                    <span class="text-lg">🥉</span>
                                @else
                                    <span class="text-xs font-bold text-gray-400">{{ $loop->iteration }}</span>
                                @endif
                            </div>
                            <div class="flex-1">
                                <span class="text-sm font-semibold text-gray-700 group-hover:text-purple-600 transition" 
                                      title="{{ $institucion->institution }}">
                                    {{ Str::limit($institucion->institution, 40) }}
                                </span>
                                <span class="ml-2 text-xs text-gray-400">
                                    {{ $instituciones['total'] > 0 ? round(($institucion->total / $instituciones['total']) * 100, 1) : 0 }}%
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-base font-bold text-gray-800">{{ number_format($institucion->total) }}</span>
                            <div class="hidden sm:block w-16 bg-gray-100 rounded-full h-1.5">
                                <div class="bg-purple-500 h-1.5 rounded-full" 
                                     style="width: {{ $instituciones['total'] > 0 ? min(($institucion->total / $instituciones['total']) * 100, 100) : 0 }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full transition-all duration-500 group-hover:from-purple-500 group-hover:to-purple-700" 
                             style="width: {{ $instituciones['total'] > 0 ? ($institucion->total / $instituciones['total']) * 100 : 0 }}%">
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12 text-gray-400">
                    <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-building text-2xl text-gray-300"></i>
                    </div>
                    <p class="text-sm font-medium">No hay datos de instituciones disponibles</p>
                    <p class="text-xs mt-1">Las instituciones aparecerán cuando haya participantes aceptados</p>
                </div>
                @endforelse
            </div>
            
            @if($instituciones['top']->isNotEmpty())
            <div class="mt-6 pt-5 border-t border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-trophy text-yellow-600 text-xs"></i>
                        </div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Top 10 instituciones con más participantes</p>
                    </div>
                    <div class="text-xs text-gray-400">
                        {{ $instituciones['top']->sum('total') }} participantes
                        <span class="ml-1">({{ $instituciones['total'] > 0 ? round(($instituciones['top']->sum('total') / $instituciones['total']) * 100, 1) : 0 }}%)</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                    @foreach($instituciones['top'] as $index => $institucion)
                    <div class="group text-center p-3 bg-gradient-to-b from-gray-50 to-white rounded-xl border border-gray-100 hover:shadow-md hover:border-purple-200 transition-all duration-200">
                        <div class="relative mb-2">
                            <div class="w-12 h-12 mx-auto rounded-full flex items-center justify-center 
                                @if($index == 0) bg-gradient-to-br from-yellow-400 to-yellow-500 shadow-md
                                @elseif($index == 1) bg-gradient-to-br from-gray-300 to-gray-400 shadow-md
                                @elseif($index == 2) bg-gradient-to-br from-orange-400 to-orange-500 shadow-md
                                @else bg-purple-100 @endif">
                                @if($index == 0)
                                    <i class="fas fa-crown text-white text-sm"></i>
                                @elseif($index == 1)
                                    <i class="fas fa-medal text-white text-sm"></i>
                                @elseif($index == 2)
                                    <i class="fas fa-medal text-white text-sm"></i>
                                @else
                                    <span class="text-sm font-bold text-purple-600">{{ $index + 1 }}</span>
                                @endif
                            </div>
                            <div class="absolute -top-1 -right-1 w-5 h-5 bg-white rounded-full shadow-sm flex items-center justify-center">
                                <span class="text-[9px] font-bold text-gray-500">{{ $instituciones['total'] > 0 ? round(($institucion->total / $instituciones['total']) * 100, 1) : 0 }}%</span>
                            </div>
                        </div>
                        <p class="text-xs font-semibold text-gray-800 truncate group-hover:text-purple-600 transition" 
                           title="{{ $institucion->institution }}">
                            {{ Str::limit($institucion->institution, 18) }}
                        </p>
                        <p class="text-lg font-bold text-gray-700 mt-1">{{ number_format($institucion->total) }}</p>
                        <div class="w-full bg-gray-100 rounded-full h-1 mt-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-1 rounded-full" 
                                 style="width: {{ $instituciones['total'] > 0 ? min(($institucion->total / $instituciones['total']) * 100, 100) : 0 }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($instituciones['data']->isNotEmpty())
            <div class="mt-5 pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-4 text-xs">
                    <div class="flex items-center gap-1">
                        <i class="fas fa-chart-line text-green-500 text-xs"></i>
                        <span class="text-gray-500">Mayor:</span>
                        <span class="font-semibold text-gray-700 truncate max-w-[120px]" title="{{ $instituciones['data']->first()->institution ?? 'N/A' }}">
                            {{ Str::limit($instituciones['data']->first()->institution ?? 'N/A', 20) }}
                        </span>
                        <span class="text-purple-600">({{ number_format($instituciones['data']->first()->total ?? 0) }})</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <i class="fas fa-chart-line text-red-500 text-xs"></i>
                        <span class="text-gray-500">Menor:</span>
                        <span class="font-semibold text-gray-700 truncate max-w-[120px]" title="{{ $instituciones['data']->last()->institution ?? 'N/A' }}">
                            {{ Str::limit($instituciones['data']->last()->institution ?? 'N/A', 20) }}
                        </span>
                        <span class="text-purple-600">({{ number_format($instituciones['data']->last()->total ?? 0) }})</span>
                    </div>
                </div>
                <div class="text-xs text-gray-400">
                    <i class="far fa-clock mr-1"></i>
                    Actualizado: {{ now()->format('d/m/Y H:i') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.custom-scroll::-webkit-scrollbar {
    width: 4px;
}
.custom-scroll::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}
.custom-scroll::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}
.custom-scroll::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>

<script>
// Buscador de instituciones
const searchInstitucion = document.getElementById('searchInstitucion');
const institucionItems = document.querySelectorAll('.institucion-item');
const institucionesCount = document.getElementById('institucionesCount');

if (searchInstitucion) {
    function updateInstitucionesCount() {
        let visibleCount = 0;
        institucionItems.forEach(item => {
            if (item.style.display !== 'none') {
                visibleCount++;
            }
        });
        institucionesCount.textContent = `${visibleCount} instituciones`;
    }
    
    searchInstitucion.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        institucionItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (searchTerm === '' || text.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
        
        updateInstitucionesCount();
    });
    
    searchInstitucion.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.value = '';
            institucionItems.forEach(item => {
                item.style.display = '';
            });
            updateInstitucionesCount();
        }
    });
}

// Buscador de estados
const searchEstado = document.getElementById('searchEstado');
const estadoItems = document.querySelectorAll('.estado-item');
const estadosCount = document.getElementById('estadosCount');

if (searchEstado) {
    function updateEstadosCount() {
        let visibleCount = 0;
        estadoItems.forEach(item => {
            if (item.style.display !== 'none') {
                visibleCount++;
            }
        });
        estadosCount.textContent = `${visibleCount} estados`;
    }
    
    searchEstado.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        estadoItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (searchTerm === '' || text.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
        
        updateEstadosCount();
    });
}

// Animación de las barras al cargar
document.addEventListener('DOMContentLoaded', function() {
    const bars = document.querySelectorAll('.bg-gradient-to-r');
    bars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 100);
    });
});

// Gráfica de estados
const estadosCtx = document.getElementById('estadosChart')?.getContext('2d');
if (estadosCtx) {
    new Chart(estadosCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($chartData['estados']['labels']) !!},
            datasets: [{
                data: {!! json_encode($chartData['estados']['data']) !!},
                backgroundColor: {!! json_encode($chartData['estados']['colors']) !!},
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Gráfica de género
const generoCtx = document.getElementById('generoChart')?.getContext('2d');
if (generoCtx) {
    new Chart(generoCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($chartData['genero']['labels']) !!},
            datasets: [{
                data: {!! json_encode($chartData['genero']['data']) !!},
                backgroundColor: {!! json_encode($chartData['genero']['colors']) !!},
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Selector de diplomado
const selector = document.getElementById('diplomado-selector');
if (selector) {
    selector.addEventListener('change', function() {
        window.location.href = `{{ route('admin.dashboard') }}?diplomado_id=${this.value}`;
    });
}
</script>
@endpush