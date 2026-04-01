<div id="modal-{{ $inscription->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center pb-3 border-b">
            <h3 class="text-xl font-semibold text-gray-900">Detalles de la Inscripción</h3>
            <button onclick="closeModal({{ $inscription->id }})" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <div class="mt-4 max-h-[70vh] overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">RFC</p>
                    <p class="font-medium">{{ $inscription->rfc ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">CURP</p>
                    <p class="font-medium">{{ $inscription->curp ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Nombre</p>
                    <p class="font-medium">{{ $inscription->first_name }} {{ $inscription->last_name }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Género</p>
                    <p class="font-medium">{{ $inscription->gender == 'M' ? 'Masculino' : 'Femenino' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded md:col-span-2">
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium break-all">{{ $inscription->email }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Estado</p>
                    <p class="font-medium">{{ $inscription->state->name ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Municipio</p>
                    <p class="font-medium">{{ $inscription->municipality->name ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Ciudad</p>
                    <p class="font-medium">{{ $inscription->city ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Sector</p>
                    <p class="font-medium">{{ $inscription->sector ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Función del Puesto</p>
                    <p class="font-medium">{{ $inscription->job_function ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded md:col-span-2">
                    <p class="text-sm text-gray-600">Institución</p>
                    <p class="font-medium">{{ $inscription->institution ?? 'N/A' }}</p>
                </div>
                <div class="bg-gray-50 p-3 rounded md:col-span-2">
                    <p class="text-sm text-gray-600">Documentos</p>
                    <div class="flex flex-wrap gap-2 mt-1">
                        @if($inscription->cv_path)
                            <a href="{{ route('asics.cv', $inscription->id) }}" class="text-blue-600 hover:text-blue-800 text-sm inline-flex items-center gap-1">
                                <i class="fas fa-file-pdf"></i> CV
                            </a>
                        @endif
                        @if($inscription->commitment_letter_path)
                            <a href="{{ route('asics.letter', $inscription->id) }}" class="text-blue-600 hover:text-blue-800 text-sm inline-flex items-center gap-1">
                                <i class="fas fa-file-pdf"></i> Carta Compromiso
                            </a>
                        @endif
                        @if($inscription->support_letter_path)
                            <a href="{{ route('asics.support', $inscription->id) }}" download class="text-blue-600 hover:text-blue-800 text-sm inline-flex items-center gap-1">
                                <i class="fas fa-file-pdf"></i> Carta Apoyo
                            </a>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm text-gray-600">Fecha de Registro</p>
                    <p class="font-medium">{{ $inscription->created_at ? $inscription->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end mt-4 pt-3 border-t">
            <button onclick="closeModal({{ $inscription->id }})" 
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                Cerrar
            </button>
        </div>
    </div>
</div>