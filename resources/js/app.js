import "./bootstrap";
import { initCircuits } from "./circuits.js";
import { initModulos } from "./modules.js";

document.addEventListener("DOMContentLoaded", () => {
    initCircuits();

    const btn = document.getElementById("menu-btn");
    const menu = document.getElementById("navbar-cta");

    if (!btn || !menu) return;

    btn.addEventListener("click", () => {
        const isOpen = !menu.classList.contains("hidden");
        menu.classList.toggle("hidden", isOpen);
        btn.setAttribute("aria-expanded", String(!isOpen));
    });
    initModulos();
});
