@extends('layouts.app')

@section('content')

    {{-- Hero --}}
    <section class="relative bg-[#1a0510] pt-28 pb-16 px-6 text-center overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-75 pointer-events-none"
             style="background: radial-gradient(ellipse, rgba(97,18,50,0.4) 0%, transparent 70%);">
        </div>
        <div class="relative z-10 max-w-2xl mx-auto">
            <span class="inline-block text-[10px] font-semibold tracking-[2px] uppercase text-rose-300/70 border border-rose-300/20 bg-[#611232]/20 rounded-full px-4 py-1 mb-5">
                TecNM · 2026
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-4">
                Oferta de <span class="text-rose-300">Diplomados</span>
            </h1>
            <p class="text-[15px] text-white/40 leading-relaxed">
                Formación especializada impulsada por el Tecnológico Nacional de México
                a través del Instituto Tecnológico de Aguascalientes.
            </p>
        </div>
    </section>

    {{-- Grid de diplomados --}}
    <section class="bg-[#0f0208] py-12 px-6">
        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" id="diplomados-grid">

            @foreach ($diplomados as $d)
            <div class="diplomado-card bg-[#1a0510] border border-[#611232]/30 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl hover:shadow-[#611232]/20 hover:border-rose-300/20 transition-all duration-200"
                 data-status="{{ $d['status'] }}"
                 data-area="{{ Str::slug($d['area']) }}">

                {{-- Imagen --}}
                <div class="h-36 bg-[#0f0208] relative flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/diplomados/' . $d['imagen']) }}"
                             alt="{{ $d['titulo'] }}"
                             class="w-full h-full object-cover">

                    {{-- Badge área --}}
                    <span class="absolute top-3 left-3 text-[10px] font-semibold tracking-wide uppercase text-rose-300/70 bg-[#611232]/40 border border-rose-300/15 rounded-full px-2.5 py-0.5">
                        {{ $d['area'] }}
                    </span>

                    {{-- Badge status --}}
                    <span class="absolute top-3 right-3 text-[10px] font-semibold tracking-wide uppercase rounded-full px-2.5 py-0.5
                        @if($d['status'] === 'open')   bg-teal-500/15 border border-teal-500/30 text-teal-400
                        @elseif($d['status'] === 'soon') bg-amber-500/15 border border-amber-500/30 text-amber-400
                        @else                            bg-[#611232]/20 border border-[#611232]/30 text-rose-300/40
                        @endif">
                        @if($d['status'] === 'open')   Abierto
                        @elseif($d['status'] === 'soon') Próximamente
                        @else                            Cerrado
                        @endif
                    </span>
                </div>

                {{-- Contenido --}}
                <div class="p-5">
                    <p class="text-[10px] font-semibold tracking-wide uppercase text-rose-300 mb-1">
                        {{ $d['institucion'] }}
                    </p>
                    <h3 class="text-[15px] font-semibold text-white leading-snug mb-2">
                        {{ $d['titulo'] }}
                    </h3>
                    <p class="text-[12.5px] text-gray-300 leading-relaxed mb-4">
                        {{ $d['descripcion'] }}
                    </p>

                    {{-- Meta --}}
                    <div class="flex gap-3 flex-wrap mb-4">
                        <span class="flex items-center gap-1 text-[11px] text-gray-300">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            {{ $d['horas'] }} hrs
                        </span>
                        <span class="flex items-center gap-1 text-[11px] text-gray-300">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/></svg>
                            {{ $d['modalidad'] }}
                        </span>
                        <span class="flex items-center gap-1 text-[11px] text-gray-300">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/></svg>
                            {{ $d['modulos'] }} módulos
                        </span>
                    </div>

                    <div class="h-px bg-[#611232]/20 mb-4"></div>

                    <div class="flex items-center justify-between">
                        <a href="{{ $d['url'] }}"
                           class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-rose-300 hover:text-rose-600 transition-colors duration-200 group">
                            Ver más
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>

                        @if ($d['status'] === 'open')
                            <!--<a href=""
                               class="text-[11px] font-semibold px-4 py-1.5 rounded-lg text-white transition-all duration-200 hover:brightness-110"
                               style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); border: 1px solid rgba(255,255,255,0.1);">
                                Registrarme
                            </a>-->
                        @else
                            <span class="text-[11px] font-semibold px-4 py-1.5 rounded-lg text-white/20 bg-[#611232]/10 border border-[#611232]/20 cursor-not-allowed">
                                No disponible
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-[#611232]', 'border-[#611232]', 'text-white');
            b.classList.add('text-white/40');
        });
        btn.classList.add('bg-[#611232]', 'border-[#611232]', 'text-white');
        btn.classList.remove('text-white/40');

        const filter = btn.dataset.filter;
        document.querySelectorAll('.diplomado-card').forEach(card => {
            if (filter === 'todos') {
                card.style.display = '';
            } else if (filter === 'open' || filter === 'soon' || filter === 'closed') {
                card.style.display = card.dataset.status === filter ? '' : 'none';
            } else {
                card.style.display = card.dataset.area === filter ? '' : 'none';
            }
        });
    });
});
</script>
@endpush