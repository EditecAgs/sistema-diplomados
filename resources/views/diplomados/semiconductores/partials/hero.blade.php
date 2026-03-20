<section class="relative w-full min-h-screen bg-[#1a0510] flex flex-col items-center justify-center overflow-hidden px-6 pt-24 pb-16">
    <canvas id="circuit-bg" class="absolute inset-0 w-full h-full"></canvas>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-125 h-75 pointer-events-none" style="background: radial-gradient(ellipse, rgba(97,18,50,0.55) 0%, transparent 70%);"></div>
    <div class="relative z-10 text-center max-w-3xl">
        <span class="inline-block text-[11px] font-medium tracking-[2px] uppercase text-rose-300 border border-rose-300/25 rounded-full px-4 py-1 mb-6 bg-rose-300/5">
            TecNM · 2026
        </span>
        <h1 class="text-3xl md:text-5xl font-semibold text-white leading-tight tracking-tight mb-4">
            Diplomado en Diseño de<br>
            <span class="text-rose-300">Circuitos Integrados de Aplicación Específica (ASICs)</span>
        </h1>
        <p class="text-gray-200 text-base mb-10 leading-relaxed">
            Del concepto al tapeout.<br class="hidden md:block"> El futuro de la tecnología se diseña en silicio
        </p>

        <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ asset('documents/DiplomadoASICS_Convocatoria.pdf') }}" download class="inline-flex items-center gap-2 bg-[#611232] hover:bg-[#7a1740] text-white font-semibold text-sm px-6 py-3 rounded-lg border border-rose-300/20 transition-all duration-200 hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Descargar convocatoria
            </a>
            <a href="{{ route('semiconductores.register') }}" class="btn-gold-outline inline-flex items-center gap-2 font-medium text-sm px-6 py-3 rounded-lg hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" y1="8" x2="19" y2="14"/>
                    <line x1="22" y1="11" x2="16" y2="11"/>
                </svg>
                Inscribirme
            </a>
        </div>
    </div>
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2">
        <span class="text-[12px] tracking-[2px] uppercase text-gray-200 text-center">Scroll para más información</span>
        <svg class="w-6 h-6 text-rose-200 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9"/>
        </svg>
    </div>
</section>