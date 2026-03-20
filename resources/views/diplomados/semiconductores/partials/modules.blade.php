<section class="w-full bg-[#faf7f8] py-20 px-6" id="modules">
  <div class="max-w-5xl mx-auto">
    <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-[#611232] mb-2">
      Contenido académico
    </p>
    <h2 class="text-3xl font-semibold text-[#1a0510] mb-10 pb-4 border-b-2 border-[#611232] inline-block">
      Módulos
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach ($modulos as $mod)
        <x-moduleCard
            :id="$mod['id']"
            :num="$mod['num']"
            :nombre="$mod['nombre']"
            :short="$mod['short']"
            :temas="$mod['temas']"
            :imagen="$mod['imagen'] ?? null"
            :description="$mod['description'] ?? ''"
        />
      @endforeach
    </div>
  </div>
</section>