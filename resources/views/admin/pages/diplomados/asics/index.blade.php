@extends('admin.layouts.admin')

@section('title', 'Diseño en ASCIs')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Diplomado en Diseño de Circuitos Integrados de Aplicación Específica (ASICs)</h1>
            <p class="text-gray-500 mt-1">Usuarios Inscritos</p>
        </div>
    </div>
    <!-- Tarjetas de información -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Solicitudes</p>
                    <p class="text-2xl font-bold">{{$requests}}</p>
                </div>
                <i class="fas fa-person-circle-plus text-3xl text-blue-500"></i>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Aceptados</p>
                    <p class="text-2xl font-bold">{{$aceptados}}</p>
                </div>
                <i class="fas fa-person-circle-check text-3xl text-green-500"></i>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Rechazados</p>
                    <p class="text-2xl font-bold">{{$rechazados}}</p>
                </div>
                <i class="fas fa-person-circle-xmark text-3xl text-red-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Tabla -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="font-semibold mb-6">Solicitudes para cursar el diplomado</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-center text-sm">#</th>
                        <th class="px-4 py-2 text-center text-sm">RFC</th>
                        <th class="px-4 py-2 text-center text-sm">Nombre</th>
                        <th class="px-4 py-2 text-center text-sm">Apellidos</th>
                        <th class="px-4 py-2 text-center text-sm">Email</th>
                        <th class="px-4 py-2 text-center text-sm">CV</th>
                        <th class="px-4 py-2 text-center text-sm">Carta Compromiso</th>
                        <th class="px-4 py-2 text-center text-sm">Carta Laboral</th>
                        <th class="px-4 py-2 text-center text-sm">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inscriptions as $inscription)
                    <tr class="border-t text-center">
                        <td class="px-4 py-2 text-sm">{{ $inscription->id }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inscription->rfc }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inscription->first_name }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inscription->last_name }}</td>
                        <td class="px-4 py-2 text-sm">{{ $inscription->email }}</td>
                        <td class="px-4 py-2 text-sm">
                            @if($inscription->cv_path)
                                <a href="{{ route('asics.cv', $inscription->id) }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center gap-1">
                                    <i class="fas fa-download"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm">
                            @if($inscription->commitment_letter_path)
                                <a href="{{ route('asics.letter', $inscription->id) }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center gap-1">
                                    <i class="fas fa-download"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm">
                            @if($inscription->support_letter_path)
                                <a href="{{ route('asics.support', $inscription->id) }}" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center gap-1">
                                    <i class="fas fa-download"></i>
                                </a>
                            @else
                                <span class="bg-gray-500 text-white text-xs rounded p-1 inline-block">Sin archivo</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm">
                            <div class="flex gap-2 justify-center">
                                <button type="button" 
                                    onclick="openModal({{ $inscription->id }})" 
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg inline-flex items-center gap-2 transition-colors">
                                    <i class="fas fa-eye"></i> Detalles
                                </button>
                                <button type="button" onclick="openModalAceptar({{ $inscription->id }}, '{{ $inscription->first_name }} {{ $inscription->last_name }}')" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-800 inline-flex items-center gap-2"><i class="fas fa-check"></i> Aceptar</button>
                                <button type="button" onclick="openModalRechazar({{ $inscription->id }}, '{{ $inscription->first_name }} {{ $inscription->last_name }}')" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-800 inline-flex items-center gap-2"><i class="fas fa-xmark"></i> Rechazar
                                </button>
                            </div>
                        </td>
                    </tr>
                    @include('admin.pages.diplomados.asics.modals.modal-details', ['inscription' => $inscription])
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center gap-3 text-gray-400">
                                <i class="fas fa-inbox text-4xl"></i>
                                <p class="text-[14px] font-medium">No hay solicitudes por evaluar por el momento</p>
                                <p class="text-[12px]">Las nuevas solicitudes aparecerán aquí</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6 flex-1">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-person-circle-check text-green-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Solicitudes aceptadas</h3>
                    <p class="text-[12px] text-gray-500">{{ $aceptados }} registro(s)</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px]">
                    <thead class="bg-green-50">
                        <tr>
                            <th class="px-4 py-2 text-center text-sm">#</th>
                            <th class="px-4 py-2 text-center text-sm">RFC</th>
                            <th class="px-4 py-2 text-center text-sm">Nombre</th>
                            <th class="px-4 py-2 text-center text-sm">Apellidos</th>
                            <th class="px-4 py-2 text-center text-sm">Email</th>
                            <th class="px-4 py-2 text-center text-sm">Fecha</th>
                            <th class="px-4 py-2 text-center text-sm">Documentos</th>
                            <th class="px-4 py-2 text-center text-sm">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aceptadas as $inscription)
                        <tr class="border-t text-center">
                            <td class="px-4 py-2 text-sm">{{ $inscription->id }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->rfc }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->first_name }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->last_name }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->email }}</td>
                            <td class="px-4 py-2 text-sm">
                                {{ $inscription->status->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <div class="flex gap-1 justify-center">
                                    @if($inscription->cv_path)
                                        <a href="{{ route('asics.cv', $inscription->id) }}"
                                    class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="CV">
                                            <i class="fas fa-file-circle-check text-xs"></i>
                                        </a>
                                    @endif
                                    @if($inscription->commitment_letter_path)
                                    <a href="{{ route('asics.letter', $inscription->id) }}"
                                        class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="Carta compromiso">
                                            <i class="fas fa-file-contract text-xs"></i>
                                        </a>
                                    @endif
                                    @if($inscription->support_letter_path)
                                        <a href="{{ route('asics.support', $inscription->id) }}"
                                    class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="Carta de apoyo">
                                            <i class="fas fa-file text-xs"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <!--<td class="px-4 py-2 text-sm">
                                <button type="button" onclick="openModal({{ $inscription->id }})"   class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-800 inline-flex items-center gap-2">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </button>
                            </td>-->
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-10 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-400">
                                    <i class="fas fa-inbox text-3xl"></i>
                                    <p class="text-[13px]">No hay solicitudes aceptadas aún</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex-1">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-person-circle-xmark text-red-600"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Solicitudes rechazadas</h3>
                    <p class="text-[12px] text-gray-500">{{ $rechazados }} registro(s)</p>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px]">
                    <thead class="bg-red-50">
                        <tr>
                            <th class="px-4 py-2 text-center text-sm">#</th>
                            <th class="px-4 py-2 text-center text-sm">RFC</th>
                            <th class="px-4 py-2 text-center text-sm">Nombre</th>
                            <th class="px-4 py-2 text-center text-sm">Apellidos</th>
                            <th class="px-4 py-2 text-center text-sm">Email</th>
                            <th class="px-4 py-2 text-center text-sm">Fecha</th>
                            <th class="px-4 py-2 text-center text-sm">Documentos</th>
                            <th class="px-4 py-2 text-center text-sm">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rechazadas as $inscription)
                        <tr class="border-t text-center">
                            <td class="px-4 py-2 text-sm">{{ $inscription->id }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->rfc }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->first_name }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->last_name }}</td>
                            <td class="px-4 py-2 text-sm">{{ $inscription->email }}</td>
                            <td class="px-4 py-2 text-sm">
                                {{ $inscription->status->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <div class="flex gap-1 justify-center">
                                    @if($inscription->cv_path)
                                        <a href="{{ route('asics.cv', $inscription->id) }}"
                                        class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="CV">
                                            <i class="fas fa-file-circle-check text-xs"></i>
                                        </a>
                                    @endif
                                    @if($inscription->commitment_letter_path)
                                        <a href="{{ route('asics.letter', $inscription->id) }}"
                                        class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="Carta compromiso">
                                            <i class="fas fa-file-contract text-xs"></i>
                                        </a>
                                    @endif
                                    @if($inscription->support_letter_path)
                                        <a href="{{ route('asics.support', $inscription->id) }}"
                                        class="bg-blue-600 text-white p-2 rounded hover:bg-blue-800 inline-flex items-center"
                                        title="Carta de apoyo">
                                            <i class="fas fa-file text-xs"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-2 text-sm">
                                <!--<button type="button" onclick="openModal({{ $inscription->id }})"   class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-800 inline-flex items-center gap-2">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </button>-->
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-10 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-400">
                                    <i class="fas fa-inbox text-3xl"></i>
                                    <p class="text-[13px]">No hay solicitudes rechazadas aún</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
    @include('admin.pages.diplomados.asics.modals.aceptar')
    @include('admin.pages.diplomados.asics.modals.rechazar')
@endsection
@push('scripts')
<script>
    // ── SweetAlert ──
    @if (session('success'))
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon:              'success',
            title:             '¡Acción realizada!',
            text:              '{{ session('success') }}',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#16a34a',
        });
    });
    @endif

    @if (session('error'))
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon:              'error',
            title:             'Error',
            text:              '{{ session('error') }}',
            confirmButtonText: 'Cerrar',
            confirmButtonColor: '#611232',
        });
    });
    @endif

    // ── Modal Detalles ──
    function openModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            console.log(`Modal modal-${id} no encontrado`);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(`modal-${id}`);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // ── Modal Aceptar ──
    function openModalAceptar(id, nombre) {
        const modal = document.getElementById('modal-aceptar');
        if (modal) {
            document.getElementById('modal-aceptar-nombre').textContent = nombre;
            document.getElementById('form-aceptar').action = `/admin/asics/${id}/aceptar`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            const textarea = document.querySelector('#form-aceptar textarea');
            if (textarea) textarea.value = '';
        }
    }

    function closeModalAceptar() {
        const modal = document.getElementById('modal-aceptar');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // ── Modal Rechazar ──
    function openModalRechazar(id, nombre) {
        const modal = document.getElementById('modal-rechazar');
        if (modal) {
            document.getElementById('modal-rechazar-nombre').textContent = nombre;
            document.getElementById('form-rechazar').action = `/admin/asics/${id}/rechazar`;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            const textarea = document.querySelector('#form-rechazar textarea');
            if (textarea) textarea.value = '';
        }
    }

    function closeModalRechazar() {
        const modal = document.getElementById('modal-rechazar');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Cerrar modales con clic fuera
    document.addEventListener('click', function(e) {
        // Cerrar modal de detalles
        if (e.target && e.target.id && e.target.id.startsWith('modal-') && !e.target.id.includes('aceptar') && !e.target.id.includes('rechazar')) {
            const id = e.target.id.replace('modal-', '');
            closeModal(id);
        }
        // Cerrar modal aceptar
        if (e.target === document.getElementById('modal-aceptar')) {
            closeModalAceptar();
        }
        // Cerrar modal rechazar
        if (e.target === document.getElementById('modal-rechazar')) {
            closeModalRechazar();
        }
    });

    // Cerrar modales con tecla ESC
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            // Cerrar modal de detalles
            const openModals = document.querySelectorAll('[id^="modal-"]:not(.hidden)');
            openModals.forEach(modal => {
                const id = modal.id;
                if (id !== 'modal-aceptar' && id !== 'modal-rechazar') {
                    const numId = id.replace('modal-', '');
                    closeModal(numId);
                }
            });
            // Cerrar modales de aceptar/rechazar
            closeModalAceptar();
            closeModalRechazar();
        }
    });
</script>
@endpush