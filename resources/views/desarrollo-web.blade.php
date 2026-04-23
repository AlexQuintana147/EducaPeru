@extends('layouts.app')

@section('title', 'Desarrollo Web - EducaPerú')

@section('content')
<style>
    /* ── Reset & base ── */
    .dw-page {
        background: #05050a;
        min-height: calc(100vh - 4rem);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* ── Canvas de burbujas ── */
    #bubble-canvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
    }

    /* ── Gradientes de fondo ── */
    .dw-bg-glow {
        position: absolute;
        inset: 0;
        background:
            radial-gradient(ellipse 70% 60% at 20% 50%, rgba(99,102,241,0.12) 0%, transparent 60%),
            radial-gradient(ellipse 50% 50% at 80% 30%, rgba(139,92,246,0.10) 0%, transparent 55%),
            radial-gradient(ellipse 40% 40% at 50% 90%, rgba(59,130,246,0.08) 0%, transparent 50%);
        z-index: 0;
        animation: bgPulse 8s ease-in-out infinite alternate;
    }
    @keyframes bgPulse {
        0%   { opacity: 0.7; }
        100% { opacity: 1; }
    }

    /* ── Grid sutil ── */
    .dw-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(99,102,241,0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,0.04) 1px, transparent 1px);
        background-size: 48px 48px;
        z-index: 0;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
    }

    /* ── Orbes flotantes ── */
    .dw-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        z-index: 0;
        animation: orbFloat 12s ease-in-out infinite;
    }
    .dw-orb-1 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(99,102,241,0.18) 0%, transparent 70%);
        top: -100px; left: -100px;
        animation-duration: 14s;
    }
    .dw-orb-2 {
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(139,92,246,0.15) 0%, transparent 70%);
        bottom: -80px; right: -80px;
        animation-duration: 10s;
        animation-delay: -4s;
    }
    .dw-orb-3 {
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(59,130,246,0.12) 0%, transparent 70%);
        top: 40%; right: 15%;
        animation-duration: 16s;
        animation-delay: -8s;
    }
    @keyframes orbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33%       { transform: translate(30px, -20px) scale(1.05); }
        66%       { transform: translate(-20px, 30px) scale(0.95); }
    }

    /* ── Contenido central ── */
    .dw-content {
        position: relative;
        z-index: 10;
        text-align: center;
        padding: 2rem 1.5rem;
        max-width: 680px;
        width: 100%;
        margin: 0 auto;
        animation: fadeUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(32px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Badge "Próximamente" ── */
    .dw-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 100px;
        border: 1px solid rgba(99,102,241,0.35);
        background: rgba(99,102,241,0.08);
        font-size: 11.5px;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: #a5b4fc;
        margin-bottom: 28px;
        animation: fadeUp 0.9s 0.1s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-badge-dot {
        width: 7px; height: 7px;
        border-radius: 50%;
        background: #6366f1;
        box-shadow: 0 0 8px rgba(99,102,241,0.9);
        animation: dotPulse 1.8s ease-in-out infinite;
    }
    @keyframes dotPulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50%       { transform: scale(1.5); opacity: 0.6; }
    }

    /* ── Título principal ── */
    .dw-title {
        font-size: clamp(38px, 7vw, 72px);
        font-weight: 900;
        line-height: 1.05;
        letter-spacing: -2px;
        color: #fff;
        margin-bottom: 20px;
        animation: fadeUp 0.9s 0.2s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-title-accent {
        background: linear-gradient(135deg, #6366f1 0%, #a78bfa 50%, #38bdf8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
    }
    .dw-title-outline {
        -webkit-text-stroke: 1.5px rgba(255,255,255,0.35);
        color: transparent;
    }

    /* ── Subtítulo ── */
    .dw-subtitle {
        font-size: clamp(14px, 2vw, 17px);
        color: #71717a;
        line-height: 1.75;
        max-width: 520px;
        margin: 0 auto 36px;
        animation: fadeUp 0.9s 0.3s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    /* ── Separador decorativo ── */
    .dw-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 36px;
        animation: fadeUp 0.9s 0.35s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-divider-line {
        width: 60px; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(99,102,241,0.5));
    }
    .dw-divider-line:last-child {
        background: linear-gradient(90deg, rgba(99,102,241,0.5), transparent);
    }
    .dw-divider-icon {
        width: 32px; height: 32px;
        border-radius: 8px;
        border: 1px solid rgba(99,102,241,0.3);
        background: rgba(99,102,241,0.08);
        display: flex; align-items: center; justify-content: center;
    }

    /* ── Formulario de notificación ── */
    .dw-notify-form {
        display: flex;
        gap: 10px;
        max-width: 440px;
        margin: 0 auto 28px;
        animation: fadeUp 0.9s 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-notify-input {
        flex: 1;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.09);
        border-radius: 12px;
        padding: 13px 16px;
        color: #f1f5f9;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s, background 0.2s;
        min-width: 0;
        font-family: inherit;
    }
    .dw-notify-input::placeholder { color: #3f3f46; }
    .dw-notify-input:focus {
        border-color: rgba(99,102,241,0.5);
        background: rgba(255,255,255,0.06);
    }
    .dw-notify-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 22px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 800;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        border: none;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: 0 4px 20px rgba(99,102,241,0.4);
        transition: box-shadow 0.25s, transform 0.25s;
        font-family: inherit;
    }
    .dw-notify-btn:hover {
        box-shadow: 0 8px 28px rgba(99,102,241,0.6);
        transform: translateY(-2px);
    }
    .dw-notify-btn:active { transform: translateY(0); }

    /* ── Mensaje de éxito ── */
    .dw-success {
        display: none;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 13.5px;
        color: #86efac;
        font-weight: 700;
        margin-bottom: 28px;
        animation: fadeUp 0.5s ease both;
    }
    .dw-success.show { display: flex; }

    /* ── Features preview ── */
    .dw-features {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        animation: fadeUp 0.9s 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-feature-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 14px;
        border-radius: 100px;
        border: 1px solid rgba(255,255,255,0.07);
        background: rgba(255,255,255,0.03);
        font-size: 12.5px;
        color: #71717a;
        transition: border-color 0.2s, color 0.2s, background 0.2s;
    }
    .dw-feature-pill:hover {
        border-color: rgba(99,102,241,0.3);
        color: #a5b4fc;
        background: rgba(99,102,241,0.06);
    }
    .dw-feature-pill-dot {
        width: 5px; height: 5px;
        border-radius: 50%;
        background: #6366f1;
        opacity: 0.7;
    }

    /* ── Contador regresivo ── */
    .dw-countdown {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-bottom: 36px;
        animation: fadeUp 0.9s 0.45s cubic-bezier(0.22, 1, 0.36, 1) both;
    }
    .dw-count-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        min-width: 56px;
    }
    .dw-count-num {
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 900;
        color: #fff;
        line-height: 1;
        font-variant-numeric: tabular-nums;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 10px;
        padding: 10px 14px;
        min-width: 60px;
        text-align: center;
        transition: border-color 0.3s;
    }
    .dw-count-num.tick {
        border-color: rgba(99,102,241,0.5);
    }
    .dw-count-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #52525b;
    }
    .dw-count-sep {
        font-size: 28px;
        font-weight: 900;
        color: #3f3f46;
        align-self: flex-start;
        margin-top: 10px;
    }

    /* ── Partículas flotantes decorativas ── */
    .dw-particle {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        z-index: 1;
        animation: particleFloat linear infinite;
    }
    @keyframes particleFloat {
        0%   { transform: translateY(0) rotate(0deg); opacity: 0; }
        10%  { opacity: 1; }
        90%  { opacity: 1; }
        100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
    }

    /* ── Responsive ── */
    @media (max-width: 480px) {
        .dw-notify-form { flex-direction: column; }
        .dw-notify-btn  { width: 100%; justify-content: center; }
        .dw-countdown   { gap: 8px; }
        .dw-count-num   { min-width: 48px; padding: 8px 10px; }
    }
</style>

<div class="dw-page" id="dw-page">

    {{-- Fondo --}}
    <div class="dw-bg-glow"></div>
    <div class="dw-grid"></div>
    <div class="dw-orb dw-orb-1"></div>
    <div class="dw-orb dw-orb-2"></div>
    <div class="dw-orb dw-orb-3"></div>

    {{-- Canvas de burbujas --}}
    <canvas id="bubble-canvas"></canvas>

    {{-- Contenido --}}
    <div class="dw-content">

        {{-- Badge --}}
        <div class="dw-badge">
            <span class="dw-badge-dot"></span>
            Próximamente
        </div>

        {{-- Título --}}
        <h1 class="dw-title">
            <span class="dw-title-accent">Desarrollo Web</span><br>
            <span class="dw-title-outline">profesional</span>
        </h1>

        {{-- Subtítulo --}}
        <p class="dw-subtitle">
            Estamos construyendo algo increíble. Pronto podrás cotizar y contratar
            servicios de desarrollo web a medida, con tecnologías modernas y diseño de alto impacto.
        </p>

        {{-- Divider --}}
        <div class="dw-divider">
            <div class="dw-divider-line"></div>
            <div class="dw-divider-icon">
                <svg width="14" height="14" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>
                </svg>
            </div>
            <div class="dw-divider-line"></div>
        </div>

        {{-- Countdown --}}
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

        {{-- Formulario notificación --}}
        <form class="dw-notify-form" id="dw-form" onsubmit="handleNotify(event)">
            <input
                type="email"
                class="dw-notify-input"
                placeholder="tu@correo.com"
                required
                aria-label="Correo electrónico"
            >
            <button type="submit" class="dw-notify-btn">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                </svg>
                Notificarme
            </button>
        </form>

        {{-- Éxito --}}
        <div class="dw-success" id="dw-success">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            ¡Listo! Te avisaremos cuando esté disponible.
        </div>

        {{-- Feature pills --}}
        <div class="dw-features">
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>Diseño a medida</span>
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>Laravel & Vue</span>
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>SEO optimizado</span>
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>Responsive</span>
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>Panel de administración</span>
            <span class="dw-feature-pill"><span class="dw-feature-pill-dot"></span>Soporte continuo</span>
        </div>

    </div>
</div>

<script>
(function () {
    /* ── Burbujas en canvas ── */
    const canvas = document.getElementById('bubble-canvas');
    const ctx    = canvas.getContext('2d');
    let W, H, bubbles = [];

    const COLORS = [
        'rgba(99,102,241,',
        'rgba(139,92,246,',
        'rgba(59,130,246,',
        'rgba(167,139,250,',
    ];

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function createBubble() {
        const r     = Math.random() * 28 + 6;
        const color = COLORS[Math.floor(Math.random() * COLORS.length)];
        return {
            x:     Math.random() * W,
            y:     H + r + Math.random() * 200,
            r,
            speed: Math.random() * 0.6 + 0.2,
            drift: (Math.random() - 0.5) * 0.4,
            alpha: Math.random() * 0.18 + 0.04,
            color,
            wobble:      Math.random() * Math.PI * 2,
            wobbleSpeed: Math.random() * 0.02 + 0.005,
        };
    }

    function initBubbles() {
        bubbles = [];
        const count = Math.floor(W / 18);
        for (let i = 0; i < count; i++) {
            const b = createBubble();
            b.y = Math.random() * H; // scatter on init
            bubbles.push(b);
        }
    }

    function drawBubble(b) {
        ctx.save();
        ctx.beginPath();
        ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);

        // Fill
        ctx.fillStyle = b.color + b.alpha + ')';
        ctx.fill();

        // Stroke
        ctx.strokeStyle = b.color + (b.alpha * 2.5) + ')';
        ctx.lineWidth   = 0.8;
        ctx.stroke();

        // Shine
        const shine = ctx.createRadialGradient(
            b.x - b.r * 0.3, b.y - b.r * 0.3, b.r * 0.05,
            b.x, b.y, b.r
        );
        shine.addColorStop(0, 'rgba(255,255,255,0.18)');
        shine.addColorStop(1, 'rgba(255,255,255,0)');
        ctx.fillStyle = shine;
        ctx.fill();

        ctx.restore();
    }

    function tick() {
        ctx.clearRect(0, 0, W, H);
        bubbles.forEach((b, i) => {
            b.wobble += b.wobbleSpeed;
            b.x += b.drift + Math.sin(b.wobble) * 0.3;
            b.y -= b.speed;
            drawBubble(b);
            if (b.y + b.r < 0) bubbles[i] = createBubble();
        });
        requestAnimationFrame(tick);
    }

    window.addEventListener('resize', () => { resize(); initBubbles(); });
    resize();
    initBubbles();
    tick();

    /* ── Countdown ── */
    const target = new Date();
    target.setDate(target.getDate() + 30); // 30 días desde hoy

    function pad(n) { return String(n).padStart(2, '0'); }

    function updateCountdown() {
        const now  = new Date();
        const diff = Math.max(0, target - now);

        const days  = Math.floor(diff / 86400000);
        const hours = Math.floor((diff % 86400000) / 3600000);
        const mins  = Math.floor((diff % 3600000)  / 60000);
        const secs  = Math.floor((diff % 60000)    / 1000);

        const els = {
            days:  document.getElementById('cd-days'),
            hours: document.getElementById('cd-hours'),
            mins:  document.getElementById('cd-mins'),
            secs:  document.getElementById('cd-secs'),
        };

        function setVal(el, val) {
            if (el && el.textContent !== val) {
                el.textContent = val;
                el.classList.add('tick');
                setTimeout(() => el.classList.remove('tick'), 300);
            }
        }

        setVal(els.days,  pad(days));
        setVal(els.hours, pad(hours));
        setVal(els.mins,  pad(mins));
        setVal(els.secs,  pad(secs));
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    /* ── Formulario ── */
    window.handleNotify = function(e) {
        e.preventDefault();
        const form    = document.getElementById('dw-form');
        const success = document.getElementById('dw-success');
        form.style.display    = 'none';
        success.classList.add('show');
    };

    /* ── Ajustar altura del page al viewport ── */
    function setPageHeight() {
        const page = document.getElementById('dw-page');
        if (page) {
            const navH = document.querySelector('header')?.offsetHeight || 64;
            page.style.minHeight = (window.innerHeight - navH) + 'px';
        }
    }
    setPageHeight();
    window.addEventListener('resize', setPageHeight);
})();
</script>
@endsection
