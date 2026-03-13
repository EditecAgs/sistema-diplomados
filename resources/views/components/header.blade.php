<nav class="bg-[#611232] fixed w-full z-20 top-0 inset-x-0 border-b border-white/10">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">

    <!-- Logos -->
    <a href="{{ $inicio }}" class="flex items-center space-x-3">
      <div class="flex items-center gap-4">
        <img src="{{ asset('images/gob-blanco.png') }}" alt="Gobierno de México" class="h-8 w-auto">
        <div class="h-7 w-px bg-white/30"></div>
        <img src="{{ asset('images/sep-blanco.png') }}" alt="SEP" class="h-8 w-auto">
        <div class="h-7 w-px bg-white/30"></div>
        <img src="{{ asset('images/logo_tecnm_white.png') }}" alt="TecNM" class="h-8 w-auto">
      </div>
    </a>

    <div class="flex items-center gap-3 md:order-2">
      <a href="{{ $registro }}"
         class="hidden md:inline-flex text-white bg-linear-to-r from-yellow-700 to-amber-700 hover:from-yellow-800 hover:to-amber-800 hover:scale-105 border border-amber-600 focus:ring-4 focus:ring-amber-700/50 shadow-md font-semibold rounded-lg text-sm px-5 py-2.5 transition-all duration-300">
        Registrarme
      </a>

      <button id="menu-btn" type="button"
              class="inline-flex items-center justify-center p-2 w-9 h-9 text-white rounded-md md:hidden hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/30 transition"
              aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Abrir menú</span>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
        </svg>
      </button>
    </div>

    <div class="hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
      <ul class="flex flex-col p-4 md:p-0 mt-4 md:mt-0 gap-1 md:flex-row md:gap-1 border border-white/10 rounded-lg bg-[#611232]/95 md:border-0 md:bg-transparent">

        <li>
          <a href="{{ $inicio }}"
             class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 md:hover:bg-transparent group overflow-hidden">
            Inicio
            <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
          </a>
        </li>

        <li>
          <a href="{{ $convocatoria }}"
             class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 md:hover:bg-transparent group overflow-hidden">
            Convocatoria
            <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
          </a>
        </li>

        <li>
          <a href="{{ $plataforma }}"
             class="relative block py-2 px-3 text-white text-sm rounded hover:bg-white/10 md:hover:bg-transparent group overflow-hidden">
            Plataforma Virtual
            <span class="absolute bottom-0 left-3 right-3 h-0.5 bg-white/70 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
          </a>
        </li>
        <li class="md:hidden mt-1">
          <a href="{{ $registro }}"
             class="block py-2 px-3 text-center text-white bg-white/10 hover:bg-white/20 rounded-lg transition font-semibold text-sm">
            Registrarme
          </a>
        </li>
      </ul>
    </div>

  </div>
</nav>