@extends('layouts.app')
@section('content')
    <x-header 
        :inicio="route('semiconductores.index')"
        :convocatoria="asset('documents/DiplomadoASICS_Convocatoria.pdf')"
        :plataforma="route('login')"
        :registro="route('semiconductores.register')"
    />
    <main>
        @include('diplomados.semiconductores.partials.hero')
        @include('diplomados.semiconductores.partials.information')
        @include('diplomados.semiconductores.partials.stats')
        @include('diplomados.semiconductores.partials.perfil-ingreso')
        @include('diplomados.semiconductores.partials.modules', ['modulos' => $modulos])
        @include('diplomados.semiconductores.partials.investigadores', ['investigadores' => $investigadores])
        @include('diplomados.semiconductores.partials.timeline', ['fechas' => $fechas])
        @include('diplomados.semiconductores.partials.cta')
    </main>
    <x-footer
        programa=""
        institucion="Tecnológico Nacional de México"
        :email="$emailContacto"
        sitio="https://aguascalientes.tecnm.mx"
        ciudad="Aguascalientes, México"
        anio="2026"
        :logos="$footerLogos"
        :nav-links="$footerLinks"
    />
   
    @include('diplomados.semiconductores.partials.modal-module')

    @if (session('registro_cerrado'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'info',
                    title: 'Registro Cerrado',
                    text: '{{ session('registro_cerrado') }}',
                    confirmButtonText: 'Entendido',
                    confirmButtonColor: '#611232',
                    backdrop: true
                });
            });
        </script>
    @endif

@endsection
