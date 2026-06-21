@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')
<style>
    /* Course Grid */
    .courses-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    @media (max-width: 900px) { .courses-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 560px) { .courses-grid { grid-template-columns: 1fr; } }

    /* Card */
    .c-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.4);
        border: 1px dashed rgba(255,255,255,0.1);
        transition: border-color .25s ease, box-shadow .25s ease;
    }
    .c-card:hover {
        border-color: rgba(255,255,255,0.35);
        box-shadow: 0 0 0 1px rgba(255,255,255,0.1), 0 20px 50px rgba(0,0,0,0.7);
    }
    .c-thumb-img { width: 100%; height: auto; display: block; }

    /* Overlay */
    .c-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(180deg, transparent 30%, rgba(0, 0, 0, 0.97) 100%);
        display: flex; flex-direction: column; justify-content: flex-end;
        padding: 14px 16px;
        opacity: 0; transform: translateY(4px);
        transition: opacity .3s ease, transform .3s ease;
    }
    .c-card:hover .c-overlay { opacity: 1; transform: translateY(0); }
    .c-overlay-title { font-size: 14px; font-weight: 800; color: #f1f5f9; margin-bottom: 10px; line-height: 1.3; }
    .c-overlay-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .c-overlay-info { display: flex; align-items: center; gap: 7px; font-size: 12.5px; color: #cbd5e1; }
    .c-overlay-info-icon {
        width: 26px; height: 26px; border-radius: 50%;
        background: rgba(255,255,255,0.1);
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .btn-go {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 10px;
        font-size: 13px; font-weight: 800;
        background: #fff; color: #000;
        text-decoration: none; white-space: nowrap;
        border: 1px solid rgba(255,255,255,0.15);
        transition: background .2s, transform .2s; flex-shrink: 0;
    }
    .btn-go:hover { background: #e4e4e7; transform: translateY(-1px); }
    .btn-go-disabled {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 10px;
        font-size: 13px; font-weight: 800;
        background: rgba(255,255,255,0.07); color: #71717a;
        white-space: nowrap; cursor: not-allowed;
        border: 1px solid rgba(255,255,255,0.08); flex-shrink: 0;
    }

    /* C++ thumb */
    .cpp-thumb { position: absolute; inset: 0; overflow: hidden; background: rgba(0, 0, 0, 0.6); }
    .cpp-grid {
        position: absolute; inset: 0;
        background-image:
            linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        background-size: 28px 28px;
    }
    .cpp-orb {
        position: absolute; width: 160px; height: 160px; border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        top: 50%; left: 50%; transform: translate(-50%,-50%);
        animation: orb 3s ease-in-out infinite;
    }
    @keyframes orb {
        0%,100% { transform: translate(-50%,-50%) scale(1); opacity:.6; }
        50%      { transform: translate(-50%,-50%) scale(1.25); opacity:1; }
    }
    .cpp-code {
        position: absolute; inset: 0;
        font-family: 'Courier New', monospace;
        font-size: 10.5px; line-height: 1.65; padding: 14px;
        color: rgba(255,255,255,0.06); overflow: hidden;
        user-select: none; pointer-events: none;
    }
    .cpp-label {
        position: absolute; inset: 0;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center; z-index: 2;
    }
    .cpp-text {
        font-size: 48px; font-weight: 900;
        color: #fff; letter-spacing: -2px; line-height: 1;
        text-shadow: 0 0 28px rgba(255,255,255,.5), 0 0 56px rgba(255,255,255,.2);
        animation: glow 3s ease-in-out infinite;
    }
    @keyframes glow {
        0%,100% { text-shadow: 0 0 28px rgba(255,255,255,.5), 0 0 56px rgba(255,255,255,.2); }
        50%      { text-shadow: 0 0 48px rgba(255,255,255,.8), 0 0 90px rgba(255,255,255,.3); }
    }
    .cpp-sub-label {
        font-size: 10px; font-weight: 700;
        letter-spacing: .22em; text-transform: uppercase;
        color: rgba(255,255,255,0.4); margin-top: 5px;
    }

    /* Badge */
    .c-badge {
        position: absolute; top: 10px; right: 10px;
        font-size: 10.5px; font-weight: 800;
        padding: 3px 10px; border-radius: 20px; letter-spacing: .04em;
    }
    .badge-soon {
        background: #fff; color: #000;
        box-shadow: 0 3px 10px rgba(255,255,255,.2);
    }

    /* Stats */
    .stat-sep { width:1px; height:16px; background:rgba(255,255,255,0.08); }
</style>

<div class="relative w-full" style="background-color: var(--bg);">

    {{-- HERO --}}
    <section class="relative pt-32 pb-48 px-4 sm:px-10 border-b border-blueprint">
        <div class="max-w-5xl mx-auto text-center relative z-10">
            <div class="inline-block px-4 py-1.5 border border-blueprint rounded-full text-[10px] font-bold uppercase tracking-[0.3em] text-white/40 mb-12">
                Programas Disponibles
            </div>
            <h1 class="font-display text-4xl sm:text-6xl md:text-7xl lg:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-8 text-white uppercase">
                APRENDE.<br><span class="text-white/20">TECNOLOGÍA.</span>
            </h1>
            <p class="text-white/40 text-base sm:text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                Cursos prácticos con instructores expertos. Desde cero hasta nivel profesional.
            </p>
        </div>
    </section>

    {{-- STATS --}}
    <div class="border-b border-blueprint bg-white/[0.01] py-4 px-4">
        <div class="max-w-xl mx-auto flex flex-wrap items-center justify-center gap-5 sm:gap-10">
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">+50</span>
                <span class="text-white/30 text-xs">estudiantes</span>
            </div>
            <div class="stat-sep hidden sm:block"></div>
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">98%</span>
                <span class="text-white/30 text-xs">satisfacción</span>
            </div>
            <div class="stat-sep hidden sm:block"></div>
            <div class="flex items-baseline gap-1.5">
                <span class="text-lg font-black text-white">2 a 3</span>
                <span class="text-white/30 text-xs">meses por curso</span>
            </div>
        </div>
    </div>

    {{-- COURSES --}}
    <section id="cursos" class="py-32 px-4 sm:px-10">
        <div class="max-w-7xl mx-auto">

            <div class="mb-16">
                <div class="section-label">Catálogo</div>
                <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter text-white uppercase">
                    Todos los cursos
                </h2>
            </div>

            <div class="courses-grid">

                {{-- Ofimática --}}
                <div class="c-card">
                    <img class="c-thumb-img" src="https://x02.me/i/RD47.png" alt="Ofimática Profesional">
                    <div class="c-overlay">
                        <div class="c-overlay-title">Ofimática Profesional</div>
                        <div class="c-overlay-row">
                            <div class="c-overlay-info">
                                <div class="c-overlay-info-icon">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                4 horas a la semana
                            </div>
                            <a href="#" class="btn-go">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                Ir al curso
                            </a>
                        </div>
                    </div>
                </div>

                {{-- C++ --}}
                <div class="c-card">
                    <div class="cpp-thumb" style="position:absolute;inset:0;width:100%;height:100%;aspect-ratio:unset;">
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
                    </div>
                    <span class="c-badge badge-soon" style="z-index:3;">Próximamente</span>
                    <div class="c-overlay">
                        <div class="c-overlay-title">Programación en C++</div>
                        <div class="c-overlay-row">
                            <div class="c-overlay-info">
                                <div class="c-overlay-info-icon">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                4 horas a la semana
                            </div>
                            <div class="btn-go-disabled">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                Próximamente
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Python --}}
                <div class="c-card">
                    <div class="cpp-thumb" style="background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, #000 100%);">
                        <div class="cpp-grid"></div>
                        <div class="cpp-orb"></div>
                        <div class="cpp-code" aria-hidden="true">
                            def saludar(nombre):<br>
                            &nbsp;&nbsp;return f"Hola, {nombre}"<br><br>
                            class Curso:<br>
                            &nbsp;&nbsp;def __init__(self):<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;self.nombre = "Python"<br><br>
                            &nbsp;&nbsp;def iniciar(self):<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;print("Aprendiendo")<br><br>
                            curso = Curso()<br>
                            curso.iniciar()
                        </div>
                        <div class="cpp-label">
                            <div class="cpp-text" style="font-size:44px;">Python</div>
                            <div class="cpp-sub-label">Programación</div>
                        </div>
                    </div>
                    <span class="c-badge badge-soon" style="z-index:3;">Próximamente</span>
                    <div class="c-overlay">
                        <div class="c-overlay-title">Programación en Python</div>
                        <div class="c-overlay-row">
                            <div class="c-overlay-info">
                                <div class="c-overlay-info-icon">
                                    <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                4 horas a la semana
                            </div>
                            <div class="btn-go-disabled">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                Próximamente
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
