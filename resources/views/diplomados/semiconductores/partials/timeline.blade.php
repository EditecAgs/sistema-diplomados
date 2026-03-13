<section class="w-full bg-[#1a0510] py-20 px-6">
  <div class="max-w-5xl mx-auto">

    <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-rose-300/60 mb-2 text-center">
      Calendario
    </p>
    <h2 class="text-3xl font-semibold text-white mb-14 text-center">
      Fechas importantes
    </h2>

    {{-- Timeline desktop --}}
    <div class="relative hidden md:flex justify-between items-start px-16">

      {{-- Línea de fondo --}}
      <div class="absolute top-5.25 left-21.25 right-21.25 h-0.5 bg-[#611232]/30"></div>

      @foreach ($fechas as $i => $fecha)
      <div class="flex flex-col items-center gap-3 w-32 z-10">

        {{-- Punto --}}
        <div class="relative w-10.5 h-10.5 flex items-center justify-content">
          @if ($fecha['definida'])
            <span class="absolute w-10.5 h-10.5 rounded-full border-2 border-[#f0a0b8]/40 animate-ping"></span>
            <span class="relative w-4.5 h-4.5 rounded-full bg-[#611232] border-2 border-[#f0a0b8] flex items-center justify-center mx-auto">
              <span class="w-1.5 h-1.5 rounded-full bg-[#f0a0b8]"></span>
            </span>
          @else
            <span class="relative w-4.5 h-4.5 rounded-full bg-[#3d1030] border-2 border-[#611232]/50 flex items-center justify-center mx-auto">
              <span class="w-1.5 h-1.5 rounded-full bg-[#f0a0b8]/20"></span>
            </span>
          @endif
        </div>

        {{-- Etiqueta --}}
        <p class="text-[12px] font-semibold tracking-wide uppercase text-center leading-tight
                   {{ $fecha['definida'] ? 'text-rose-300' : 'text-rose-300' }}">
          {{ $fecha['etiqueta'] }}
        </p>

        {{-- Fecha o guión --}}
        <p class="text-[18px] font-semibold text-center
                   {{ $fecha['definida'] ? 'text-white' : 'text-gray-200' }}">
          {{ $fecha['fecha'] ?? '—' }}
        </p>

        {{-- Badge --}}
        <span class="text-[10px] rounded-full px-3 py-0.5 whitespace-nowrap
                     {{ $fecha['definida']
                        ? 'bg-[#611232]/40 border border-[#611232]/60 text-rose-300'
                        : 'bg-[#611232]/20 border border-[#611232]/30 text-rose-300/40' }}">
          {{ $fecha['definida'] ? $fecha['mes'] : 'Por definir' }}
        </span>

      </div>
      @endforeach

    </div>

    {{-- Timeline móvil --}}
    <div class="flex flex-col md:hidden divide-y divide-[#611232]/15">
      @foreach ($fechas as $fecha)
      <div class="flex items-center gap-4 py-4">
        <div class="w-[18px] h-[18px] rounded-full flex-shrink-0
                    {{ $fecha['definida'] ? 'bg-[#611232] border-2 border-[#f0a0b8]' : 'bg-[#3d1030] border-2 border-[#611232]/50' }}">
        </div>
        <div>
          <p class="text-[11px] font-semibold tracking-wide uppercase
                     {{ $fecha['definida'] ? 'text-rose-300' : 'text-white/35' }}">
            {{ $fecha['etiqueta'] }}
          </p>
          <p class="text-[15px] font-semibold {{ $fecha['definida'] ? 'text-white' : 'text-white/20' }}">
            {{ $fecha['definida'] ? $fecha['mes'] . ' ' . $fecha['fecha'] : 'Por definir' }}
          </p>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Aviso --}}
    @if (collect($fechas)->where('definida', false)->count() > 0)
    <p class="text-center mt-12">
      <span class="inline-block text-[11px] font-semibold tracking-[1.5px] uppercase
                   text-rose-300/60 bg-[#611232]/30 border border-[#611232]/40 rounded-full px-4 py-1.5">
        Fechas próximamente
      </span>
    </p>
    @endif

  </div>
</section>