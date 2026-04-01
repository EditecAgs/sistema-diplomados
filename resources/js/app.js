import "./bootstrap";
import { initCircuits } from "./circuits.js";
import { initModulos } from "./modules.js";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    // ── Circuitos y módulos ──
    initCircuits();
    initModulos();

    // ── Menú móvil ──
    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("navbar-cta");
    if (btn && menu) {
        btn.addEventListener("click", () => {
            const isOpen = !menu.classList.contains("hidden");
            menu.classList.toggle("hidden", isOpen);
            btn.setAttribute("aria-expanded", String(!isOpen));
        });
    }

    // ── Tom Select: estado y municipio ──
    const elEstado = document.getElementById("select-estado");
    const elMunicipio = document.getElementById("select-municipio");

    if (elEstado && elMunicipio) {
        const tomEstado = new TomSelect("#select-estado", {
            placeholder: "Escribe o selecciona un estado...",
            allowEmptyOption: false,
            onChange(stateId) {
                cargarMunicipios(stateId);
            },
        });

        const tomMunicipio = new TomSelect("#select-municipio", {
            placeholder: "Primero selecciona un estado...",
            allowEmptyOption: false,
        });

        tomMunicipio.disable();

        async function cargarMunicipios(stateId) {
            tomMunicipio.clear();
            tomMunicipio.clearOptions();
            tomMunicipio.disable();
            tomMunicipio.settings.placeholder = "Cargando municipios...";
            tomMunicipio.inputState();

            if (!stateId) return;

            try {
                const res = await fetch(`/api/municipios/${stateId}`);
                const data = await res.json();

                data.forEach((m) =>
                    tomMunicipio.addOption({ value: m.id, text: m.name }),
                );
                tomMunicipio.refreshOptions(false);
                tomMunicipio.enable();
                tomMunicipio.settings.placeholder =
                    "Escribe o selecciona un municipio...";
                tomMunicipio.inputState();

                const oldMunicipio = elMunicipio.dataset.old;
                if (oldMunicipio) tomMunicipio.setValue(oldMunicipio);
            } catch (e) {
                console.error("Error cargando municipios:", e);
            }
        }

        const oldEstado = elEstado.dataset.old;
        if (oldEstado) tomEstado.setValue(oldEstado);
    }

    // ── Upload: mostrar nombre del archivo ──
    [
        ["cv", "cv-name", "PDF · Máximo 5 MB"],
        ["carta_compromiso", "carta-name", "PDF · Máximo 5 MB"],
        [
            "carta_jefe",
            "jefe-name",
            "Si aplica a tu perfil · PDF · Máximo 5 MB",
        ],
    ].forEach(([inputId, labelId, fallback]) => {
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);
        const container = label?.closest("label");
        if (!input || !label) return;

        input.addEventListener("change", () => {
            if (input.files[0]) {
                label.textContent = input.files[0].name;
                label.classList.remove("text-gray-800");
                label.classList.add("text-[#611232]", "font-semibold");
                container?.classList.add(
                    "border-[#611232]/60",
                    "bg-[#611232]/4",
                );
                container?.classList.remove(
                    "border-[#611232]/25",
                    "border-[#611232]/20",
                );
            } else {
                label.textContent = fallback;
                label.classList.add("text-gray-800");
                label.classList.remove("text-[#611232]", "font-semibold");
                container?.classList.remove(
                    "border-[#611232]/60",
                    "bg-[#611232]/4",
                );
                container?.classList.add("border-[#611232]/25");
            }
        });
    });

    // ── Bloquear botón al enviar formulario ──
    const form = document.querySelector("form");
    const btnSubmit = document.getElementById("btn-submit");
    const btnText = document.getElementById("btn-text");
    const btnLoader = document.getElementById("btn-loading");

    if (form && btnSubmit) {
        form.addEventListener("submit", () => {
            btnSubmit.disabled = true;
            btnText.classList.add("hidden");
            btnLoader.classList.remove("hidden");
            btnLoader.classList.add("flex");
        });
    }
});
