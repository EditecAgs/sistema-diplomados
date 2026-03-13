@props(['id', 'num', 'nombre', 'short', 'temas' => [], 'imagen' => null])

<div class="bg-white border border-[#611232]/12 rounded-xl overflow-hidden cursor-pointer hover:-translate-y-1 hover:shadow-lg hover:shadow-[#611232]/10 transition-all duration-200 modulo-card"
     data-id="{{ $id }}"
     data-num="{{ $num }}"
     data-nombre="{{ $nombre }}"
     data-short="{{ $short }}"
     data-temas="{{ json_encode($temas) }}"
     data-imagen="{{ $imagen ? asset('images/' . $imagen) : '' }}">

    <div class="h-32 bg-[#1a0510] flex items-center justify-center overflow-hidden">
        @if ($imagen)
            <img src="{{ asset('images/' . $imagen) }}"
                 class="w-full h-full object-cover"
                 alt="{{ $nombre }}">
        @else
            <svg viewBox="0 0 400 128" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <rect width="400" height="128" fill="#1a0510"/>
                <rect x="155" y="34" width="90" height="60" rx="4" fill="none" stroke="#611232" stroke-width="1.5" opacity="0.6"/>
                <rect x="165" y="44" width="70" height="40" rx="2" fill="#611232" opacity="0.08"/>
                <line x1="100" y1="49" x2="155" y2="49" stroke="#611232" stroke-width="1.2" opacity="0.5"/>
                <line x1="100" y1="64" x2="155" y2="64" stroke="#611232" stroke-width="1.2" opacity="0.8"/>
                <line x1="100" y1="79" x2="155" y2="79" stroke="#611232" stroke-width="1.2" opacity="0.5"/>
                <line x1="245" y1="49" x2="300" y2="49" stroke="#611232" stroke-width="1.2" opacity="0.5"/>
                <line x1="245" y1="64" x2="300" y2="64" stroke="#611232" stroke-width="1.2" opacity="0.8"/>
                <line x1="245" y1="79" x2="300" y2="79" stroke="#611232" stroke-width="1.2" opacity="0.5"/>
                <circle cx="100" cy="49" r="3" fill="#611232" opacity="0.5"/>
                <circle cx="100" cy="64" r="3" fill="#f0a0b8" opacity="0.8"/>
                <circle cx="100" cy="79" r="3" fill="#611232" opacity="0.5"/>
                <circle cx="300" cy="49" r="3" fill="#611232" opacity="0.5"/>
                <circle cx="300" cy="64" r="3" fill="#f0a0b8" opacity="0.8"/>
                <circle cx="300" cy="79" r="3" fill="#611232" opacity="0.5"/>
                <text x="200" y="68" text-anchor="middle" font-size="11" fill="#611232" opacity="0.4" font-family="monospace">M{{ $num }}</text>
            </svg>
        @endif
    </div>

    <div class="p-5">
        <p class="text-[10px] font-semibold tracking-[2px] uppercase text-[#611232] mb-1">
            Módulo {{ $num }}
        </p>
        <h3 class="text-[15px] font-semibold text-[#1a0510] mb-2 leading-snug">
            {{ $nombre }}
        </h3>
        <p class="text-[12px] text-[#8b4060] mb-4">
            {{ count($temas) }} temas
        </p>
        <span class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-[#611232] bg-[#611232]/6 border border-[#611232]/15 rounded-md px-3 py-1.5">
            Ver contenido
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </span>
    </div>
</div>