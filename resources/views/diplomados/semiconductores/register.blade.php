@extends('layouts.app')

@section('content')
     <x-header 
        :inicio="route('semiconductores.index')"
        :convocatoria="route('semiconductores.index')"
        :plataforma="route('login')"
        :registro="route('semiconductores.register')"
    />

    <section class="relative w-full min-h-screen bg-[#1a0510] overflow-hidden px-6 pt-28 pb-20">

        <canvas id="circuit-bg" class="absolute inset-0 w-full h-full"></canvas>

        <div class="relative z-10 max-w-3xl mx-auto">
            {{-- Encabezado --}}
            <div class="text-center mb-10 bg-white border border-[#611232]/30 rounded-2xl p-7">
                <span class="inline-block text-[12px] font-semibold tracking-[2px] uppercase text-rose-300 border border-rose-300 bg-[#611232] rounded-full px-3 py-1 mb-4">
                    Diplomado en ASICs · TecNM 2026
                </span>
                <h1 class="text-3xl font-semibold mb-2">Formulario de inscripción</h1>
                <p class="text-[14px] text-gray-600">Completa todos los campos para solicitar tu registro</p>
            </div>
            {{-- Alerta éxito --}}
            @if (session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-300 text-sm rounded-xl px-5 py-4 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{route('semiconductores.registro.store')}}" method="POST" enctype="multipart/form-data"
                  class="flex flex-col gap-5">
                @csrf
                {{-- ── DATOS PERSONALES ── --}}
                <div class="bg-white border border-[#611232]/30 rounded-2xl p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8.5 h-8.5 bg-[#611232] rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[18px] font-semibold text-gray-800">Datos personales</p>
                            <p class="text-[14px] uppercase tracking-wide text-red-600">Información de identificación</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">RFC <span class="text-red-600">*</span></label>
                                <input type="text" name="rfc" value="{{ old('rfc') }}" placeholder="LOSL800101ABC" maxlength="13"
                                       class="uppercase bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('rfc')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">CURP <span class="text-red-600">*</span></label>
                                <input type="text" name="curp" value="{{ old('curp') }}" placeholder="LOSL800101HMCPRS09" maxlength="18"
                                       class="uppercase bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('curp')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Nombre(s) <span class="text-red-600">*</span></label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Juan Carlos"
                                       class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('nombre')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Apellidos <span class="text-red-600">*</span></label>
                                <input type="text" name="apellidos" value="{{ old('apellidos') }}" placeholder="López Sánchez"
                                       class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('apellidos')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Género <span class="text-red-600">*</span></label>
                                <select name="genero" class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-rose-600 transition">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="M"  {{ old('genero') === 'M'  ? 'selected' : '' }}>Masculino</option>
                                    <option value="F"  {{ old('genero') === 'F'  ? 'selected' : '' }}>Femenino</option>
                                    <option value="ND" {{ old('genero') === 'ND' ? 'selected' : '' }}>Prefiero no decir</option>
                                </select>
                                @error('genero')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-1.5 sm:col-span-2">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Correo electrónico <span class="text-red-600">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com"
                                       class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('email')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">
                                    Estado <span class="text-red-600">*</span>
                                </label>
                                <select name="estado" id="select-estado" data-old="{{ old('estado') }}">
                                    <option value="" disabled selected>Escribe o selecciona un estado...</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ old('estado') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('estado')
                                    <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">
                                    Municipio <span class="text-red-600">*</span>
                                </label>
                                <select name="municipio" id="select-municipio" disabled
                                class="bg-gray-100 border border-[#611232]/20 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-400 focus:outline-none focus:border-rose-600 transition cursor-not-allowed" data-old="{{ old('municipio') }}">
                                    <option value="" disabled selected>Primero selecciona un estado...</option>
                                </select>
                                @error('municipio')
                                    <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Ciudad <span class="text-red-600">*</span></label>
                                <input type="text" name="ciudad" value="{{ old('ciudad') }}" placeholder="Aguascalientes"
                                       class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-600 transition">
                                @error('ciudad')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>

                    </div>
                </div>

                {{-- ── DATOS LABORALES ── --}}
                <div class="bg-white border border-[#611232]/30 rounded-2xl p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8.5 h-8.5 bg-[#611232] rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[18px] font-semibold text-gray-800">Datos laborales</p>
                            <p class="text-[14px] uppercase tracking-wide text-red-600">Información profesional</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Sector <span class="text-red-600">*</span></label>
                                <select name="sector" class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-rose-600 transition">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="publico"  {{ old('sector') === 'publico'  ? 'selected' : '' }}>Público</option>
                                    <option value="privado"  {{ old('sector') === 'privado'  ? 'selected' : '' }}>Privado</option>
                                </select>
                                @error('sector')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Función laboral <span class="text-red-600">*</span></label>
                                <select name="funcion_laboral" class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-rose-600 transition">
                                    <option value="" disabled selected>Seleccionar</option>
                                    <option value="empleado"  {{ old('funcion_laboral') === 'empleado'  ? 'selected' : '' }}>Empleado</option>
                                    <option value="empleador" {{ old('funcion_laboral') === 'empleador' ? 'selected' : '' }}>Empleador</option>
                                    <option value="docente"   {{ old('funcion_laboral') === 'docente'   ? 'selected' : '' }}>Docente</option>
                                </select>
                                @error('funcion_laboral')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">Empresa / Institución <span class="text-red-600">*</span></label>
                            <input type="text" name="institucion" value="{{ old('institucion') }}" placeholder="Instituto Tecnológico de Aguascalientes"
                                   class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-600 focus:outline-none focus:border-rose-300/40 transition">
                            @error('institucion')<p class="text-red-400 text-[11px] mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- ── DOCUMENTOS ── --}}
                <div class="bg-white border border-[#611232]/30 rounded-2xl p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-9 h-9 bg-[#611232] rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[18px] font-semibold text-gray-800">Documentos</p>
                            <p class="text-[14px] uppercase tracking-wide text-red-600">Archivos requeridos</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        {{-- CV --}}
                        <div class="flex flex-col gap-2">
                        <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">
                            Currículum vitae <span class="text-red-600">*</span>
                        </label>
                        <label for="cv"
                            class="border-[1.5px] border-dashed border-[#611232]/25 hover:border-[#611232]/60 hover:bg-[#611232]/4 bg-gray-50 rounded-xl p-5 flex flex-col items-center gap-2 cursor-pointer transition-all duration-200">
                            <div class="w-9 h-9 bg-[#611232]/10 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                            </div>
                            <span class="text-[13px] font-medium text-gray-800">Arrastra tu CV aquí o haz clic para seleccionar</span>
                            <span class="text-[11px] text-gray-800" id="cv-name">PDF · Máximo 5 MB</span>
                        </label>
                        <input type="file" id="cv" name="cv" accept=".pdf" class="hidden">
                        @error('cv')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>
                    {{-- Carta compromiso --}}
                    <div class="flex flex-col gap-2">
                        <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">
                            Carta compromiso <span class="text-red-600">*</span>
                        </label>
                        <a href="{{ asset('docs/carta-compromiso.pdf') }}" download
                        class="flex items-center gap-2.5 px-4 py-3 bg-[#B9925B]/95 border border-[#B9925B] rounded-xl text-[13px] text-white hover:text-[#9a7440] hover:bg-[#B9925B]/15 transition-all duration-200">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Descargar carta compromiso
                        </a>
                        <p class="text-[13px] text-gray-800">Descarga el documento, fírmalo y súbelo a continuación</p>
                        <label for="carta_compromiso"
                        class="border-[1.5px] border-dashed border-[#611232]/25 hover:border-[#611232]/60 hover:bg-[#611232]/4 bg-gray-50 rounded-xl p-5 flex flex-col items-center gap-2 cursor-pointer transition-all duration-200">
                            <div class="w-9 h-9 bg-[#611232]/10 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                            </div>
                            <span class="text-[13px] font-medium text-gray-800">Subir carta compromiso firmada</span>
                            <span class="text-[11px] text-gray-800" id="carta-name">PDF · Máximo 5 MB</span>
                        </label>
                        <input type="file" id="carta_compromiso" name="carta_compromiso" accept=".pdf" class="hidden">
                        @error('carta_compromiso')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Carta jefe --}}
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between mb-0.5">
                            <label class="text-[15px] font-semibold tracking-[1.5px] uppercase text-gray-800">
                                Carta de apoyo del jefe inmediato
                            </label>
                            <span class="text-[13px] font-semibold text-[#9a7440] bg-[#B9925B]/10 border border-[#B9925B]/25 rounded-full px-2.5 py-0.5">
                                Opcional
                            </span>
                        </div>
                        <label for="carta_jefe"
                        class="border-[1.5px] border-dashed border-[#611232]/20 hover:border-[#611232]/40 hover:bg-[#611232]/3 bg-gray-50 rounded-xl p-5 flex flex-col items-center gap-2 cursor-pointer transition-all duration-200">
                            <div class="w-9 h-9 bg-[#611232]/8 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                            </div>
                            <span class="text-[13px] font-medium text-gray-800">Subir carta de apoyo</span>
                            <span class="text-[11px] text-gray-800" id="jefe-name">Si aplica a tu perfil · PDF · Máximo 5 MB</span>
                        </label>
                        <input type="file" id="carta_jefe" name="carta_jefe" accept=".pdf" class="hidden">
                        @error('carta_jefe')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" id="btn-submit"
            class="w-full py-3.5 rounded-xl font-bold text-[14px] text-white transition-all duration-200 hover:brightness-110 hover:-translate-y-0.5"
            style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); border: 1px solid rgba(255,255,255,0.12);">
                <span id="btn-text">Enviar solicitud de inscripción</span>
                <span id="btn-loading" class="hidden items-center justify-center gap-2">
                    <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                    </svg>
                    Enviando...
                </span>
            </button>

            <p class="text-center text-[13px] text-gray-300 leading-relaxed">
                Los campos marcados con <span class="text-rose-300">*</span> son obligatorios.<br>
                Tu información será tratada de forma confidencial.
            </p>

            </form>
        </div>
    </section>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon:             'success',
                    title:            '¡Solicitud enviada!',
                    text:             '{{ session('success') }}',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#611232',
                });
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon:'error',
                    title:'Revisa el formulario',
                    html:`<ul class="text-left text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>`,
                    confirmButtonText: 'Corregir',
                    confirmButtonColor: '#611232',
                });
            });
        </script>
    @endif
    @if (session('cupo_lleno'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon:              'info',
                    title:             'Cupo completo',
                    text:              '{{ session('cupo_lleno') }}',
                    confirmButtonText: 'Entendido',
                    confirmButtonColor: '#611232',
                });
            });
        </script>
    @endif
@endsection