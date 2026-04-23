@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')
<style>
    .pg { background: #09090b; min-height: 100vh; }

    /* Hero */
    .hero-wrap {
        background: radial-gradient(ellipse 80% 50% at 50% -10%, rgba(99,102,241,0.18) 0%, transparent 70%),
                    #09090b;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    /* Stats */
    .stat-sep { width:1px; height:16px; background:rgba(255,255,255,0.08); }

    /* Grid */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }

    /* Card */
    .c-card {
        background: #111113;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 14px;
        overflow: hidden;
        transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
    }
    .c-card:hover {
        border-color: rgba(255,255,255,0.14);
        box-shadow: 0 16px 40px rgba(0,0,0,0.6);
    }

    /* Thumb */
    .c-thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        background: #0d0d0f;
    }
    .c-thumb img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform .4s ease;
        display: block;
    }
    .c-card:hover .c-thumb img { transform: none; }
    .c-thumb-dim {
        position: absolute; inset: 0;
        background: linear-gradient(180deg, transparent 50%, rgba(0,0,0,0.55) 100%);
    }

    /* C++ thumb */
    .cpp-thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        overflow: hidden;
        background: #05050a;
    }
    .cpp-grid {
        position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(99,102,241,0.07) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,0.07) 1px, transparent 1px);
        background-size: 28px 28px;
    }
    .cpp-orb {
        position: absolute;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(99,102,241,0.25) 0%, transparent 70%);
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        animation: orb 3s ease-in-out infinite;
    }
    @keyframes orb {
        0%,100% { transform: translate(-50%,-50%) scale(1); opacity:.6; }
        50%      { transform: translate(-50%,-50%) scale(1.25); opacity:1; }
    }
    .cpp-code {
        position: absolute; inset: 0;
        font-family: 'Courier New', monospace;
        font-size: 10.5px; line-height: 1.65;
        padding: 14px;
        color: rgba(148,163,184,0.12);
        overflow: hidden;
        user-select: none;
        pointer-events: none;
    }
    .cpp-label {
        position: absolute; inset: 0;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        z-index: 2;
    }
    .cpp-text {
        font-size: 48px; font-weight: 900;
        color: #fff; letter-spacing: -2px; line-height: 1;
        text-shadow: 0 0 28px rgba(99,102,241,.9), 0 0 56px rgba(99,102,241,.4);
        animation: glow 3s ease-in-out infinite;
    }
    @keyframes glow {
        0%,100% { text-shadow: 0 0 28px rgba(99,102,241,.9), 0 0 56px rgba(99,102,241,.4); }
        50%      { text-shadow: 0 0 48px rgba(139,92,246,1), 0 0 90px rgba(99,102,241,.6); }
    }
    .cpp-sub-label {
        font-size: 10px; font-weight: 700;
        letter-spacing: .22em; text-transform: uppercase;
        color: #6366f1; margin-top: 5px;
    }

    /* Badge */
    .c-badge {
        position: absolute; top: 10px; right: 10px;
        font-size: 10.5px; font-weight: 800;
        padding: 3px 10px; border-radius: 20px;
        letter-spacing: .04em;
    }
    .badge-soon {
        background: linear-gradient(135deg,#f59e0b,#f97316);
        color: #fff;
        box-shadow: 0 3px 10px rgba(249,115,22,.45);
    }

    /* Body */
    .c-body { padding: 16px 18px 18px; }

    .c-cat {
        font-size: 10.5px; font-weight: 700;
        text-transform: uppercase; letter-spacing: .1em;
        color: #6366f1; margin-bottom: 5px;
    }
    .c-title {
        font-size: 15px; font-weight: 800;
        color: #f1f5f9; line-height: 1.3;
        margin-bottom: 5px;
    }
    .c-desc {
        font-size: 12.5px; color: #52525b;
        line-height: 1.55; margin-bottom: 14px;
    }

    .c-meta {
        display: flex; align-items: center;
        justify-content: space-between;
        border-top: 1px solid rgba(255,255,255,0.05);
        padding-top: 12px; margin-bottom: 13px;
    }
    .c-price-old { font-size: 11.5px; color: #3f3f46; text-decoration: line-through; }
    .c-price     { font-size: 19px; font-weight: 900; color: #f97316; }
    .c-dur {
        display: flex; align-items: center; gap: 4px;
        font-size: 11.5px; color: #3f3f46;
    }

    /* Buttons */
    .btn-primary {
        display: block; width: 100%; text-align: center;
        padding: 10px 0; border-radius: 9px;
        font-size: 13px; font-weight: 800;
        background: linear-gradient(135deg,#f97316,#ea580c);
        color: #fff; text-decoration: none;
        box-shadow: 0 4px 14px rgba(249,115,22,.3);
        transition: box-shadow .25s, transform .25s;
    }
    .btn-primary:hover {
        box-shadow: 0 8px 22px rgba(249,115,22,.5);
        transform: translateY(-1px);
    }
    .btn-disabled {
        display: block; width: 100%; text-align: center;
        padding: 10px 0; border-radius: 9px;
        font-size: 13px; font-weight: 800;
        background: rgba(99,102,241,.08);
        color: #4f46e5;
        border: 1px solid rgba(99,102,241,.2);
        cursor: not-allowed; letter-spacing: .04em;
    }

    /* Pills */
    .pill {
        font-size: 12.5px; font-weight: 700;
        padding: 5px 15px; border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.09);
        color: #52525b; background: transparent;
        cursor: pointer; transition: all .2s ease;
    }
    .pill:hover { border-color: rgba(99,102,241,.4); color: #a5b4fc; }
    .pill.active {
        background: #6366f1; border-color: #6366f1;
        color: #fff; box-shadow: 0 3px 10px rgba(99,102,241,.4);
    }

    /* CTA */
    .cta-wrap {
        background: radial-gradient(ellipse 60% 80% at 50% 100%, rgba(99,102,241,.1) 0%, transparent 70%),
                    #09090b;
        border-top: 1px solid rgba(255,255,255,0.05);
    }
    .cta-box {
        border: 1px solid rgba(99,102,241,.18);
        border-radius: 20px;
        background: rgba(99,102,241,.05);
        padding: 44px 28px;
    }
    .notify-input {
        flex: 1; background: rgba(255,255,255,.04);
        border: 1px solid rgba(255,255,255,.09);
        border-radius: 9px; padding: 11px 15px;
        color: #f1f5f9; font-size: 13.5px; outline: none;
        transition: border-color .2s;
        min-width: 0;
    }
    .notify-input::placeholder { color: #3f3f46; }
    .notify-input:focus { border-color: rgba(99,102,241,.5); }
    .notify-btn {
        background: linear-gradient(135deg,#6366f1,#8b5cf6);
        color: #fff; font-weight: 800; font-size: 13.5px;
        padding: 11px 22px; border-radius: 9px; border: none;
        cursor: pointer; white-space: nowrap;
        box-shadow: 0 4px 14px rgba(99,102,241,.35);
        transition: box-shadow .25s, transform .25s;
    }
    .notify-btn:hover {
        box-shadow: 0 8px 22px rgba(99,102,241,.55);
        transform: translateY(-1px);
    }
</style>

<div class="pg">

    {{-- HERO --}}
    <section class="hero-wrap py-16 sm:py-20 md:py-24 px-4 sm:px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-indigo-400 mb-5">
                <span class="w-5 h-px bg-indigo-500/60"></span>
                Capacitaciones
                <span class="w-5 h-px bg-indigo-500/60"></span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-[56px] font-black text-white leading-[1.1] tracking-tight mb-5">
                Aprende las tecnologías<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-violet-400 to-fuchsia-400">
                    más demandadas
                </span>
            </h1>
            <p class="text-zinc-500 text-sm sm:text-base max-w-lg mx-auto mb-8">
                Cursos prácticos con instructores expertos. Desde cero hasta nivel profesional.
            </p>
        </div>
    </section>

    {{-- STATS --}}
    <div class="border-y border-white/5 bg-white/[0.02] py-4 px-4">
        <div class="max-w-xl mx-auto flex flex-wrap items-center justify-center gap-5 sm:gap-10">
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">+50</span>
                <span class="text-zinc-600 text-xs">estudiantes</span>
            </div>
            <div class="stat-sep hidden sm:block"></div>
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">98%</span>
                <span class="text-zinc-600 text-xs">satisfacción</span>
            </div>
            <div class="stat-sep hidden sm:block"></div>
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">2 a 3</span>
                <span class="text-zinc-600 text-xs">meses por curso</span>
            </div>
        </div>
    </div>

    {{-- COURSES --}}
    <section id="cursos" class="py-12 sm:py-16 px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">Todos los cursos</h2>
                    <p class="text-zinc-600 text-sm mt-1">Elige tu próximo aprendizaje</p>
                </div>
            </div>

            {{-- Cards --}}
            <div class="courses-grid">

                {{-- Ofimática --}}
                <div class="c-card">
                    <div class="c-thumb">
                        <img src="{{ asset('image/clases1.webp') }}" alt="Ofimática Profesional">
                        <div class="c-thumb-dim"></div>
                    </div>
                    <div class="c-body">
                        <div class="c-cat">Ofimática · Básico</div>
                        <div class="c-title">Ofimática Profesional</div>
                        <div class="c-desc">Word, PowerPoint y Excel desde cero hasta nivel avanzado.</div>
                        <div class="c-meta">
                            <div>
                                <div class="c-price-old">S/ 100.00</div>
                                <div class="c-price">S/ 49.90</div>
                            </div>
                            <div class="c-dur">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                02 meses
                            </div>
                        </div>
                        <a href="#" class="btn-primary">Ver detalle</a>
                    </div>
                </div>

                {{-- C++ --}}
                <div class="c-card">
                    <div class="cpp-thumb">
                        <div class="cpp-grid"></div>
                        <div class="cpp-orb"></div>
                        <div class="cpp-code" aria-hidden="true">
                            #include &lt;iostream&gt;<br>
                            #include &lt;vector&gt;<br>
                            using namespace std;<br><br>
                            class Programa {<br>
                            &nbsp;public:<br>
                            &nbsp;&nbsp;void run() {<br>
                            &nbsp;&nbsp;&nbsp;cout &lt;&lt; "C++";<br>
                            &nbsp;&nbsp;}<br>
                            };<br><br>
                            int main() {<br>
                            &nbsp;Programa p;<br>
                            &nbsp;p.run();<br>
                            &nbsp;return 0;<br>
                            }
                        </div>
                        <div class="cpp-label">
                            <div class="cpp-text">C++</div>
                            <div class="cpp-sub-label">Programación</div>
                        </div>
                        <span class="c-badge badge-soon">✦ Próximamente</span>
                    </div>
                    <div class="c-body">
                        <div class="c-cat" style="color:#818cf8;">Programación · Básico</div>
                        <div class="c-title">Programación en C++</div>
                        <div class="c-desc">Fundamentos, POO y estructuras de datos con C++ moderno.</div>
                        <div class="c-meta">
                            <div>
                                <div class="c-price-old">Precio por confirmar</div>
                                <div class="c-price" style="color:#818cf8;">Muy pronto</div>
                            </div>
                            <div class="c-dur">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                02 meses
                            </div>
                        </div>
                        <div class="btn-disabled">Próximamente</div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
