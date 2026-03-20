<section class="w-full bg-[#611232] py-14 px-6">
  <div class="max-w-5xl mx-auto">

    <p class="text-[16px] font-medium tracking-[2.5px] uppercase text-white mb-8 text-center">
      Información general
    </p>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

      @foreach ([
        ['icon' => 'clock',   'value' => '120', 'unit' => 'hrs', 'desc' => 'Duración'],
        ['icon' => 'grid',    'value' => '4',   'unit' => '',    'desc' => 'Módulos'],
        ['icon' => 'monitor', 'value' => 'Teórico-práctica', 'unit' => '', 'desc' => 'Modalidad'],
        ['icon' => 'users',   'value' => 'Abierto', 'unit' => '', 'desc' => 'Profesionistas y Docentes'],
      ] as $stat)
      <div class="bg-white/7 hover:bg-white/12 border border-white/12 rounded-xl p-6 flex flex-col items-center text-center gap-1 transition-colors duration-200">

        {{-- Icono --}}
        <div class="w-9 h-9 bg-white/10 rounded-lg flex items-center justify-center mb-2">
          @if ($stat['icon'] === 'clock')
            <svg class="w-4.5 h-4.5" fill="none" stroke="#f0a0b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          @elseif ($stat['icon'] === 'grid')
            <svg class="w-4.5 h-4.5" fill="none" stroke="#f0a0b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
          @elseif ($stat['icon'] === 'monitor')
            <svg class="w-4.5 h-4.5" fill="none" stroke="#f0a0b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
          @elseif ($stat['icon'] === 'users')
            <svg class="w-4.5 h-4.5" fill="none" stroke="#f0a0b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          @endif
        </div>

        <div class="text-2xl font-bold text-white leading-none">
          {{ $stat['value'] }}<span class="text-sm font-normal text-white ml-1">{{ $stat['unit'] }}</span>
        </div>
        <div class="text-[11px] uppercase tracking-wide text-white mt-1">{{ $stat['desc'] }}</div>

      </div>
      @endforeach

    </div>
  </div>
</section>