export function initModulos() {
    const overlay = document.getElementById("modal-overlay");
    const imgPhoto = document.getElementById("modal-img-photo");
    if (!overlay) return;

    document.querySelectorAll(".modulo-card").forEach((card) => {
        card.addEventListener("click", () => {
            const temas = JSON.parse(card.dataset.temas);
            const imagen = card.dataset.imagen;

            // Imagen del modal
            if (imagen) {
                imgPhoto.src = imagen;
                imgPhoto.alt = card.dataset.nombre;
                imgPhoto.classList.remove("hidden");
            } else {
                imgPhoto.src = "";
                imgPhoto.classList.add("hidden");
            }

            document.getElementById("modal-num").textContent =
                `Módulo ${card.dataset.num}`;
            document.getElementById("modal-title").textContent =
                card.dataset.nombre;
            document.getElementById("modal-sub").textContent =
                card.dataset.short;
            document.getElementById("modal-topics").innerHTML = temas
                .map(
                    (t) => `
                    <div class="flex items-start gap-2.5 py-2 border-b border-[#611232]/6 last:border-0 text-[13.5px] text-[#2d0820]">
                        <div class="w-1.5 h-1.5 rounded-full bg-[#611232] mt-[7px] flex-shrink-0"></div>
                        ${t}
                    </div>`,
                )
                .join("");

            overlay.classList.remove("hidden");
        });
    });

    document
        .getElementById("modal-close")
        .addEventListener("click", () => overlay.classList.add("hidden"));

    overlay.addEventListener("click", (e) => {
        if (e.target === overlay) overlay.classList.add("hidden");
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") overlay.classList.add("hidden");
    });
}
