<div id="modal-overlay"
     class="hidden fixed inset-0 z-50 bg-[#1a0510]/70 flex items-center justify-center p-6">
     <div class="bg-white rounded-2xl w-full max-w-lg max-h-[85vh] overflow-hidden flex flex-col">

    <div class="h-40 bg-[#1a0510] shrink-0 relative" id="modal-img">
        <img id="modal-img-photo"
         src=""
         alt=""
         class="hidden w-full h-full object-cover absolute inset-0">
      <button id="modal-close"
              class="absolute top-3 right-3 w-8 h-8 bg-white/15 rounded-full flex items-center justify-center hover:bg-white/25 transition">
        <svg class="w-3.5 h-3.5" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" viewBox="0 0 14 14">
          <line x1="2" y1="2" x2="12" y2="12"/><line x1="12" y1="2" x2="2" y2="12"/>
        </svg>
      </button>
    </div>

    <div class="px-6 pt-5 shrink-0">
      <p class="text-[10px] font-semibold tracking-[2px] uppercase text-[#611232] mb-1" id="modal-num"></p>
      <h3 class="text-xl font-semibold text-[#1a0510] mb-1" id="modal-title"></h3>
      <p class="text-[13px] text-[#8b4060] mb-4" id="modal-sub"></p>
    </div>

    <div class="px-6 pb-6 overflow-y-auto flex-1">
      <div class="h-px bg-[#611232]/10 mb-4"></div>
      <p class="text-[11px] font-semibold tracking-[1.5px] uppercase text-[#8b4060] mb-3">Temas</p>
      <div id="modal-topics"></div>
    </div>

  </div>
</div>