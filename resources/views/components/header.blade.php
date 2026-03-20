<nav class="bg-[#611232] fixed w-full z-20 top-0 inset-x-0 border-b border-white/10">
  <div class="max-w-7xl flex items-center justify-between mx-auto px-4 py-3 gap-2">

    <a href="{{ $inicio }}" class="flex items-center shrink">
      <div class="flex items-center gap-2 sm:gap-4">
        <img src="{{ asset('images/gob-blanco.png') }}" alt="Gobierno de México" class="h-6 sm:h-8 w-auto">
        <div class="h-5 sm:h-7 w-px bg-white/30"></div>
        <img src="{{ asset('images/sep-blanco.png') }}" alt="SEP" class="h-6 sm:h-8 w-auto">
        <div class="h-5 sm:h-7 w-px bg-white/30"></div>
        <img src="{{ asset('images/logo_tecnm_white.png') }}" alt="TecNM" class="h-6 sm:h-8 w-auto">
      </div>
    </a>

    <ul class="hidden lg:flex items-center gap-1">
      <li>
        <a href="{{ $inicio }}"
           class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 lg:hover:bg-transparent group overflow-hidden">
          Inicio
          <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
      </li>
      <li>
        <a href="{{ $convocatoria }}" target="_blank"
           class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 lg:hover:bg-transparent group overflow-hidden">
          Convocatoria
          <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
      </li>
      <li>
        <a href="{{ $plataforma }}"
           class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 lg:hover:bg-transparent group overflow-hidden">
          Plataforma Virtual
          <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
        </a>
      </li>
    </ul>

    <div class="flex items-center gap-2 shrink-0">

      <a href="{{ $registro }}"
         class="hidden lg:inline-flex items-center font-semibold text-sm px-5 py-2.5 rounded-lg transition-all duration-300 hover:scale-105 hover:brightness-110 shadow-md shadow-[#B9925B]/20"
         style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); color: #fff; border: 1px solid rgba(255,255,255,0.15);">
        Registrarme
      </a>

      <button id="menu-btn" type="button"
              class="inline-flex items-center justify-center p-2 w-9 h-9 text-white rounded-md lg:hidden hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/30 transition"
              aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Abrir menú</span>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
        </svg>
      </button>
    </div>

  </div>

  <div class="hidden lg:hidden w-full" id="navbar-cta">
    <div class="px-4 pb-4 border-t border-white/10 bg-[#611232]">
      <ul class="flex flex-col gap-1 pt-3">
        <li>
          <a href="{{ $inicio }}"
             class="block py-2.5 px-3 text-white text-sm rounded hover:bg-white/10 transition">
            Inicio
          </a>
        </li>
        <li>
          <a href="{{ $convocatoria }}"
             class="block py-2.5 px-3 text-white text-sm rounded hover:bg-white/10 transition">
            Convocatoria
          </a>
        </li>
        <li>
          <a href="{{ $plataforma }}"
             class="block py-2.5 px-3 text-white text-sm rounded hover:bg-white/10 transition">
            Plataforma Virtual
          </a>
        </li>
        <li class="mt-2">
          <a href="{{ $registro }}"
             class="block py-2.5 px-3 text-center font-semibold text-sm rounded-lg transition-all duration-200"
             style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); color: #fff; border: 1px solid rgba(255,255,255,0.15);">
            Registrarme
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>