export function initCircuits() {
    const canvas = document.getElementById("circuit-bg");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    let W, H, nodes, lines, particles, raf;

    function resize() {
        W = canvas.width = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
        init();
    }

    function init() {
        nodes = [];
        lines = [];
        particles = [];
        const cols = Math.floor(W / 75);
        const rows = Math.floor(H / 75);
        for (let i = 0; i < cols; i++) {
            for (let j = 0; j < rows; j++) {
                if (Math.random() > 0.4)
                    nodes.push({
                        x: i * 75 + 38 + (Math.random() - 0.5) * 28,
                        y: j * 75 + 38 + (Math.random() - 0.5) * 28,
                        r: Math.random() * 2 + 1,
                        pulse: Math.random() * Math.PI * 2,
                    });
            }
        }
        for (let i = 0; i < nodes.length; i++) {
            for (let j = i + 1; j < nodes.length; j++) {
                const dx = nodes[j].x - nodes[i].x,
                    dy = nodes[j].y - nodes[i].y;
                if (Math.sqrt(dx * dx + dy * dy) < 120 && Math.random() > 0.5) {
                    lines.push({ a: i, b: j });
                    if (Math.random() > 0.55)
                        particles.push({
                            lineIdx: lines.length - 1,
                            t: Math.random(),
                            speed: 0.003 + Math.random() * 0.004,
                        });
                }
            }
        }
    }

    function draw(ts) {
        ctx.clearRect(0, 0, W, H);
        const t = ts * 0.001;

        ctx.lineWidth = 0.7;
        lines.forEach((l) => {
            const a = nodes[l.a],
                b = nodes[l.b],
                mx = (a.x + b.x) / 2;
            ctx.strokeStyle = "rgba(180,60,100,0.18)";
            ctx.beginPath();
            ctx.moveTo(a.x, a.y);
            ctx.lineTo(mx, a.y);
            ctx.lineTo(mx, b.y);
            ctx.lineTo(b.x, b.y);
            ctx.stroke();
        });

        nodes.forEach((n) => {
            const p = 0.5 + 0.5 * Math.sin(t * 1.1 + n.pulse);
            ctx.beginPath();
            ctx.arc(n.x, n.y, n.r + p * 1.2, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(240,160,184,${0.2 + p * 0.45})`;
            ctx.fill();
        });

        particles.forEach((p) => {
            p.t = (p.t + p.speed) % 1;
            const l = lines[p.lineIdx],
                a = nodes[l.a],
                b = nodes[l.b],
                mx = (a.x + b.x) / 2;
            let px, py;
            if (p.t < 0.33) {
                const s = p.t / 0.33;
                px = a.x + (mx - a.x) * s;
                py = a.y;
            } else if (p.t < 0.66) {
                const s = (p.t - 0.33) / 0.33;
                px = mx;
                py = a.y + (b.y - a.y) * s;
            } else {
                const s = (p.t - 0.66) / 0.34;
                px = mx + (b.x - mx) * s;
                py = b.y;
            }
            ctx.beginPath();
            ctx.arc(px, py, 2.2, 0, Math.PI * 2);
            ctx.fillStyle = "rgba(255,180,200,0.95)";
            ctx.fill();
        });

        raf = requestAnimationFrame(draw);
    }

    resize();
    window.addEventListener("resize", () => {
        cancelAnimationFrame(raf);
        resize();
        raf = requestAnimationFrame(draw);
    });
    raf = requestAnimationFrame(draw);
}
