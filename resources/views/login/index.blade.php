@extends('layouts.auth')

@section('content')
<section class="relative w-full min-h-screen bg-[#1a0510] flex flex-col items-center justify-center overflow-hidden px-6 pt-24 pb-16">
    <canvas id="circuit-bg" class="absolute inset-0 w-full h-full"></canvas>

    <div class="relative z-10 w-full max-w-md">
        <div class="bg-white border border-[#611232]/40 rounded-2xl px-8 py-9">

            {{-- Header --}}
            <div class="text-center mb-7">
                <span class="inline-block text-[10px] font-semibold tracking-[2px] uppercase text-rose-300 border border-rose-300 bg-[#611232] rounded-full px-3 py-1 mb-4">
                    Plataforma Virtual
                </span>
                <h1 class="text-[22px] font-semibold mb-1">Acceder al diplomado</h1>
                <p class="text-[13px] text-gray-600">Ingresa tus credenciales para continuar</p>
            </div>

            {{-- Formulario apuntando directo a Moodle --}}
            <form action="{{ config('services.moodle.url') }}/login/index.php"
                  method="POST"
                  id="login-form"
                  class="flex flex-col gap-4">

                {{-- wantsurl: para que Moodle redirija al destino correcto tras login --}}
                @if ($wantsurl ?? null)
                    <input type="hidden" name="wantsurl" value="{{ $wantsurl }}">
                @endif

                <div class="flex flex-col gap-1.5">
                    <label class="text-[10px] font-semibold tracking-[1.5px] uppercase">
                        Usuario
                    </label>
                    <input type="text" name="username" value="{{ old('username') }}"
                           autocomplete="username"
                           placeholder="usuario@ejemplo.com"
                           class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13.5px] placeholder-black/60 focus:outline-none focus:border-rose-300 transition">
                    @error('username')
                        <p class="text-red-400 text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[10px] font-semibold tracking-[1.5px] uppercase">
                        Contraseña
                    </label>
                    <input type="password" name="password"
                           autocomplete="current-password"
                           placeholder="••••••••••••••••"
                           class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13.5px] placeholder-black/60 focus:outline-none focus:border-rose-300 transition">
                    @error('password')
                        <p class="text-red-400 text-[11px]">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" id="btn-submit"
                        class="w-full py-3 rounded-xl font-bold text-[14px] text-white mt-2 transition-all duration-200 hover:brightness-110 hover:-translate-y-0.5 cursor-pointer"
                        style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); border: 1px solid rgba(255,255,255,0.12);">
                    <span id="btn-text">Acceder a la plataforma</span>
                    <span id="btn-loading" class="hidden items-center justify-center gap-2">
                        <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                        </svg>
                        Conectando...
                    </span>
                </button>

            </form>

            {{-- Restablecer contraseña --}}
            <p class="text-center text-[11px] mt-6">
                ¿Olvidaste tu contraseña?
                <a href="{{ config('services.moodle.url') }}/login/forgot_password.php"
                   target="_blank"
                   class="text-rose-300 hover:text-red-500 transition ml-1">
                    Restablécela aquí
                </a>
            </p>

        </div>
    </div>
</section>

{{-- Error de credenciales que Moodle regresa con ?errorcode=3 --}}
@if (($errorcode ?? null) == 3)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon:              'error',
            title:             'Credenciales incorrectas',
            text:              'Tu usuario o contraseña son incorrectos. Intenta de nuevo.',
            confirmButtonText: 'Reintentar',
            confirmButtonColor: '#611232',
        });
    });
</script>
@endif

@endsection