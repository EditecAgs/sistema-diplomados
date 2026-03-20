<section class="w-full bg-[#faf7f8] py-20 px-6" id="information">
        <div class="max-w-5xl mx-auto">
            <p class="text-[11px] font-medium tracking-[2.5px] uppercase text-[#611232] mb-2">
                Información general
            </p>
            <h2 class="text-3xl font-semibold text-[#1a0510] mb-12 pb-4 border-b-2 border-[#611232] inline-block">
                Sobre el diplomado
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div class="rounded-xl overflow-hidden bg-[#1a0510] aspect-4/3 flex items-center justify-center">
                    <img src="{{ asset('images/chips.jpg') }}" alt="Semiconductores" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col gap-5">
                    <p class="text-[15px] text-[#3d1020] leading-relaxed border-l-[3px] border-[#611232] pl-4">
                        Este diplomado ofrece una oportunidad única para recorrer de manera integral el proceso real de diseño de ASICs, desde la definición de requerimientos funcionales hasta el tapeout y *la validación post silicio, utilizando metodologías y flujos alineados con la práctica industrial actual.
                    </p>
                    <p class="text-[13.5px] text-[#6b4050] leading-relaxed bg-[#611232]/5 rounded-lg px-4 py-3">
                        Proporcionar a los participantes una formación integral y estructurada sobre el proceso completo de diseño de circuitos integrados de aplicación específica (ASICs), abarcando desde la definición de características y requerimientos del sistema, el diseño lógico y físico, la verificación funcional, hasta la preparación para tapeout, empleando flujos, metodologías y buenas prácticas utilizadas en la industria de semiconductores.
                    </p>
                    <ul class="flex flex-col gap-3 mt-1">
                        @foreach ([
                            'Modalidad: Teórico-práctica',
                            'Duración: 120 horas',
                            'Enfoque: Diseño industrial de ASICs + formación de formadores',
                            'PDK base: SkyWater 130 nm (open source, educativo y real), GF180nm, MinimalFab 5u.',
                        ] as $item)
                            <li class="flex items-center gap-3 text-sm font-medium text-[#1a0510]">
                                <span class="w-5.5 h-5.5 rounded-full bg-[#611232] flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="white" stroke-width="2.5" viewBox="0 0 12 12">
                                        <polyline points="2 6 5 9 10 3"/>
                                    </svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>