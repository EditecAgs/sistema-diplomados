@extends('admin.layouts.admin')

@section('title', 'Diseño en ASCIs')

@section('content')
<div class="space-y-6">
    <!--Title-->
    <div class="bg-linear-to-r from-gray-50 to-white rounded-xl p-6 mb-6 border border-gray-100">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <div class="bg-blue-500 rounded-lg p-2">
                        <i class="fas fa-microchip text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Diplomado en Diseño de Circuitos Integrados</h1>
                        <p class="text-sm text-gray-500">Aplicación Específica (ASICs)</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-4 ml-14">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <i class="fas fa-user-graduate text-green-500"></i>
                        <span>Usuarios Inscritos</span>
                        <span class="font-semibold text-gray-800 ml-1">{{ $requests ?? 0 }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fas fa-clock"></i>
                        <span>Última actualización: {{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="bg-blue-50 rounded-full p-3">
                    <i class="fas fa-chalkboard-user text-3xl text-blue-500"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Tarjetas de información -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!--Solicitudes-->
        <div class="backdrop-blur-sm bg-white/90 rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                        </span>
                        <p class="text-gray-600 text-sm font-semibold">SOLICITUDES PENDIENTES</p>
                    </div>
                    <p class="text-5xl font-bold bg-linear-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">{{ $requests }}</p>
                    <p class="text-sm text-gray-500 mt-2">Inscripciones totales</p>
                </div>
                <div class="bg-linear-to-br from-blue-400 to-blue-600 rounded-2xl p-4 shadow-lg">
                    <i class="fas fa-users text-2xl text-white"></i>
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-gray-100">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Pendientes por evaluar</span>
                    <span class="font-semibold text-blue-600">{{ $requests - $aceptados - $rechazados }}</span>
                </div>
            </div>
        </div>
        <!--Aceptados-->
        <div class="backdrop-blur-sm bg-white/90 rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </span>
                        <p class="text-gray-600 text-sm font-semibold">SOLICITUDES ACEPTADAS</p>
                    </div>
                    <p class="text-5xl font-bold bg-linear-to-r from-green-600 to-green-800 bg-clip-text text-transparent">{{ $aceptados }}</p>
                    <p class="text-sm text-gray-500 mt-2">Inscripciones aprobadas</p>
                </div>
                <div class="bg-linear-to-br from-green-400 to-green-600 rounded-2xl p-4 shadow-lg">
                    <i class="fas fa-check-circle text-2xl text-white"></i>
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-gray-100">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Tasa de aceptación</span>
                    <span class="font-semibold text-green-600">{{ $requests > 0 ? round(($aceptados / $requests) * 100, 1) : 0 }}%</span>
                </div>
            </div>
        </div>
        <!--Rechazados-->
        <div class="backdrop-blur-sm bg-white/90 rounded-2xl shadow-xl p-6 border border-white/20 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                        </span>
                        <p class="text-gray-600 text-sm font-semibold">SOLICITUDES RECHAZADAS</p>
                    </div>
                    <p class="text-5xl font-bold bg-linear-to-r from-red-600 to-red-800 bg-clip-text text-transparent">{{ $rechazados }}</p>
                    <p class="text-sm text-gray-500 mt-2">Inscripciones rechazadas</p>
                </div>
                <div class="bg-linear-to-br from-red-400 to-red-600 rounded-2xl p-4 shadow-lg">
                    <i class="fas fa-times-circle text-2xl text-white"></i>
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-gray-100">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Tasa de rechazo</span>
                    <span class="font-semibold text-red-600">{{ $requests > 0 ? round(($rechazados / $requests) * 100, 1) : 0 }}%</span>
                </div>
            </div>
        </div>
    </div>
    
<!-- Tabla -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        {{-- Header de la tabla --}}
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-clipboard-list text-blue-500 text-sm"></i>
                    Solicitudes pendientes
                </h3>
                <p class="text-[12px] text-gray-400 mt-0.5">
                    {{ $inscriptions->total() }} solicitud(es) por evaluar
                </p>
            </div>
        
            {{-- Filtros rápidos --}}
            <div class="flex items-center gap-2">
                <div class="relative">
                    <input type="text" 
                        id="tableSearch" 
                        placeholder="Buscar..." 
                        class="pl-8 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    </div>
                    <button class="px-3 py-1.5 text-sm bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg transition flex items-center gap-1">
                        <i class="fas fa-filter text-xs"></i>
                        <span>Filtrar</span>
                    </button>
                </div>
            </div>
    
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-300 border-b border-gray-100">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-500">#</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-500">RFC</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-500">Nombre</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-500">Apellidos</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-500">Email</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-500">Documentos</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                    @forelse ($inscriptions as $inscription)
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-3 text-center">
                            <span class="text-[12px] font-medium text-gray-400">{{ $inscription->id }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-[13px] font-mono font-medium text-gray-700">{{ $inscription->rfc }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-[13px] text-gray-700">{{ $inscription->first_name }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-[13px] text-gray-700">{{ $inscription->last_name }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-[13px] text-gray-500">{{ $inscription->email }}</span>
                        </td>
                        {{-- Documentos compactos --}}
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center">
                                @if($inscription->cv_path)
                                    <a href="{{ route('asics.cv', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Currículum vitae">
                                        <i class="fas fa-file-pdf text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin CV">
                                        <i class="fas fa-file-pdf text-sm"></i>
                                    </span>
                                @endif
                                @if($inscription->commitment_letter_path)
                                    <a href="{{ route('asics.letter', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Carta compromiso">
                                        <i class="fas fa-file-contract text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta compromiso">
                                        <i class="fas fa-file-contract text-sm"></i>
                                    </span>
                                @endif
                                @if($inscription->support_letter_path)
                                    <a href="{{ route('asics.support', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Carta de apoyo">
                                        <i class="fas fa-file text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta de apoyo">
                                        <i class="fas fa-file text-sm"></i>
                                    </span>
                                @endif
                            </div>
                        </td>
                        {{-- Acciones --}}
                        <td class="px-4 py-3">
                            <div class="flex gap-1.5 justify-center">
                                <button type="button"
                                    onclick="openModal({{ $inscription->id }})"
                                    class="w-8 h-8 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition-all hover:scale-105"
                                    title="Ver detalles">
                                    <i class="fas fa-eye text-sm"></i>
                                </button>
                                <button type="button"
                                    onclick="openModalAceptar({{ $inscription->id }}, '{{ $inscription->first_name }} {{ $inscription->last_name }}')"
                                    class="w-8 h-8 bg-green-50 hover:bg-green-100 border border-green-200 text-green-600 rounded-lg flex items-center justify-center transition-all hover:scale-105"
                                    title="Aceptar">
                                    <i class="fas fa-check text-sm"></i>
                                </button>
                                <button type="button"
                                    onclick="openModalRechazar({{ $inscription->id }}, '{{ $inscription->first_name }} {{ $inscription->last_name }}')"
                                    class="w-8 h-8 bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 rounded-lg flex items-center justify-center transition-all hover:scale-105"
                                    title="Rechazar">
                                    <i class="fas fa-xmark text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @include('admin.pages.diplomados.asics.modals.modal-details', ['inscription' => $inscription])
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-16 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-inbox text-2xl text-gray-300"></i>
                                </div>
                                <p class="text-[14px] font-medium text-gray-400">No hay solicitudes por evaluar</p>
                                <p class="text-[12px] text-gray-300">Las nuevas solicitudes aparecerán aquí</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    
        {{-- Información de paginación --}}
        @if ($inscriptions->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="text-[12px] text-gray-400">
                Mostrando {{ $inscriptions->firstItem() }} a {{ $inscriptions->lastItem() }} de {{ $inscriptions->total() }} resultados
            </div>
            <div>
                {{ $inscriptions->links() }}
            </div>
        </div>
        @else
        <div class="px-6 py-3 border-t border-gray-100 text-center text-[12px] text-gray-400">
            Mostrando {{ $inscriptions->total() }} registro(s)
        </div>
        @endif
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <!--Tabla Aceptados -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            {{-- Header de la tabla --}}
            <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-person-circle-check text-green-600"></i>
                    </div>
                    <div>
                        <h3 class="text-[13px] font-semibold text-gray-800">Solicitudes aceptadas</h3>
                        <p class="text-[11px] text-gray-400 mt-0.5">{{ $aceptados }} registro(s) aprobados</p>
                    </div>
                </div>
        
                {{-- Filtros rápidos --}}
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <input type="text" 
                            id="searchAceptados" 
                            placeholder="Buscar..." 
                            class="pl-8 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    </div>
                    <a href="{{ route('admin.asics.exportar.aceptados') }}" class="px-3 py-1.5 text-sm bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-lg transition flex items-center gap-1">
                        <i class="fas fa-download text-xs"></i>
                    </a>
                </div>
            </div>
    
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-green-600 border-b border-gray-100">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">#</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">RFC</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Nombre</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Apellidos</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Email</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">Fecha</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">Documentos</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                    @forelse ($aceptadas as $inscription)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-4 py-3 text-center">
                                <span class="text-[12px] font-medium text-gray-400">{{ $inscription->id }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] font-mono font-medium text-gray-700">{{ $inscription->rfc }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-700">{{ $inscription->first_name }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-700">{{ $inscription->last_name }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-500">{{ $inscription->email }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-calendar-check text-green-500 text-xs"></i>
                                    <span class="text-[13px] text-gray-600">{{ $inscription->status->created_at->format('d/m/Y') }}</span>
                                </div>
                            </td>
                            {{-- Documentos compactos --}}
                            <td class="px-4 py-3">
                                <div class="flex gap-1.5 justify-center">
                                    @if($inscription->cv_path)
                                        <a href="{{ route('asics.cv', $inscription->id) }}" 
                                            class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                            title="Currículum vitae">
                                            <i class="fas fa-file-pdf text-sm"></i>
                                        </a>
                                    @else
                                        <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin CV">
                                            <i class="fas fa-file-pdf text-sm"></i>
                                        </span>
                                    @endif
                                    @if($inscription->commitment_letter_path)
                                        <a href="{{ route('asics.letter', $inscription->id) }}" 
                                            class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                            title="Carta compromiso">
                                            <i class="fas fa-file-contract text-sm"></i>
                                        </a>
                                    @else
                                        <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta compromiso">
                                            <i class="fas fa-file-contract text-sm"></i>
                                        </span>
                                    @endif
                                    @if($inscription->support_letter_path)
                                        <a href="{{ route('asics.support', $inscription->id) }}" 
                                            class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                            title="Carta de apoyo">
                                            <i class="fas fa-file text-sm"></i>
                                        </a>
                                    @else
                                        <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta de apoyo">
                                            <i class="fas fa-file text-sm"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                            {{-- Acciones --}}
                            <td class="px-4 py-3">
                                <div class="flex gap-1.5 justify-center">
                                    <button type="button"
                                        onclick="openModalStatus({{ $inscription->id }})"
                                        class="w-8 h-8 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition-all hover:scale-105"
                                        title="Ver detalles">
                                        <i class="fas fa-eye text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('admin.pages.diplomados.asics.modals.detail-inscription', ['inscription' => $inscription])
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-inbox text-2xl text-gray-300"></i>
                                    </div>
                                    <p class="text-[14px] font-medium text-gray-400">No hay solicitudes aceptadas</p>
                                    <p class="text-[12px] text-gray-300">Las solicitudes aceptadas aparecerán aquí</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    
            {{-- Información de paginación --}}
            @if ($aceptadas->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-[12px] text-gray-400">
                    Mostrando {{ $aceptadas->firstItem() }} a {{ $aceptadas->lastItem() }} de {{ $aceptadas->total() }} resultados
                </div>
                <div>
                    {{ $aceptadas->links() }}
                </div>
            </div>
            @elseif($aceptadas->total() > 0)
            <div class="px-6 py-3 border-t border-gray-100 text-center text-[12px] text-gray-400">
                Mostrando {{ $aceptadas->total() }} registro(s)
            </div>
            @endif
        </div>
        <!--Tabla Rechazados -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            {{-- Header de la tabla --}}
            <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-person-circle-xmark text-red-600"></i>
                    </div>
                    <div>
                        <h3 class="text-[12px] font-semibold text-gray-800">Solicitudes rechazadas</h3>
                        <p class="text-[11px] text-gray-400 mt-0.5">{{ $rechazados }} registro(s) rechazados</p>
                    </div>
                </div>
        
                {{-- Filtros rápidos --}}
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <input type="text" 
                            id="searchRechazados" 
                            placeholder="Buscar..." 
                            class="pl-8 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    </div>
                </div>
            </div>
    
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-red-600 border-b border-gray-100">
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">#</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">RFC</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Nombre</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Apellidos</th>
                            <th class="px-4 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-gray-200">Email</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">Fecha</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-200">Documentos</th>
                            <th class="px-4 py-3 text-center text-[11px] font-semibold uppercase tracking-wider text-gray-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                    @forelse ($rechazadas as $inscription)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-4 py-3 text-center">
                                <span class="text-[12px] font-medium text-gray-400">{{ $inscription->id }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] font-mono font-medium text-gray-700">{{ $inscription->rfc }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-700">{{ $inscription->first_name }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-700">{{ $inscription->last_name }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-[13px] text-gray-500">{{ $inscription->email }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="fas fa-calendar-xmark text-red-500 text-xs"></i>
                                    <span class="text-[13px] text-gray-600">{{ $inscription->status->created_at->format('d/m/Y') }}</span>
                                </div>
                            </td>
                            {{-- Documentos compactos --}}
                            <td class="px-4 py-3">
                                <div class="flex gap-1.5 justify-center">
                                @if($inscription->cv_path)
                                    <a href="{{ route('asics.cv', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Currículum vitae">
                                        <i class="fas fa-file-pdf text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin CV">
                                        <i class="fas fa-file-pdf text-sm"></i>
                                    </span>
                                @endif
                                @if($inscription->commitment_letter_path)
                                    <a href="{{ route('asics.letter', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Carta compromiso">
                                        <i class="fas fa-file-contract text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta compromiso">
                                        <i class="fas fa-file-contract text-sm"></i>
                                    </span>
                                @endif
                                @if($inscription->support_letter_path)
                                    <a href="{{ route('asics.support', $inscription->id) }}" 
                                        class="w-7 h-7 bg-blue-50 hover:bg-blue-100 border border-blue-200 text-blue-600 rounded-md flex items-center justify-center transition-all hover:scale-105"
                                        title="Carta de apoyo">
                                            <i class="fas fa-file text-sm"></i>
                                    </a>
                                @else
                                    <span class="w-7 h-7 bg-gray-50 border border-gray-200 text-gray-300 rounded-md flex items-center justify-center cursor-not-allowed" title="Sin carta de apoyo">
                                        <i class="fas fa-file text-sm"></i>
                                    </span>
                                @endif
                                </div>
                            </td>
                            {{-- Acciones --}}
                            <td class="px-4 py-3">
                                <div class="flex gap-1.5 justify-center">
                                    <button type="button"
                                        onclick="openModalRechazado({{ $inscription->id }})"
                                        class="w-8 h-8 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-lg flex items-center justify-center transition-all hover:scale-105"
                                        title="Ver detalles">
                                        <i class="fas fa-eye text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('admin.pages.diplomados.asics.modals.reject-inscription', ['inscription' => $inscription])
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-16 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-inbox text-2xl text-gray-300"></i>
                                    </div>
                                    <p class="text-[14px] font-medium text-gray-400">No hay solicitudes rechazadas</p>
                                    <p class="text-[12px] text-gray-300">Las solicitudes rechazadas aparecerán aquí</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    
            {{-- Información de paginación --}}
            @if ($rechazadas->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-[12px] text-gray-400">
                    Mostrando {{ $rechazadas->firstItem() }} a {{ $rechazadas->lastItem() }} de {{ $rechazadas->total() }} resultados
                </div>
                <div>
                    {{ $rechazadas->links() }}
                </div>
            </div>
            @elseif($rechazadas->total() > 0)
            <div class="px-6 py-3 border-t border-gray-100 text-center text-[12px] text-gray-400">
                Mostrando {{ $rechazadas->total() }} registro(s)
            </div>
            @endif
        </div>
    </div>
    
</div>
    @include('admin.pages.diplomados.asics.modals.aceptar')
    @include('admin.pages.diplomados.asics.modals.rechazar')
@endsection
@push('scripts')
<script>
    // ── SweetAlert ──
    @if (session('success'))
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon:              'success',
            title:             '¡Acción realizada!',
            text:              '{{ session('success') }}',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#16a34a',
        });
    });
    @endif

    @if (session('error'))
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon:              'error',
            title:             'Error',
            text:              '{{ session('error') }}',
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#611232',
        });
    });
    @endif

    // ── Modal Detalles ──
    function openModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            console.log(`Modal modal-${id} no encontrado`);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // ── Modal Aceptar ──
    function openModalAceptar(id, nombre) {
        const modal = document.getElementById('modal-aceptar');
        if (modal) {
            document.getElementById('modal-aceptar-nombre').textContent = nombre;
            document.getElementById('form-aceptar').action = `/admin/asics/${id}/aceptar`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            const textarea = document.querySelector('#form-aceptar textarea');
            if (textarea) textarea.value = '';
        }
    }

    function closeModalAceptar() {
        const modal = document.getElementById('modal-aceptar');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // ── Modal Rechazar ──
    function openModalRechazar(id, nombre) {
        const modal = document.getElementById('modal-rechazar');
        if (modal) {
            document.getElementById('modal-rechazar-nombre').textContent = nombre;
            document.getElementById('form-rechazar').action = `/admin/asics/${id}/rechazar`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            const textarea = document.querySelector('#form-rechazar textarea');
            if (textarea) textarea.value = '';
        }
    }

    function closeModalRechazar() {
        const modal = document.getElementById('modal-rechazar');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openModalStatus(id) {
        const modal = document.getElementById(`modal-status-${id}`);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModalStatus(id) {
        const modal = document.getElementById(`modal-status-${id}`);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    function openModalRechazado(id) {
        const modal = document.getElementById(`modal-rechazado-${id}`);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModalRechazado(id) {
        const modal = document.getElementById(`modal-rechazado-${id}`);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Cerrar modales con clic fuera
    document.addEventListener('click', function(e) {
        // Cerrar modal de detalles
        if (e.target && e.target.id && e.target.id.startsWith('modal-') && !e.target.id.includes('aceptar') && !e.target.id.includes('rechazar')) {
            const id = e.target.id.replace('modal-', '');
            closeModal(id);
        }
        // Cerrar modal aceptar
        if (e.target === document.getElementById('modal-aceptar')) {
            closeModalAceptar();
        }
        // Cerrar modal rechazar
        if (e.target === document.getElementById('modal-rechazar')) {
            closeModalRechazar();
        }
    });

    // Cerrar modales con tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            // Cerrar modal de detalles
            const openModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
            openModals.forEach(modal => {
                const id = modal.id;
                if (id !== 'modal-aceptar' && id !== 'modal-rechazar') {
                    const numId = id.replace('modal-', '');
                    closeModal(numId);
                }
            });
            // Cerrar modales de aceptar/rechazar
            closeModalAceptar();
            closeModalRechazar();
        }
    });
</script>
@endpush