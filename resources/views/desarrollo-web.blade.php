@extends('layouts.app')

@section('title', 'Desarrollo Web - EducaPerú')

@section('content')
<style>
    /* ── Base ── */
    .dw-page {
        background: #080808;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ── Canvas burbujas ── */
    #bubble-canvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    /* ── Noise texture overlay ── */
    .dw-noise {
        position: absolute;
        inset: 0;
        opacity: 0.03;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        background-size: 200px 200px;
        z-index: 1;
        pointer-events: none;
    }

    /* ── Glow central sutil ── */
    .dw-center-glow {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 65%);
        z-index: 1;
        pointer-events: none;
    }

    /* ── Layout de 3 columnas ── */
    .dw-layout {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 260px 1fr 260px;
        gap: 32px;
        align-items: center;
    }

    /* ── Panel lateral ── */
    .dw-side {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .dw-side-card {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 16px;
        padding: 18px 20px;
        transition: border-color 0.3s, background 0.3s;
        animation: fadeUp 0.8s cubic-bezier(0.22,1,0.36,1) both;
    }
    .dw-side-card:hover {
        border-color: rgba(255,255,255,0.18);
        background: rgba(255,255,255,0.05);
    }
    .dw-side-card-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 12px;
    }
    .dw-side-card-title {
        font-size: 13px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 5px;
        letter-spacing: -0.2px;
    }
    .dw-side-card-desc {
        font-size: 12px;
        color: #52525b;
        line-height: 1.6;
    }
    .dw-side-card-stat {
        font-size: 22px;
        font-weight: 900;
        color: #fff;
        letter-spacing: -1px;
        margin-bottom: 2px;
    }
    .dw-side-card-stat-label {
        font-size: 11px;
        color: #52525b;
        font-weight: 600;
        letter-spacing: 0.05em;
    }

    /* Delay escalonado para los cards laterales */
    .dw-side-card:nth-child(1) { animation-delay: 0.1s; }
    .dw-side-card:nth-child(2) { animation-delay: 0.2s; }
    .dw-side-card:nth-child(3) { animation-delay: 0.3s; }
    .dw-side-card:nth-child(4) { animation-delay: 0.4s; }

    /* ── Hero central ── */
    .dw-hero {
        text-align: center;
        padding: 48px 0;
    }

    /* Badge */
    .dw-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 5px 14px;
        border-radius: 100px;
        border: 1px solid rgba(255,255,255,0.12);
        background: rgba(255,255,255,0.04);
        font-size: 10.5px;
        font-weight: 800;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #a1a1aa;
        margin-bottom: 24px;
        animation: fadeUp 0.8s 0.05s cubic-bezier(0.22,1,0.36,1) both;
    }
    .dw-badge-dot {
        width: 6px; height: 6px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 0 8px rgba(255,255,255,0.8);
        animation: dotPulse 2s ease-in-out infinite;
    }
    @keyframes dotPulse {
        0%,100% { transform: scale(1); opacity: 1; }
        50%      { transform: scale(1.6); opacity: 0.5; }
    }

    /* Título */
    .dw-title {
        font-size: clamp(42px, 5.5vw, 80px);
        font-weight: 900;
        line-height: 1.0;
        letter-spacing: -3px;
        color: #fff;
        margin-bottom: 6px;
        animation: fadeUp 0.8s 0.15s cubic-bezier(0.22,1,0.36,1) both;
    }
    .dw-title-sub {
        font-size: clamp(38px, 5vw, 72px);
        font-weight: 900;
        line-height: 1.0;
        letter-spacing: -3px;
        -webkit-text-stroke: 1px rgba(255,255,255,0.25);
        color: transparent;
        margin-bottom: 28px;
        animation: fadeUp 0.8s 0.2s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* Línea divisora */
    .dw-rule {
        width: 40px;
        height: 1px;
        background: rgba(255,255,255,0.15);
        margin: 0 auto 24px;
        animation: fadeUp 0.8s 0.25s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* Subtítulo */
    .dw-subtitle {
        font-size: 15px;
        color: #52525b;
        line-height: 1.75;
        max-width: 420px;
        margin: 0 auto 32px;
        animation: fadeUp 0.8s 0.28s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* Countdown */
    .dw-countdown {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 32px;
        animation: fadeUp 0.8s 0.32s cubic-bezier(0.22,1,0.36,1) both;
    }
    .dw-count-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }
    .dw-count-num {
        font-size: clamp(28px, 3.5vw, 44px);
        font-weight: 900;
        color: #fff;
        line-height: 1;
        font-variant-numeric: tabular-nums;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 12px;
        padding: 12px 16px;
        min-width: 68px;
        text-align: center;
        letter-spacing: -1px;
        transition: border-color 0.3s;
    }
    .dw-count-num.tick { border-color: rgba(255,255,255,0.35); }
    .dw-count-label {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #3f3f46;
    }
    .dw-count-sep {
        font-size: 32px;
        font-weight: 900;
        color: #27272a;
        margin-top: 12px;
        line-height: 1;
    }

    /* Form */
    .dw-form {
        display: flex;
        gap: 8px;
        max-width: 400px;
        margin: 0 auto 20px;
        animation: fadeUp 0.8s 0.38s cubic-bezier(0.22,1,0.36,1) both;
    }
    .dw-input {
        flex: 1;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        padding: 12px 15px;
        color: #fff;
        font-size: 13.5px;
        outline: none;
        transition: border-color 0.2s, background 0.2s;
        min-width: 0;
        font-family: inherit;
    }
    .dw-input::placeholder { color: #3f3f46; }
    .dw-input:focus {
        border-color: rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.07);
    }
    .dw-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 12px 20px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 800;
        background: #fff;
        color: #080808;
        border: none;
        cursor: pointer;
        white-space: nowrap;
        font-family: inherit;
        transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 20px rgba(255,255,255,0.15);
    }
    .dw-btn:hover {
        background: #e4e4e7;
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(255,255,255,0.2);
    }
    .dw-btn:active { transform: translateY(0); }

    /* Success */
    .dw-success {
        display: none;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 13px;
        color: #a1a1aa;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeUp 0.5s ease both;
    }
    .dw-success.show { display: flex; }

    /* Nota inferior */
    .dw-note {
        font-size: 11.5px;
        color: #3f3f46;
        animation: fadeUp 0.8s 0.42s cubic-bezier(0.22,1,0.36,1) both;
    }

    /* ── Animaciones ── */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Responsive: ocultar laterales en pantallas pequeñas ── */
    @media (max-width: 1024px) {
        .dw-layout {
            grid-template-columns: 1fr;
        }
        .dw-side { display: none; }
        .dw-hero { padding: 40px 0; }
    }
    @media (max-width: 480px) {
        .dw-form { flex-direction: column; }
        .dw-btn  { width: 100%; justify-content: center; }
        .dw-countdown { gap: 6px; }
        .dw-count-num { min-width: 54px; padding: 10px 12px; }
    }
</style>

<div class="dw-page" id="dw-page">

    <canvas id="bubble-canvas"></canvas>
    <div class="dw-noise"></div>
    <div class="dw-center-glow"></div>

    <div class="dw-layout">

        {{-- ── Panel izquierdo ── --}}
        <div class="dw-side">

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 9h18M9 21V9"/></svg>
                </div>
                <div class="dw-side-card-title">Diseño a medida</div>
                <div class="dw-side-card-desc">Cada proyecto es único. Creamos interfaces que reflejan la identidad de tu marca.</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                </div>
                <div class="dw-side-card-stat">+40</div>
                <div class="dw-side-card-stat-label">Proyectos entregados</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                </div>
                <div class="dw-side-card-title">Entrega puntual</div>
                <div class="dw-side-card-desc">Cumplimos plazos sin sacrificar calidad. Tu tiempo es nuestra prioridad.</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="dw-side-card-title">Seguridad garantizada</div>
                <div class="dw-side-card-desc">Código limpio, buenas prácticas y protección desde el primer día.</div>
            </div>

        </div>

        {{-- ── Hero central ── --}}
        <div class="dw-hero">

            <div class="dw-badge">
                <span class="dw-badge-dot"></span>
                Próximamente
            </div>

            <h1 class="dw-title">Desarrollo Web</h1>
            <p class="dw-title-sub">profesional</p>

            <div class="dw-rule"></div>

            <p class="dw-subtitle">
                Estamos construyendo algo que va a marcar la diferencia.
                Pronto podrás cotizar y contratar tu proyecto web con nosotros.
            </p>

            <div class="dw-countdown" id="dw-countdown">
                <div class="dw-count-block">
                    <div class="dw-count-num" id="cd-days">00</div>
                    <div class="dw-count-label">Días</div>
                </div>
                <div class="dw-count-sep">:</div>
                <div class="dw-count-block">
                    <div class="dw-count-num" id="cd-hours">00</div>
                    <div class="dw-count-label">Horas</div>
                </div>
                <div class="dw-count-sep">:</div>
                <div class="dw-count-block">
                    <div class="dw-count-num" id="cd-mins">00</div>
                    <div class="dw-count-label">Minutos</div>
                </div>
                <div class="dw-count-sep">:</div>
                <div class="dw-count-block">
                    <div class="dw-count-num" id="cd-secs">00</div>
                    <div class="dw-count-label">Segundos</div>
                </div>
            </div>

            <form class="dw-form" id="dw-form" onsubmit="handleNotify(event)">
                <input type="email" class="dw-input" placeholder="tu@correo.com" required aria-label="Correo electrónico">
                <button type="submit" class="dw-btn">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    Notificarme
                </button>
            </form>

            <div class="dw-success" id="dw-success">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                Te avisaremos cuando esté disponible.
            </div>

            <p class="dw-note">Sin spam. Solo te avisamos cuando lancemos.</p>

        </div>

        {{-- ── Panel derecho ── --}}
        <div class="dw-side">

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <div class="dw-side-card-stat">100%</div>
                <div class="dw-side-card-stat-label">Clientes satisfechos</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
                </div>
                <div class="dw-side-card-title">SEO & Performance</div>
                <div class="dw-side-card-desc">Sitios rápidos, optimizados para buscadores y con métricas de alto rendimiento.</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                </div>
                <div class="dw-side-card-title">100% Responsive</div>
                <div class="dw-side-card-desc">Perfecto en cualquier dispositivo. Móvil, tablet y escritorio sin compromisos.</div>
            </div>

            <div class="dw-side-card">
                <div class="dw-side-card-icon">
                    <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div class="dw-side-card-title">Soporte continuo</div>
                <div class="dw-side-card-desc">Acompañamiento post-lanzamiento. Estamos contigo mucho más allá de la entrega.</div>
            </div>

        </div>

    </div>
</div>

<script>
(function () {
    /* ── Canvas burbujas ── */
    const canvas = document.getElementById('bubble-canvas');
    const ctx    = canvas.getContext('2d');
    let W, H, bubbles = [];

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function createBubble() {
        const r = Math.random() * 8 + 2;
        let x;
        const zone = Math.random();
        if (zone < 0.4)       x = Math.random() * W * 0.28;
        else if (zone < 0.8)  x = W * 0.72 + Math.random() * W * 0.28;
        else                  x = Math.random() * W;

        return {
            x, r,
            y:           H + r + Math.random() * 150,
            speed:       Math.random() * 0.4 + 0.1,
            drift:       (Math.random() - 0.5) * 0.25,
            alpha:       Math.random() * 0.09 + 0.02,
            wobble:      Math.random() * Math.PI * 2,
            wobbleSpeed: Math.random() * 0.015 + 0.003,
        };
    }

    function initBubbles() {
        bubbles = [];
        const count = Math.floor(W / 32);
        for (let i = 0; i < count; i++) {
            const b = createBubble();
            b.y = Math.random() * H;
            bubbles.push(b);
        }
    }

    function drawBubble(b) {
        ctx.save();
        ctx.beginPath();
        ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(0,0,0,' + b.alpha + ')';
        ctx.fill();
        ctx.strokeStyle = 'rgba(255,255,255,' + (b.alpha * 5) + ')';
        ctx.lineWidth = 0.8;
        ctx.stroke();
        const shine = ctx.createRadialGradient(b.x - b.r * 0.3, b.y - b.r * 0.3, b.r * 0.05, b.x, b.y, b.r);
        shine.addColorStop(0, 'rgba(255,255,255,0.12)');
        shine.addColorStop(1, 'rgba(255,255,255,0)');
        ctx.fillStyle = shine;
        ctx.fill();
        ctx.restore();
    }

    function tick() {
        ctx.clearRect(0, 0, W, H);
        bubbles.forEach((b, i) => {
            b.wobble += b.wobbleSpeed;
            b.x += b.drift + Math.sin(b.wobble) * 0.25;
            b.y -= b.speed;
            drawBubble(b);
            if (b.y + b.r < 0) bubbles[i] = createBubble();
        });
        requestAnimationFrame(tick);
    }

    window.addEventListener('resize', () => { resize(); initBubbles(); });
    resize(); initBubbles(); tick();

    /* ── Countdown ── */
    const target = new Date('2026-06-01T00:00:00');

    function pad(n) { return String(n).padStart(2, '0'); }

    function updateCountdown() {
        const diff  = Math.max(0, target - new Date());
        const days  = Math.floor(diff / 86400000);
        const hours = Math.floor((diff % 86400000) / 3600000);
        const mins  = Math.floor((diff % 3600000)  / 60000);
        const secs  = Math.floor((diff % 60000)    / 1000);

        [['cd-days', days], ['cd-hours', hours], ['cd-mins', mins], ['cd-secs', secs]].forEach(([id, val]) => {
            const el = document.getElementById(id);
            const v  = pad(val);
            if (el && el.textContent !== v) {
                el.textContent = v;
                el.classList.add('tick');
                setTimeout(() => el.classList.remove('tick'), 300);
            }
        });
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);

    /* ── Form ── */
    window.handleNotify = function(e) {
        e.preventDefault();
        document.getElementById('dw-form').style.display = 'none';
        document.getElementById('dw-success').classList.add('show');
    };

    /* ── Altura ── */
    function setHeight() {
        const page = document.getElementById('dw-page');
        if (page) {
            const navH = document.querySelector('header')?.offsetHeight || 64;
            page.style.minHeight = (window.innerHeight - navH) + 'px';
        }
    }
    setHeight();
    window.addEventListener('resize', setHeight);
})();
</script>
@endsection
