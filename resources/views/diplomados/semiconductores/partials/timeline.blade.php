<section class="w-full bg-[#1a0510] py-20 px-6" id="dates">
  <div class="max-w-3xl mx-auto">

    <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-rose-300/50 mb-2 text-center">
      Calendario
    </p>
    <h2 class="text-3xl font-semibold text-white mb-14 text-center">
      Fechas importantes
    </h2>

    <div class="relative pl-8">

      {{-- Línea vertical --}}
      <div class="absolute left-[7px] top-1.5 bottom-1.5 w-0.5 bg-[#611232]/40"></div>

      @foreach ($fechas as $fecha)
      <div class="relative mb-8 last:mb-0">

        {{-- Punto --}}
        <div class="absolute -left-8 top-1 w-4 h-4 flex items-center justify-center">
          @if ($fecha['definida'])
            <span class="absolute w-4 h-4 rounded-full border border-rose-300/30 animate-ping"></span>
            <span class="relative w-4 h-4 rounded-full bg-[#611232] border-2 border-[#f0a0b8] flex items-center justify-center z-10">
              <span class="w-1.5 h-1.5 rounded-full bg-[#f0a0b8]"></span>
            </span>
          @else
            <span class="w-4 h-4 rounded-full bg-[#3d1030] border-2 border-[#611232]/50 z-10"></span>
          @endif
        </div>

        {{-- Tarjeta --}}
        <div class="rounded-xl px-5 py-4 border transition-colors
                    {{ $fecha['highlight']
                        ? 'bg-[#611232]/15 border-rose-300/20'
                        : 'bg-white/5 border-[#611232]/30' }}">

          {{-- Badge módulo --}}
          @if ($fecha['modulo'])
            <span class="inline-block text-[10px] font-semibold tracking-[1px] uppercase text-rose-300 bg-[#611232]/25 border border-rose-300/15 rounded px-2 py-0.5 mb-2">
              Módulo {{ $fecha['modulo'] }}
            </span>
          @endif

          {{-- Encabezado --}}
          <div class="flex items-start justify-between gap-3 flex-wrap">
            <p class="text-[13px] font-semibold text-white leading-snug">
              {{ $fecha['etiqueta'] }}
            </p>
            <span class="text-[11px] text-rose-300 bg-[#611232]/30 border border-rose-300/20 rounded-full px-3 py-0.5 whitespace-nowrap flex-shrink-0">
              {{ $fecha['mes'] }}
            </span>
          </div>

          {{-- Descripción --}}
          @if ($fecha['desc'])
            <p class="text-[12.5px] text-gray-300 mt-2 leading-relaxed">
              {{ $fecha['desc'] }}
            </p>
          @endif

          {{-- Sesiones --}}
          @if (count($fecha['sesiones']))
            <div class="mt-3 pt-3 border-t border-[#611232]/20 flex flex-col gap-1.5">
              @foreach ($fecha['sesiones'] as $sesion)
                <div class="flex items-start gap-2 text-[11.5px] text-gray-300">
                  <div class="w-1 h-1 rounded-full bg-[#611232] mt-1.5 shrink-0"></div>
                  {{ $sesion }}
                </div>
              @endforeach
            </div>
          @endif

          {{-- Opciones de semana presencial --}}
          @if (count($fecha['opciones']))
            <div class="flex gap-2 flex-wrap mt-3">
              @foreach ($fecha['opciones'] as $opcion)
                <span class="text-[11px] bg-[#B9925B]/10 border border-[#B9925B]/25 text-[#d4a96a] rounded-md px-3 py-1">
                  {{ $opcion }}
                </span>
              @endforeach
            </div>
          @endif

        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>