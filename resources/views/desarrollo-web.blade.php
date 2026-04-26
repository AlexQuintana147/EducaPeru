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
    /* .dw-side-card:hover {
        border-color: rgba(255,255,255,0.18);
        background: rgba(255,255,255,0.05);
    } */
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
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">Diseño a medida</div>
                    <svg width="20" height="20" fill="#fff" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><polygon points="9 17.41 9 27 18.59 27 16.59 25 11 25 11 19.41 9 17.41"/><path d="M34.87,32.29,32,29.38V32H4V27.85H6v-1.6H4V19.6H6V18H4V11.6H6V10H4V4.41L19.94,20.26V17.44L3.71,1.29A1,1,0,0,0,2,2V33a1,1,0,0,0,1,1H34.16a1,1,0,0,0,.71-1.71Z"/><path d="M24,30h4a2,2,0,0,0,2-2V8.7L27.7,4.47a2,2,0,0,0-1.76-1h0a2,2,0,0,0-1.76,1.08L22,8.72V28A2,2,0,0,0,24,30ZM24,9.2l1.94-3.77L28,9.21V24H24Zm0,16.43h4v2.44H24Z"/></svg>
                </div>
                <div class="dw-side-card-desc">Cada proyecto es único. Creamos interfaces que reflejan la identidad de tu marca.</div>
            </div>
            <div class="dw-side-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">Entrega puntual</div>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><path d="M10.4608 12.7593C10.0415 13.1187 9.41017 13.0701 9.05074 12.6508C8.69132 12.2315 8.73988 11.6002 9.15921 11.2408L12.6592 8.24076C13.0785 7.88134 13.7098 7.9299 14.0693 8.34923C14.4287 8.76855 14.3801 9.39985 13.9608 9.75927L10.4608 12.7593Z"/><path d="M8.81 6C8.81 5.44772 9.25772 5 9.81 5C10.3623 5 10.81 5.44772 10.81 6V12C10.81 12.5523 10.3623 13 9.81 13C9.25772 13 8.81 12.5523 8.81 12V6Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M2 10C2 14.4183 5.58172 18 10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10ZM16 10C16 13.3137 13.3137 16 10 16C6.68629 16 4 13.3137 4 10C4 6.68629 6.68629 4 10 4C13.3137 4 16 6.68629 16 10Z"/></svg>
                </div>
                <div class="dw-side-card-desc">Cumplimos plazos sin sacrificar calidad. Tu tiempo es nuestra prioridad.</div>
            </div>

            <div class="dw-side-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">Seguridad garantizada</div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>
                </div>
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

            <a href="/capacitaciones" class="dw-btn" style="text-decoration: none; display: inline-flex;">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M13 5H3v14h10m0-4h8v-8h-8"/></svg>
                Ir al curso
            </a>



        </div>

        {{-- ── Panel derecho ── --}}
        <div class="dw-side">
            <div class="dw-side-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">SEO & Performance</div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><g><path d="M22.5,2h-21C0.7,2,0,2.7,0,3.5v13C0,17.3,0.7,18,1.5,18H9v3H7.5C7.2,21,7,21.2,7,21.5S7.2,22,7.5,22h9c0.3,0,0.5-0.2,0.5-0.5S16.8,21,16.5,21H15v-3h7.5c0.8,0,1.5-0.7,1.5-1.5v-13C24,2.7,23.3,2,22.5,2z M14,21h-4v-3h4V21z M23,16.5c0,0.3-0.2,0.5-0.5,0.5h-21C1.2,17,1,16.8,1,16.5V15h22V16.5z M12,12c-1.1,0-2,0.9-2,2H5c0.3-3.6,3.3-6.5,7-6.5c1.2,0,2.2,0.3,3.2,0.8l-2.7,3.8C12.4,12,12.2,12,12,12z M11,14c0-0.6,0.4-1,1-1s1,0.4,1,1H11z M13.4,12.6l2.6-3.8c1.7,1.2,2.8,3.1,2.9,5.2h-5C14,13.4,13.8,12.9,13.4,12.6z M20,14c-0.3-4.2-3.7-7.5-8-7.5S4.3,9.8,4,14H3c0.3-4.7,4.2-8.5,9-8.5c4.8,0,8.7,3.8,9,8.5H20z M23,14h-1c-0.3-5.3-4.6-9.5-10-9.5C6.7,4.5,2.3,8.7,2,14H1V3.5C1,3.2,1.2,3,1.5,3h21C22.8,3,23,3.2,23,3.5V14z"/><path d="M5.5,5h-3C2.2,5,2,4.8,2,4.5S2.2,4,2.5,4h3C5.8,4,6,4.2,6,4.5S5.8,5,5.5,5z"/><path d="M3.5,7h-1C2.2,7,2,6.8,2,6.5S2.2,6,2.5,6h1C3.8,6,4,6.2,4,6.5S3.8,7,3.5,7z"/><path d="M21.5,5h-3C18.2,5,18,4.8,18,4.5S18.2,4,18.5,4h3C21.8,4,22,4.2,22,4.5S21.8,5,21.5,5z"/><path d="M21.5,7h-1C20.2,7,20,6.8,20,6.5S20.2,6,20.5,6h1C21.8,6,22,6.2,22,6.5S21.8,7,21.5,7z"/></g></svg>
                </div>
                <div class="dw-side-card-desc">Sitios rápidos, optimizados para buscadores y con métricas de alto rendimiento.</div>
            </div>

            <div class="dw-side-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">100% Responsive</div>
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><path d="M25 24.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zM23.5 12h2c.277 0 .5.223.5.5s-.223.5-.5.5h-2c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zm-3-2c-.822 0-1.5.678-1.5 1.5v14c0 .822.678 1.5 1.5 1.5h8c.822 0 1.5-.678 1.5-1.5v-14c0-.822-.678-1.5-1.5-1.5zm0 1h8c.286 0 .5.214.5.5v14c0 .286-.214.5-.5.5h-8c-.286 0-.5-.214-.5-.5v-14c0-.286.214-.5.5-.5zM14 19.5c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zM1.5 3C.678 3 0 3.678 0 4.5v16c0 .822.678 1.5 1.5 1.5H11v2H9.5c-.277 0-.5.223-.5.5s.223.5.5.5h8c.277 0 .5-.223.5-.5s-.223-.5-.5-.5H16v-2h1.5c.668 0 .656-1 0-1h-16c-.286 0-.5-.214-.5-.5V18h16.5c.277 0 .5-.223.5-.5s-.223-.5-.5-.5H1V4.5c0-.286.214-.5.5-.5h24c.286 0 .5.214.5.5v4c0 .665 1 .657 1 0v-4c0-.822-.678-1.5-1.5-1.5zM12 22h3v2h-3z"/></svg>
                </div>
                <div class="dw-side-card-desc">Perfecto en cualquier dispositivo. Móvil, tablet y escritorio sin compromisos.</div>
            </div>

            <div class="dw-side-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <div class="dw-side-card-title" style="margin-bottom:0;">Soporte continuo</div>
                    <svg width="20" height="20" viewBox="0 0 512 512" fill="#fff" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;opacity:0.7;"><path d="M450.697,0H61.303C27.501,0,0,27.501,0,61.303v389.392C0,484.499,27.501,512,61.303,512h389.392C484.499,512,512,484.499,512,450.697V61.303C512,27.501,484.499,0,450.697,0z M491.602,450.697c0,22.555-18.349,40.905-40.905,40.905H61.303c-22.556,0-40.905-18.35-40.905-40.905V61.303c0-22.555,18.349-40.905,40.905-40.905h389.392c22.557,0,40.906,18.35,40.906,40.905V450.697z"/><path d="M445.389,378.602l-91.291-91.291c-2.619-2.618-6.453-3.614-10.014-2.595l-13.596,3.885c-1.016,0.291-1.981,0.736-2.86,1.323l-13.983,9.33c-0.002,0.001-0.004,0.003-0.006,0.004l-19.337,12.903c-39.161-26.378-73.028-60.962-98.588-100.667l13.669-13.669c0.002-0.002,0.003-0.003,0.005-0.005l11.658-11.657c1.225-1.226,2.118-2.744,2.595-4.41l3.885-13.597c1.018-3.562,0.023-7.394-2.595-10.014l-91.292-91.29c-2.827-2.827-7.046-3.741-10.794-2.338l-15.539,5.827c-1.363,0.511-2.601,1.309-3.631,2.338c-3.472,3.473-6.812,7.21-9.925,11.108c-42.09,52.695-37.823,128.439,9.925,176.186l148.59,148.59c25.76,25.76,59.659,38.865,93.699,38.863c29.058-0.002,58.221-9.555,82.487-28.937c3.898-3.114,7.635-6.453,11.108-9.925c1.029-1.03,1.827-2.267,2.338-3.631l5.828-15.539C449.131,385.65,448.216,381.43,445.389,378.602z"/><path d="M471.203,253.96c-5.632,0-10.199,4.566-10.199,10.199v5.1c0,5.633,4.567,10.199,10.199,10.199c5.632,0,10.199-4.566,10.199-10.199v-5.1C481.402,258.526,476.835,253.96,471.203,253.96z"/><path d="M471.203,53.036c-5.632,0-10.199,4.566-10.199,10.199v162.167c0,5.633,4.567,10.199,10.199,10.199c5.632,0,10.199-4.566,10.199-10.199V63.235C481.402,57.602,476.835,53.036,471.203,53.036z"/></svg>
                </div>
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
