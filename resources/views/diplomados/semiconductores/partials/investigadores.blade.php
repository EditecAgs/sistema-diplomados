<section class="w-full bg-[#faf7f8] py-20 px-6" id="researches">
  <div class="max-w-5xl mx-auto">

    <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-[#611232] mb-2">
      Equipo académico
    </p>
    <h2 class="text-3xl font-semibold text-[#1a0510] mb-10 pb-4 border-b-2 border-[#611232] inline-block">
      Investigadores
    </h2>

    <div class="flex flex-wrap gap-6">
      @foreach ($investigadores as $inv)
        <x-investigador-card
            :nombre="$inv['nombre']"
            :rol="$inv['rol'] ?? 'Investigador'"
            :institucion="$inv['institucion']"
            :foto="$inv['foto'] ?? null"
            :iniciales="$inv['iniciales'] ?? '?'"
        />
      @endforeach
    </div>

  </div>
</section>