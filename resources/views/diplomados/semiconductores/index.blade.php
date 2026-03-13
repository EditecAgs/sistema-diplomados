@extends('layouts.app')
@section('content')
    <x-header 
        :inicio="route('index')"
        :convocatoria="route('index')"
        :plataforma="route('index')"
        :registro="route('index')"
    />
    <main>
        @include('diplomados.semiconductores.partials.hero')
        @include('diplomados.semiconductores.partials.information')
        @include('diplomados.semiconductores.partials.stats')
        @include('diplomados.semiconductores.partials.modules', ['modulos' => $modulos])
        @include('diplomados.semiconductores.partials.investigadores', ['investigadores' => $investigadores])
        @include('diplomados.semiconductores.partials.timeline', ['fechas' => $fechas])
        @include('diplomados.semiconductores.partials.cta')
    </main>
    <x-footer
        programa="Diplomado en Semiconductores"
        institucion="Tecnológico Nacional de México"
        :email="$emailContacto"
        sitio="https://aguascalientes.tecnm.mx"
        ciudad="Aguascalientes, México"
        anio="2026"
        :logos="$footerLogos"
        :nav-links="$footerLinks"
    />
   
    @include('diplomados.semiconductores.partials.modal-module')
@endsection