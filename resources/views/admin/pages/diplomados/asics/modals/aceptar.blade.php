<div id="modal-aceptar" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-6">
    <div class="bg-white rounded-2xl w-full max-w-md shadow-xl">

        <div class="bg-[#611232] rounded-t-2xl px-6 py-4 flex items-center justify-between">
            <h3 class="text-white font-semibold text-[15px]">Confirmar aceptación</h3>
            <button onclick="closeModalAceptar()"
                    class="w-7 h-7 bg-white/15 rounded-full flex items-center justify-center hover:bg-white/25 transition">
                <i class="fas fa-xmark text-white text-xs"></i>
            </button>
        </div>

        <div class="px-6 py-5">
            <p class="text-[13px] text-gray-600 mb-1">Está a punto de aceptar la inscripción de:</p>
            <p class="text-[16px] font-semibold text-gray-800 mb-5" id="modal-aceptar-nombre"></p>

            <form id="form-aceptar" method="POST" action="">
                @csrf

                <div class="flex flex-col gap-1.5 mb-5">
                    <label class="text-[10px] font-semibold tracking-[1.5px] uppercase text-gray-500">
                        Motivo de aceptación
                        <span class="text-gray-400 normal-case tracking-normal font-normal ml-1">(Opcional)</span>
                    </label>
                    <textarea name="motivo" rows="3"
                              placeholder="Escribe un motivo o comentario..."
                              class="w-full border border-gray-200 rounded-lg px-3.5 py-2.5 text-[13px] text-gray-800 placeholder-gray-400 focus:outline-none focus:border-green-500 transition resize-none"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeModalAceptar()"
                            class="flex-1 py-2.5 rounded-lg border border-gray-200 text-[13px] text-gray-600 hover:bg-gray-50 transition">
                        Cancelar
                    </button>
                    <button type="submit"
                            class="flex-1 py-2.5 rounded-lg bg-green-600 hover:bg-green-700 text-white font-semibold text-[13px] transition flex items-center justify-center gap-2">
                        <i class="fas fa-check"></i>
                        Aceptar inscripción
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>