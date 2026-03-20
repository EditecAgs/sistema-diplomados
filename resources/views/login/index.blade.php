@extends('layouts.auth')
<section class="relative w-full min-h-screen bg-[#1a0510] flex flex-col items-center justify-center overflow-hidden px-6 pt-24 pb-16">
    <canvas id="circuit-bg" class="absolute inset-0 w-full h-full"></canvas>
    <div class="relative z-10 w-full max-w-md">
    <div class="bg-white border border-[#611232]/40 rounded-2xl px-8 py-9"
     style="backdrop-filter: blur(12px);">

  {{-- Header --}}
  <div class="text-center mb-7">
    <span class="inline-block text-[10px] font-semibold tracking-[2px] uppercase text-rose-300 border border-rose-300 bg-[#611232] rounded-full px-3 py-1 mb-4">
      Plataforma Virtual
    </span>
    <h1 class="text-[22px] font-semibold mb-1">Acceder al diplomado</h1>
    <p class="text-[13px] text-gray-600">Ingresa tus credenciales para continuar</p>
  </div>

  {{-- Errores --}}
  @if ($errors->has('general'))
    <div class="bg-red-500 border border-red-500 text-red-300 text-[13px] rounded-lg px-4 py-3 mb-5">
      {{ $errors->first('general') }}
    </div>
  @endif

  {{-- Formulario --}}
  <form action="#" method="POST" class="flex flex-col gap-4">
    @csrf

    <div class="flex flex-col gap-1.5">
      <label class="text-[10px] font-semibold tracking-[1.5px] uppercase">
        Usuario
      </label>
      <input type="text" name="username" value="{{ old('username') }}"
             placeholder="usuario@ejemplo.com"
             class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13.5px] placeholder-black/60 focus:outline-none focus:border-rose-300 focus:bg-white/7 transition">
      @error('username')
        <p class="text-red-400 text-[11px]">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex flex-col gap-1.5">
      <label class="text-[10px] font-semibold tracking-[1.5px] uppercase">
        Contraseña
      </label>
      <input type="password" name="password"
             placeholder="••••••••••••••••"
             class="bg-white/5 border border-[#611232]/35 rounded-lg px-3.5 py-2.5 text-[13.5px] placeholder-black/60 focus:outline-none focus:border-rose-300 focus:bg-white/7 transition">
      @error('password')
        <p class="text-red-400 text-[11px]">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
            class="w-full py-3 rounded-xl font-bold text-[14px] text-white mt-2 transition-all duration-200 hover:brightness-110 hover:-translate-y-0.5 cursor-pointer"
            style="background: linear-gradient(135deg, #B9925B, #d4a96a, #9a7440); border: 1px solid rgba(255,255,255,0.12);">
      Acceder a la plataforma
    </button>

  </form>

  {{-- Restablecer contraseña --}}
  <p class="text-center text-[11px] mt-6">
    ¿Olvidaste tu contraseña?
    <a href="#"
       target="_blank"
       class="text-rose-300 hover:text-red-500 transition ml-1">
      Restablécela aquí
    </a>
  </p>
    </div>
</div>
</section>