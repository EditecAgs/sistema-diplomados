@extends('layouts.auth')

@section('content')
<section class="relative w-full min-h-screen bg-[#1a0510] flex flex-col items-center justify-center overflow-hidden px-6 pt-2 pb-6">
    <canvas id="circuit-bg" class="absolute inset-0 w-full h-full"></canvas>
    
    <div class="relative z-10 w-full max-w-md">
        <div class="bg-white rounded-lg shadow-xl w-full p-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-users-gear text-3xl text-blue-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Panel de Gestión de Diplomados</h2>
                <p class="text-gray-500 mt-2">Inicia sesión para continuar</p>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('auth.login') }}" id="loginForm">
                @csrf
                
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}"
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               placeholder="correo@ejemplo.com"
                               required
                               autofocus>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                               placeholder="••••••••"
                               required>
                    </div>
                </div>
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200 transform hover:scale-[1.02]">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mostrar error de autenticación con SweetAlert
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error de autenticación',
                text: '{{ session('error') }}',
                confirmButtonText: 'Reintentar',
                confirmButtonColor: '#611232',
                background: '#fff',
                backdrop: true
            });
        @endif
        
        // Mostrar error de validación del formulario
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error de validación',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'Corregir',
                confirmButtonColor: '#611232',
                background: '#fff',
                backdrop: true
            });
        @endif
        
        // Mostrar mensaje de éxito
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Continuar',
                confirmButtonColor: '#611232',
                background: '#fff',
                timer: 3000,
                timerProgressBar: true
            });
        @endif
    });
</script>