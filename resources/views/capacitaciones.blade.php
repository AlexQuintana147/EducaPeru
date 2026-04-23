@extends('layouts.app')

@section('title', 'Capacitaciones - Instituto de Programación')

@section('content')

<style>
    .cap-body {
        background: #0a0e1a;
        min-height: 100vh;
    }

    /* Hero */
    .cap-hero {
        background: linear-gradient(180deg, #0d1224 0%, #0a0e1a 100%);
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    /* Stats bar */
    .stats-bar {
        background: rgba(255,255,255,0.03);
        border-top: 1px solid rgba(255,255,255,0.06);
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    /* Card */
    .course-card {
        background: #111827;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.07);
        transition: transform 0.3s cubic-bezier(0.4,0,0.2,1), border-color 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .course-card:hover {
        transform: translateY(-4px) scale(1.01);
        border-color: rgba(255,255,255,0.18);
        box-shadow: 0 24px 48px rgba(0,0,0,0.5);
    }

    .card-thumb {
        position: relative;
        aspect-ratio: 16/9;
        overflow: hidden;
    }
    .card-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .course-card:hover .card-thumb img {
        transform: scale(1.05);
    }
    .card-thumb-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, transparent 40%, rgba(0,0,0,0.7) 100%);
    }

    /* Badge */
    .badge {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 11px;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 20px;
        letter-spacing: 0.03em;
    }
    .badge-soon {
        background: linear-gradient(135deg, #f59e0b, #f97316);
        color: #fff;
        box-shadow: 0 4px 12px rgba(249,115,22,0.5);
    }
    .badge-free {
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        box-shadow: 0 4px 12px rgba(16,185,129,0.5);
    }
    .badge-new {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        box-shadow: 0 4px 12px rgba(99,102,241,0.5);
    }

    /* Card body */
    .card-body {
        padding: 16px 18px 18px;
    }
    .card-level {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #6366f1;
        margin-bottom: 6px;
    }
    .card-title {
        font-size: 15px;
        font-weight: 800;
        color: #f1f5f9;
        line-height: 1.35;
        margin-bottom: 6px;
    }
    .card-desc {
        font-size: 12.5px;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 14px;
    }
    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid rgba(255,255,255,0.06);
        padding-top: 12px;
    }
    .card-price-old {
        font-size: 12px;
        color: #475569;
        text-decoration: line-through;
    }
    .card-price {
        font-size: 18px;
        font-weight: 900;
        color: #f97316;
    }
    .card-duration {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        color: #475569;
    }

    /* C++ card special */
    .cpp-thumb {
        aspect-ratio: 16/9;
        position: relative;
        overflow: hidden;
        background: #020617;
    }
    .cpp-code-bg {
        position: absolute;
        inset: 0;
        font-family: 'Courier New', monospace;
        font-size: 11px;
        line-height: 1.6;
        padding: 14px;
        color: rgba(148,163,184,0.15);
        overflow: hidden;
        user-select: none;
    }
    .cpp-center {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }
    .cpp-logo {
        font-size: 52px;
        font-weight: 900;
        color: #fff;
        letter-spacing: -2px;
        line-height: 1;
        text-shadow: 0 0 30px rgba(99,102,241,0.8), 0 0 60px rgba(99,102,241,0.4);
        animation: cpp-pulse 3s ease-in-out infinite;
    }
    @keyframes cpp-pulse {
        0%,100% { text-shadow: 0 0 30px rgba(99,102,241,0.8), 0 0 60px rgba(99,102,241,0.4); }
        50% { text-shadow: 0 0 50px rgba(139,92,246,1), 0 0 100px rgba(99,102,241,0.6); }
    }
    .cpp-sub {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #6366f1;
        margin-top: 4px;
    }
    .cpp-grid-bg {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(99,102,241,0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,0.06) 1px, transparent 1px);
        background-size: 30px 30px;
    }
    .cpp-glow-orb {
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(99,102,241,0.3) 0%, transparent 70%);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: orb-pulse 3s ease-in-out infinite;
    }
    @keyframes orb-pulse {
        0%,100% { transform: translate(-50%,-50%) scale(1); opacity: 0.6; }
        50% { transform: translate(-50%,-50%) scale(1.3); opacity: 1; }
    }

    /* Disabled btn */
    .btn-soon {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        text-align: center;
        background: rgba(99,102,241,0.1);
        color: #6366f1;
        border: 1px solid rgba(99,102,241,0.25);
        cursor: not-allowed;
        letter-spacing: 0.05em;
    }
    .btn-detail {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        text-align: center;
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        border: none;
        cursor: pointer;
        transition: all 0.25s ease;
        display: block;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(249,115,22,0.35);
    }
    .btn-detail:hover {
        background: linear-gradient(135deg, #ea580c, #c2410c);
        box-shadow: 0 8px 24px rgba(249,115,22,0.5);
        transform: translateY(-1px);
    }

    /* Section title */
    .section-title {
        font-size: clamp(22px, 4vw, 32px);
        font-weight: 900;
        color: #f1f5f9;
        letter-spacing: -0.02em;
    }
    .section-sub {
        font-size: 14px;
        color: #475569;
        margin-top: 4px;
    }

    /* Filter pills */
    .pill {
        font-size: 13px;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.1);
        color: #64748b;
        background: transparent;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .pill:hover {
        border-color: rgba(99,102,241,0.5);
        color: #a5b4fc;
    }
    .pill.active {
        background: #6366f1;
        border-color: #6366f1;
        color: #fff;
        box-shadow: 0 4px 12px rgba(99,102,241,0.4);
    }

    /* CTA */
    .cta-section {
        background: linear-gradient(135deg, #0d1224 0%, #111827 100%);
        border-top: 1px solid rgba(255,255,255,0.06);
    }
    .cta-card {
        background: linear-gradient(135deg, rgba(99,102,241,0.12), rgba(139,92,246,0.08));
        border: 1px solid rgba(99,102,241,0.2);
        border-radius: 24px;
        padding: 48px 32px;
    }

    /* Notify input */
    .notify-input {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        padding: 12px 16px;
        color: #f1f5f9;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
        width: 100%;
    }
    .notify-input::placeholder { color: #475569; }
    .notify-input:focus { border-color: rgba(99,102,241,0.5); }
    .notify-btn {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        font-weight: 800;
        font-size: 14px;
        padding: 12px 24px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.25s ease;
        box-shadow: 0 4px 14px rgba(99,102,241,0.4);
    }
    .notify-btn:hover {
        box-shadow: 0 8px 24px rgba(99,102,241,0.6);
        transform: translateY(-1px);
    }
</style>

<div class="cap-body">

    {{-- ===== HERO ===== --}}
    <section class="cap-hero py-16 sm:py-20 md:py-24 px-4 sm:px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-indigo-400 mb-5">
                <span class="w-6 h-px bg-indigo-500"></span>
                Plataforma de capacitación
                <span class="w-6 h-px bg-indigo-500"></span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black text-white leading-tight tracking-tight mb-5">
                Aprende las tecnologías<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">
                    más demandadas
                </span>
            </h1>
            <p class="text-slate-400 text-base sm:text-lg max-w-xl mx-auto mb-8">
                Cursos prácticos con instructores expertos. Desde cero hasta nivel profesional.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="#cursos" class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-7 py-3.5 rounded-full transition-all duration-200 shadow-lg shadow-indigo-900/50 text-sm">
                    Acceder a los cursos
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 bg-white/5 hover:bg-white/10 text-white font-bold px-7 py-3.5 rounded-full border border-white/10 transition-all duration-200 text-sm">
                    Solicitar información
                </a>
            </div>
        </div>
    </section>

    {{-- ===== STATS BAR ===== --}}
    <div class="stats-bar py-4 px-4">
        <div class="max-w-3xl mx-auto flex flex-wrap items-center justify-center gap-6 sm:gap-12">
            <div class="flex items-center gap-2">
                <span class="text-xl font-black text-white">+10</span>
                <span class="text-slate-500 text-sm">cursos en planeación</span>
            </div>
            <div class="w-px h-4 bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-2">
                <span class="text-xl font-black text-white">+200h</span>
                <span class="text-slate-500 text-sm">de aprendimiento</span>
            </div>
            <div class="w-px h-4 bg-white/10 hidden sm:block"></div>
            <div class="flex items-center gap-2">
                <span class="text-xl font-black text-white">+50</span>
                <span class="text-slate-500 text-sm">estudiantes</span>
            </div>
        </div>
    </div>

    {{-- ===== COURSES SECTION ===== --}}
    <section id="cursos" class="py-12 sm:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">

            {{-- Header + filters --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="section-title">Todos los cursos</h2>
                    <p class="section-sub">Elige tu próximo aprendizaje</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="pill active">Todos</button>
                    <button class="pill">Básico</button>
                    <button class="pill">Intermedio</button>
                    <button class="pill">Próximamente</button>
                </div>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">

                {{-- ---- Card: Ofimática ---- --}}
                <div class="course-card">
                    <div class="card-thumb">
                        <img src="{{ asset('image/clases1.webp') }}" alt="Ofimática Profesional">
                        <div class="card-thumb-overlay"></div>
                        <span class="badge badge-soon">✦ Próximamente</span>
                    </div>
                    <div class="card-body">
                        <div class="card-level">Ofimática · Básico</div>
                        <div class="card-title">Ofimática Profesional</div>
                        <div class="card-desc">Word, PowerPoint y Excel desde cero hasta nivel avanzado.</div>
                        <div class="card-footer mb-3">
                            <div>
                                <div class="card-price-old">S/ 100.00</div>
                                <div class="card-price">S/ 49.90</div>
                            </div>
                            <div class="card-duration">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                02 meses
                            </div>
                        </div>
                        <a href="#" class="btn-detail">Ver detalle</a>
                    </div>
                </div>

                {{-- ---- Card: C++ (Próximamente) ---- --}}
                <div class="course-card">
                    <div class="cpp-thumb">
                        <div class="cpp-grid-bg"></div>
                        <div class="cpp-glow-orb"></div>
                        <div class="cpp-code-bg" aria-hidden="true">
                            #include &lt;iostream&gt;<br>
                            #include &lt;vector&gt;<br>
                            using namespace std;<br><br>
                            class Programa {<br>
                            &nbsp;&nbsp;public:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;void ejecutar() {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cout &lt;&lt; "C++";<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                            };<br><br>
                            int main() {<br>
                            &nbsp;&nbsp;Programa p;<br>
                            &nbsp;&nbsp;p.ejecutar();<br>
                            &nbsp;&nbsp;return 0;<br>
                            }
                        </div>
                        <div class="cpp-center">
                            <div class="cpp-logo">C++</div>
                            <div class="cpp-sub">Programación</div>
                        </div>
                        <span class="badge badge-soon">✦ Próximamente</span>
                    </div>
                    <div class="card-body">
                        <div class="card-level" style="color:#818cf8;">Programación · Intermedio</div>
                        <div class="card-title">Programación en C++</div>
                        <div class="card-desc">Fundamentos, POO y estructuras de datos con C++ moderno.</div>
                        <div class="card-footer mb-3">
                            <div>
                                <div class="card-price-old">Precio por confirmar</div>
                                <div class="card-price" style="color:#818cf8;">Muy pronto</div>
                            </div>
                            <div class="card-duration">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                02 meses
                            </div>
                        </div>
                        <div class="btn-soon">Próximamente</div>
                    </div>
                </div>

                {{-- ---- Placeholder cards (coming soon) ---- --}}
                @for ($i = 0; $i < 2; $i++)
                <div class="course-card opacity-40">
                    <div class="cpp-thumb" style="background:#0d1117;">
                        <div class="cpp-grid-bg"></div>
                        <div class="cpp-center">
                            <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <div class="text-slate-600 text-xs font-bold mt-2 tracking-widest uppercase">Próximamente</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-level" style="color:#334155;">Nuevo curso</div>
                        <div class="card-title" style="color:#334155;">En preparación...</div>
                        <div class="card-desc">Estamos preparando contenido de calidad para ti.</div>
                        <div class="card-footer mb-3">
                            <div class="card-price" style="color:#334155;">—</div>
                        </div>
                        <div class="btn-soon" style="color:#334155; border-color:rgba(51,65,85,0.3);">Próximamente</div>
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </section>

</div>

@endsection
