<footer class="w-full bg-[#0f0208]">

  <div class="max-w-7xl mx-auto px-6 pt-14 pb-10 grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr] gap-10 md:gap-12">

    <div>
      @if (count($logos))
      <div class="flex items-center gap-3 flex-wrap mb-5">
        @foreach ($logos as $i => $logo)
          <img src="{{ asset($logo['src']) }}"
               alt="{{ $logo['alt'] }}"
               class="h-8 w-auto">
          @if (!$loop->last)
            <div class="w-px h-4 bg-white"></div>
          @endif
        @endforeach
      </div>
      @endif

      <p class="text-sm font-semibold text-gray-200 mb-2">{{ $programa }}</p>
      <p class="text-[13px] text-gray-200 leading-relaxed max-w-xs">
        Programa de formación especializada del {{ $institucion }},
        impulsado desde el Instituto Tecnológico de Aguascalientes.
      </p>
    </div>

    <div>
      <p class="text-[10px] font-semibold tracking-[2px] uppercase text-rose-300 mb-4">
        Navegación
      </p>
      <ul class="flex flex-col gap-2.5">
        @foreach ($navLinks as $link)
        <li>
          <a href="{{ $link['href'] }}"
             class="text-[13px] text-gray-200 hover:text-rose-300 transition-colors duration-200">
            {{ $link['label'] }}
          </a>
        </li>
        @endforeach
      </ul>
    </div>

    <div>
      <p class="text-[10px] font-semibold tracking-[2px] uppercase text-rose-300 mb-4">
        Contacto
      </p>
      <ul class="flex flex-col gap-3">

        <li>
          <a href="mailto:{{ $email }}"
             class="flex items-start gap-2.5 text-[13px] text-gray-200 hover:text-rose-300 transition-colors duration-200 break-all group">
            <svg class="w-4 h-4 mt-0.5 shrink-0 text-rose-300 group-hover:text-rose-300 transition-colors" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
            {{ $email }}
          </a>
        </li>

        <li>
          <a href="{{ $sitio }}" target="_blank"
             class="flex items-center gap-2.5 text-[13px] text-gray-200 hover:text-rose-300 transition-colors duration-200 group">
            <svg class="w-4 h-4 shrink-0 text-rose-300 group-hover:text-rose-300 transition-colors" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/>
              <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
            </svg>
            {{ str_replace(['https://', 'http://'], '', $sitio) }}
          </a>
        </li>

        <li>
          <span class="flex items-center gap-2.5 text-[13px] text-gray-200">
            <svg class="w-4 h-4 shrink-0 text-rose-300" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
            {{ $ciudad }}
          </span>
        </li>

      </ul>
    </div>

  </div>

  <div class="max-w-7xl mx-auto px-6">
    <div class="h-px bg-[#611232]"></div>
  </div>

  <div class="max-w-5xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
    <p class="text-[12px] text-gray-200">
      © {{ $anio }} <span class="text-rose-300">Micrositio desarrollado por Educación a Distancia (ITA)</span> — Todos los derechos reservados
    </p>
  </div>

</footer>