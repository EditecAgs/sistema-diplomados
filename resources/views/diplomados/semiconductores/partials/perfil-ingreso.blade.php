<section class="w-full bg-[#faf7f8] py-20 px-6" id="profile">
  <div class="max-w-5xl mx-auto">

    <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-[#611232] mb-2">Requisitos</p>
    <h2 class="text-3xl font-semibold text-[#1a0510] mb-6 pb-4 border-b-2 border-[#611232] inline-block">
      Perfil de ingreso
    </h2>

    <p class="text-[14px] text-[#5a2a3a] leading-relaxed mb-10 max-w-3xl border-l-[3px] border-[#611232] pl-4">
      Dirigido a profesionistas y docentes interesados en adquirir formación integral en diseño de
      circuitos integrados (ASICs), para contribuir al capital humano especializado en semiconductores
      y al fortalecimiento del ecosistema académico, tecnológico e industrial del país.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

      {{-- Formación académica --}}
      <div class="bg-white border border-[#611232]/10 rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-5">
          <div class="w-9 h-9 bg-[#611232]/8 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>
            </svg>
          </div>
          <div>
            <p class="text-[14px] font-semibold text-[#1a0510]">Formación académica</p>
            <p class="text-[11px] uppercase tracking-wide text-[#8b4060]">Recomendada</p>
          </div>
        </div>
        <div class="flex flex-wrap gap-2">
          @foreach ([
            'Ing. Electrónica', 'Ing. Semiconductores', 'Ing. Eléctrica',
            'Ing. Mecatrónica', 'Sistemas Electrónicos', 'Ing. Computación',
            'Hardware y posgrados afines',
          ] as $tag)
            <span class="text-[12px] bg-[#611232]/6 border border-[#611232]/12 text-[#611232] rounded-full px-3 py-1">
              {{ $tag }}
            </span>
          @endforeach
        </div>
      </div>

      {{-- ¿A quién va dirigido? --}}
      <div class="bg-white border border-[#611232]/10 rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-5">
          <div class="w-9 h-9 bg-[#611232]/8 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
              <line x1="23" y1="11" x2="17" y2="11"/>
            </svg>
          </div>
          <div>
            <p class="text-[14px] font-semibold text-[#1a0510]">¿A quién va dirigido?</p>
            <p class="text-[11px] uppercase tracking-wide text-[#8b4060]">Perfil esperado</p>
          </div>
        </div>
        <ul class="flex flex-col gap-2.5">
          @foreach ([
            'Docentes de electrónica analógica, digital y microelectrónica',
            'Profesores de diseño de CI y sistemas embebidos',
            'Profesionistas que buscan actualizar competencias en ASICs',
            'Participantes en proyectos de I+D o transferencia tecnológica',
          ] as $item)
            <li class="flex items-start gap-2.5 text-[13px] text-[#2d0820] leading-snug">
              <div class="w-1.5 h-1.5 rounded-full bg-[#611232] mt-1.5 flex-shrink-0"></div>
              {{ $item }}
            </li>
          @endforeach
        </ul>
      </div>

      {{-- Conocimientos previos --}}
      <div class="bg-white border border-[#611232]/10 rounded-2xl p-6 md:col-span-2">
        <div class="flex items-center gap-3 mb-5">
          <div class="w-9 h-9 bg-[#611232]/8 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
          </div>
          <div>
            <p class="text-[14px] font-semibold text-[#1a0510]">Conocimientos previos recomendables</p>
            <p class="text-[11px] uppercase tracking-wide text-[#8b4060]">Para mejor aprovechamiento</p>
          </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          @foreach ([
            ['area' => 'Electrónica', 'items' => [
              'Fundamentos de circuitos eléctricos',
              'Dispositivos semiconductores básicos',
              'Lectura de diagramas esquemáticos',
            ]],
            ['area' => 'Electrónica digital', 'items' => [
              'Álgebra booleana',
              'Compuertas lógicas y sistemas combinacionales',
              'Conceptos de sistemas secuenciales',
            ]],
            ['area' => 'Matemáticas e ingeniería', 'items' => [
              'Análisis básico de señales',
              'Interpretación de gráficas y simulaciones',
              'Modelos y abstracciones técnicas',
            ]],
            ['area' => 'Computación', 'items' => [
              'Uso básico de Linux',
              'Manejo de archivos y software técnico',
              'Programación o scripts (deseable)',
            ]],
          ] as $grupo)
          <div class="bg-[#611232]/4 rounded-lg p-4">
            <p class="text-[10px] font-semibold tracking-[1px] uppercase text-[#611232] mb-3">
              {{ $grupo['area'] }}
            </p>
            <ul class="flex flex-col gap-2">
              @foreach ($grupo['items'] as $item)
                <li class="flex items-start gap-1.5 text-[11.5px] text-[#5a2a3a] leading-snug">
                  <div class="w-[5px] h-[5px] rounded-full bg-[#8b4060] mt-1 flex-shrink-0"></div>
                  {{ $item }}
                </li>
              @endforeach
            </ul>
          </div>
          @endforeach
        </div>
      </div>
      {{-- Requisitos de admisión --}}
<div class="bg-white border-[#611232] border-3 rounded-2xl p-6 md:col-span-2">
    <div class="flex items-center gap-3 mb-5">
        <div class="w-9 h-9 bg-[#611232]/8 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-[18px] h-[18px]" fill="none" stroke="#611232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
            </svg>
        </div>
        <div>
            <p class="text-[14px] font-semibold text-[#1a0510]">Requisitos de admisión</p>
            <p class="text-[11px] uppercase tracking-wide text-[#8b4060]">Documentación necesaria</p>
        </div>
    </div>
    <ul class="flex flex-col gap-4">
        @foreach ([
            [
                'num'  => '01',
                'text' => 'Tener perfil técnico de electrónica, mecatrónica, sistemas computacionales o áreas afines.',
                'req'  => 'Obligatorio',
            ],
            [
                'num'  => '02',
                'text' => 'Enviar carta compromiso de atender las sesiones síncronas y una semana presencial en Aguascalientes en el mes de agosto.',
                'req'  => 'Obligatorio',
            ],
            [
                'num'  => '03',
                'text' => 'Carta de apoyo del jefe inmediato.',
                'req'  => 'Si aplica',
            ],
        ] as $req)
        <li class="flex items-start gap-4">
            <span class="text-[13px] font-bold text-[#611232] bg-[#611232]/8 border border-[#611232]/15 rounded-lg px-2.5 py-1 flex-shrink-0 leading-none mt-0.5">
                {{ $req['num'] }}
            </span>
            <div class="flex-1">
                <p class="text-[13.5px] text-[#2d0820] leading-snug">{{ $req['text'] }}</p>
            </div>
            <span class="text-[10px] font-semibold tracking-wide uppercase flex-shrink-0 px-2.5 py-1 rounded-full
                {{ $req['req'] === 'Obligatorio'
                    ? 'bg-[#611232]/10 text-[#611232] border border-[#611232]/20'
                    : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                {{ $req['req'] }}
            </span>
        </li>
        @endforeach
    </ul>
</div>
    </div>
  </div>
</section>