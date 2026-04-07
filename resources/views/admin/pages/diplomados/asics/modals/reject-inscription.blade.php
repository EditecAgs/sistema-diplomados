<div id="modal-rechazado-{{ $inscription->id }}"
     class="fixed inset-0 bg-black/50 overflow-y-auto h-full w-full hidden z-50 flex items-start justify-center p-6">

    <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-xl my-8">

        {{-- Header con color rojo --}}
        <div class="bg-red-600 rounded-t-2xl px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white/15 rounded-lg flex items-center justify-center">
                    <i class="fas fa-times-circle text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="text-white font-semibold text-[15px]">Solicitud Rechazada</h3>
                    <p class="text-red-200 text-[11px]">{{ $inscription->first_name }} {{ $inscription->last_name }}</p>
                </div>
            </div>
            <button onclick="closeModalRechazado({{ $inscription->id }})"
                    class="w-7 h-7 bg-white/15 rounded-full flex items-center justify-center hover:bg-white/25 transition">
                <i class="fas fa-xmark text-white text-xs"></i>
            </button>
        </div>

        {{-- Body --}}
        <div class="p-6 max-h-[70vh] overflow-y-auto">

            {{-- Estado y motivo destacado --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[11px] uppercase tracking-wide text-red-600 font-semibold">Estado actual</p>
                        <p class="text-[16px] font-bold text-red-700">Rechazado</p>
                    </div>
                </div>

                {{-- Motivo del rechazo (destacado) --}}
                @if($inscription->status->motivo)
                    <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-comment-dots text-red-500 text-sm mt-0.5"></i>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-red-700 mb-1">
                                    Motivo del rechazo
                                </p>
                                <p class="text-[14px] text-gray-800 leading-relaxed">{{ $inscription->status->motivo }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-gray-50 border-l-4 border-gray-400 rounded-lg p-4">
                        <p class="text-[13px] text-gray-500">No se especificó un motivo</p>
                    </div>
                @endif
            </div>

            {{-- Información de la evaluación --}}
            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <p class="text-[10px] font-semibold tracking-[1.5px] uppercase text-gray-500 mb-3">
                    Información de la evaluación
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Evaluado por</p>
                        <p class="text-[13px] font-semibold text-gray-800">
                            <i class="fas fa-user-circle text-gray-400 mr-1"></i>
                            {{ $inscription->status->user->name ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Fecha de evaluación</p>
                        <p class="text-[13px] font-semibold text-gray-800">
                            <i class="fas fa-calendar-alt text-gray-400 mr-1"></i>
                            {{ $inscription->status->created_at ? $inscription->status->created_at->format('d/m/Y H:i') : 'N/A' }}
                        </p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Email del evaluador</p>
                        <p class="text-[13px] font-semibold text-gray-800 break-all">
                            <i class="fas fa-envelope text-gray-400 mr-1"></i>
                            {{ $inscription->status->user->email ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Datos personales --}}
            <p class="text-[10px] font-semibold tracking-[1.5px] uppercase text-[#611232] mb-3">
                Datos personales
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">RFC</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->rfc ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">CURP</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->curp ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Nombre(s)</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->first_name }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Apellidos</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->last_name }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Género</p>
                    <p class="text-[13px] font-semibold text-gray-800">
                        @php
                            $generos = ['M' => 'Masculino', 'F' => 'Femenino', 'ND' => 'Prefiero no decir'];
                        @endphp
                        {{ $generos[$inscription->gender] ?? 'N/A' }}
                    </p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Correo electrónico</p>
                    <p class="text-[13px] font-semibold text-gray-800 break-all">{{ $inscription->email }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Fecha de registro</p>
                    <p class="text-[13px] font-semibold text-gray-800">
                        {{ $inscription->created_at?->format('d/m/Y H:i') ?? 'N/A' }}
                    </p>
                </div>
            </div>

            {{-- Ubicación --}}
            <p class="text-[10px] font-semibold tracking-[1.5px] uppercase text-[#611232] mb-3">
                Ubicación
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5">
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Estado</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->state->name ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Municipio</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->municipality->name ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Ciudad</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->city ?? 'N/A' }}</p>
                </div>
            </div>

            {{-- Datos laborales --}}
            <p class="text-[10px] font-semibold tracking-[1.5px] uppercase text-[#611232] mb-3">
                Datos laborales
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5">
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Sector</p>
                    <p class="text-[13px] font-semibold text-gray-800 capitalize">{{ $inscription->sector ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Función laboral</p>
                    <p class="text-[13px] font-semibold text-gray-800 capitalize">{{ $inscription->job_function ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-4 py-3">
                    <p class="text-[10px] uppercase tracking-wide text-gray-400 mb-0.5">Institución</p>
                    <p class="text-[13px] font-semibold text-gray-800">{{ $inscription->institution ?? 'N/A' }}</p>
                </div>
            </div>

            {{-- Documentos --}}
            <p class="text-[10px] font-semibold tracking-[1.5px] uppercase text-[#611232] mb-3">
                Documentos
            </p>
            <div class="flex flex-wrap gap-3">
                @if($inscription->cv_path)
                    <a href="{{ route('asics.cv', $inscription->id) }}"
                       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-[12px] font-medium px-4 py-2 rounded-lg transition">
                        <i class="fas fa-file-pdf text-xs"></i>
                        Currículum vitae
                    </a>
                @endif
                @if($inscription->commitment_letter_path)
                    <a href="{{ route('asics.letter', $inscription->id) }}"
                       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-[12px] font-medium px-4 py-2 rounded-lg transition">
                        <i class="fas fa-file-contract text-xs"></i>
                        Carta compromiso
                    </a>
                @endif
                @if($inscription->support_letter_path)
                    <a href="{{ route('asics.support', $inscription->id) }}"
                       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-[12px] font-medium px-4 py-2 rounded-lg transition">
                        <i class="fas fa-file text-xs"></i>
                        Carta de apoyo
                    </a>
                @endif
                @if(!$inscription->cv_path && !$inscription->commitment_letter_path && !$inscription->support_letter_path)
                    <p class="text-[13px] text-gray-400">Sin documentos adjuntos</p>
                @endif
            </div>

        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 border-t border-gray-100 rounded-b-2xl">
            <button onclick="closeModalRechazado({{ $inscription->id }})"
                    class="w-full py-2.5 rounded-lg border border-gray-200 text-[13px] text-gray-600 hover:bg-gray-50 transition">
                Cerrar
            </button>
        </div>

    </div>
</div>