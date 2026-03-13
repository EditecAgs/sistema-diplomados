<section class="relative w-full bg-[#611232] py-20 px-6 overflow-hidden">

  {{-- Grid decorativo de fondo --}}
  <div class="absolute inset-0 pointer-events-none"
       style="background-image: linear-gradient(rgba(240,160,184,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(240,160,184,0.04) 1px, transparent 1px); background-size: 40px 40px;">
  </div>

  {{-- Glow central --}}
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[300px] pointer-events-none"
       style="background: radial-gradient(ellipse, rgba(26,5,16,0.5) 0%, transparent 70%);">
  </div>

  <div class="relative z-10 max-w-2xl mx-auto text-center">

    <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight tracking-tight mb-4">
      ¿Quieres especializarte<br>
      en <span class="text-rose-300">semiconductores</span>?
    </h2>

    <div class="flex flex-wrap gap-3 justify-center">
      <a href=""
         class="inline-flex items-center gap-2 bg-white hover:bg-rose-100 text-[#611232] font-bold text-sm px-7 py-3.5 rounded-lg transition-all duration-200 hover:-translate-y-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
          <polyline points="7 10 12 15 17 10"/>
          <line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
        Descargar convocatoria
      </a>

      <a href="mailto:{{ $emailContacto ?? 'contacto@ita.edu.mx' }}"
         class="inline-flex items-center gap-2 text-white border border-white/25 hover:border-white/50 hover:bg-white/7 font-medium text-sm px-7 py-3.5 rounded-lg transition-all duration-200 hover:-translate-y-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
        Solicitar información
      </a>
    </div>

    {{-- Logos institucionales --}}
    <div class="flex items-center justify-center gap-5 mt-12 pt-8 border-t border-white/10">
      <img src="{{ asset('images/gob-blanco.png') }}" alt="Gobierno de México" class="h-8">
      <div class="w-px h-4 bg-white/15"></div>
      <img src="{{ asset('images/sep-blanco.png') }}" alt="SEP" class="h-8">
      <div class="w-px h-4 bg-white/15"></div>
      <img src="{{ asset('images/logo_tecnm_white.png') }}" alt="TECNM" class="h-8">
      <div class="w-px h-4 bg-white/15"></div>
      <img src="{{ asset('images/ita.png') }}" alt="ITA" class="h-8">
    </div>

  </div>
</section>