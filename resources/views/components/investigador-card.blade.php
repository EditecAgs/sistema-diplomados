@props([
    'nombre',
    'rol'         => 'Investigador',
    'institucion',
    'foto'        => null,
    'iniciales'   => null,
])

<div class="bg-white border border-[#611232]/10 rounded-2xl px-6 pt-8 pb-6 flex flex-col items-center text-center hover:-translate-y-1 hover:shadow-lg hover:shadow-[#611232]/10 transition-all duration-200">

    {{-- Avatar --}}
    <div class="w-32 h-32 rounded-full border-[3px] border-[#611232] overflow-hidden bg-[#1a0510] flex items-center justify-center mb-4 flex-shrink-0">
        @if ($foto)
            <img src="{{ asset('images/' . $foto) }}"
                 alt="{{ $nombre }}"
                 class="w-full h-full object-cover">
        @else
            <span class="text-[28px] font-semibold text-[#f0a0b8]">
                {{ $iniciales }}
            </span>
        @endif
    </div>

    {{-- Badge rol --}}
    <span class="text-[10px] font-semibold tracking-[1.5px] uppercase text-[#611232] bg-[#611232]/7 border border-[#611232]/15 rounded-full px-3 py-1 mb-3">
        {{ $rol }}
    </span>

    {{-- Nombre --}}
    <p class="text-[15px] font-semibold text-[#1a0510] leading-snug mb-2">
        {{ $nombre }}
    </p>

    <div class="w-8 h-0.5 bg-[#611232] rounded opacity-30 mb-2"></div>

    {{-- Institución --}}
    <p class="text-[12.5px] text-[#8b4060] leading-snug">
        {{ $institucion }}
    </p>
</div>