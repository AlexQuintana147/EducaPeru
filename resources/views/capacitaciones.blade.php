@extends('layouts.app')

@section('title', 'Capacitaciones')

@section('content')
<style>
    /* Card */
    .c-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.4);
        border: 1px dashed rgba(255,255,255,0.1);
    }
    .c-card:hover {
        border-color: rgba(255,255,255,0.35);
        box-shadow: 0 0 0 1px rgba(255,255,255,0.1), 0 20px 50px rgba(0,0,0,0.7);
    }
    .c-thumb-img { width: 100%; height: auto; display: block; }

    /* Overlay - always visible on mobile, hover on desktop */
    .c-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(180deg, transparent 30%, rgba(0, 0, 0, 0.97) 100%);
        display: flex; flex-direction: column; justify-content: flex-end;
        padding: 14px 16px;
        opacity: 0;
    }
    @media (max-width: 768px) {
        .c-overlay { opacity: 1; }
    }
    .c-card:hover .c-overlay { opacity: 1; }
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

    /* Floating icons */
    .hero-float-icon {
        position: absolute;
        color: rgba(255,255,255,0.06);
        z-index: 1;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .hero-float-icon.show {
        opacity: 1;
    }
    @media (min-width: 640px) {
        .hero-float-icon svg { width: 56px; height: 56px; }
    }
    @media (min-width: 1024px) {
        .hero-float-icon svg { width: 72px; height: 72px; }
    }
</style>

<div class="relative w-full" style="background-color: var(--bg);">

    {{-- HERO --}}
    <section class="relative hero-full px-4 sm:px-10 border-b border-blueprint overflow-hidden">
        {{-- Floating SVG icons --}}
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M6 20h7v2H6c-1.11 0-2-.89-2-2V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8.54l-1.5-.82l-.5.28V4h-5v8l-2.5-2.25L8 12V4H6zm18-3l-5.5-3l-5.5 3l5.5 3zm-9 2.09v2L18.5 23l3.5-1.91v-2L18.5 21z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m13 21l2-1l2 1v-7h-4m4-5V7l-2 1l-2-1v2l-2 1l2 1v2l2-1l2 1v-2l2-1m1-7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7v-2H4V5h16v10h-1v2h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-9 5H5V6h6m-2 5H5V9h4m2 5H5v-2h6Z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M18 2c-.9 0-2 1-2 2H8c0-1-1.1-2-2-2H2v9c0 1 1 2 2 2h2.2c.4 2 1.7 3.7 4.8 4v2.08C8 19.54 8 22 8 22h8s0-2.46-3-2.92V17c3.1-.3 4.4-2 4.8-4H20c1 0 2-1 2-2V2zM6 11H4V4h2zm10 .5c0 1.93-.58 3.5-4 3.5c-3.41 0-4-1.57-4-3.5V6h8zm4-.5h-2V4h2z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M4 6h16v10H4m16 2a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4c-1.11 0-2 .89-2 2v10a2 2 0 0 0 2 2H0v2h24v-2z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9zm6.82 6L12 12.72L5.18 9L12 5.28zM17 16l-5 2.72L7 16v-3.73L12 15l5-2.73z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M8 3a2 2 0 0 0-2 2v4a2 2 0 0 1-2 2H3v2h1a2 2 0 0 1 2 2v4a2 2 0 0 0 2 2h2v-2H8v-5a2 2 0 0 0-2-2a2 2 0 0 0 2-2V5h2V3m6 0a2 2 0 0 1 2 2v4a2 2 0 0 0 2 2h1v2h-1a2 2 0 0 0-2 2v4a2 2 0 0 1-2 2h-2v-2h2v-5a2 2 0 0 1 2-2a2 2 0 0 1-2-2V5h-2V3z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m16 11.78l4.24-7.33l1.73 1l-5.23 9.05l-6.51-3.75L5.46 19H22v2H2V3h2v14.54L9.5 8z"/></svg></div>
        <div class="hero-float-icon" style="transform:scale(0.7)"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m13.16 22.19l-1.66-3.84c1.6-.58 3.07-1.35 4.43-2.27l-2.78 6.11m-7.5-9.69l-3.84-1.65l6.11-2.78C7 9.43 6.23 10.91 5.65 12.5M20 4c-2.96-.22-5.2.83-7.55 3.31c-2.36 2.47-3.36 4.5-3.95 6.04l2.17 2.1c2.29-.87 4.33-2.18 6.03-3.89C20 8.27 20.17 5.4 20 4m-9 1.9c2.63-2.8 7-4.82 10.66-3.55c0 0 2.12 4.96-3.55 10.65c-2.2 2.17-4.58 3.5-6.72 4.34c-.24.09-1.15.39-2.13-.46l-2.13-2.13c-.56-.56-.74-1.38-.47-2.13C7.5 10.5 8.41 8.69 11 5.9M6.25 22H4.84l4.09-4.1c.3.21.63.36.97.45zM2 22v-1.41l4.77-4.78l1.43 1.42L3.41 22zm0-2.83v-1.42l3.65-3.65c.09.35.24.68.45.97zM16 6a2 2 0 0 1 2 2c0 1.11-.89 2-2 2a2 2 0 1 1 0-4"/></svg></div>

        <div class="max-w-5xl mx-auto text-center relative z-10">
            <h1 class="font-display text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-4 sm:mb-6 text-white uppercase">
                APRENDE.<br><span class="text-white/20">TECNOLOGÍA.</span>
            </h1>
            <p class="text-white/40 text-sm sm:text-lg md:text-xl max-w-2xl mx-auto mb-8 sm:mb-12 font-light leading-relaxed">
                Cursos prácticos con instructores expertos. Desde cero hasta nivel profesional.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mb-8 sm:mb-16 hero-buttons-container">
                <a href="#cursos" class="w-full sm:w-auto px-8 sm:px-10 py-4 sm:py-5 bg-white text-black font-display font-bold text-xs sm:text-sm uppercase tracking-widest btn-glow text-center">
                    Ver cursos
                </a>
            </div>
            <div class="flex flex-row items-center justify-center gap-4 sm:gap-8 text-white/20">
                <div class="text-center">
                    <div class="font-display text-xl sm:text-3xl font-extrabold text-white/60">+50</div>
                    <div class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] mt-1">Estudiantes</div>
                </div>
                <div class="w-px h-8 sm:h-10 bg-white/10"></div>
                <div class="text-center">
                    <div class="font-display text-xl sm:text-3xl font-extrabold text-white/60">98%</div>
                    <div class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] mt-1">Satisfacción</div>
                </div>
                <div class="w-px h-8 sm:h-10 bg-white/10"></div>
                <div class="text-center">
                    <div class="font-display text-xl sm:text-3xl font-extrabold text-white/60">2-3</div>
                    <div class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] mt-1">Meses por curso</div>
                </div>
            </div>
        </div>
    </section>

    {{-- COURSES --}}
    <section id="cursos" class="py-16 sm:py-24 md:py-32 px-4 sm:px-10">
        <div class="max-w-7xl mx-auto">

            <div class="mb-8 sm:mb-12">
                <div class="section-label">Catálogo</div>
                <h2 class="font-display text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter text-white uppercase">
                    Todos los cursos
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Ofimática --}}
                <a href="/capacitaciones/ofimatica" class="c-card block">
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
                            <span class="btn-go">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                Ir al curso
                            </span>
                        </div>
                    </div>
                </a>

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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const icons = [...document.querySelectorAll('.hero-float-icon')];
    const spots = [
        { top:'6%',  left:'4%',  right:'',   bottom:'' },
        { top:'8%',  left:'',   right:'5%',  bottom:'' },
        { top:'35%', left:'5%', right:'',   bottom:'' },
        { top:'38%', left:'',   right:'4%',  bottom:'' },
        { top:'55%', left:'3%', right:'',   bottom:'' },
        { top:'58%', left:'',   right:'6%',  bottom:'' },
        { top:'',    left:'',   right:'',   bottom:'12%' },
        { top:'',    left:'15%',right:'',   bottom:'' },
    ];
    const taken = new Set();
    const lastSpot = icons.map(() => -1);

    function place(el, si) {
        const s = spots[si];
        el.style.top = s.top; el.style.left = s.left;
        el.style.right = s.right; el.style.bottom = s.bottom;
        el.style.transform = 'scale(1)';
    }
    function hide(el, si) {
        el.style.transform = 'scale(0.7)';
    }
    function pickSpot(i) {
        const ok = [...Array(spots.length).keys()].filter(s => !taken.has(s) && s !== lastSpot[i]);
        return ok.length ? ok[Math.floor(Math.random() * ok.length)] : [...Array(spots.length).keys()].filter(s => !taken.has(s))[0];
    }

    function cycleIcon(i) {
        const el = icons[i];
        if (lastSpot[i] >= 0) taken.delete(lastSpot[i]);
        el.classList.remove('show');
        hide(el, lastSpot[i] >= 0 ? lastSpot[i] : 0);
        setTimeout(() => {
            const si = pickSpot(i);
            lastSpot[i] = si;
            taken.add(si);
            place(el, si);
            el.classList.add('show');
        }, 800);
        setTimeout(() => cycleIcon(i), 4000 + Math.random() * 3000);
    }

    const startCount = 3 + Math.floor(Math.random() * 2);
    for (let i = 0; i < startCount && i < icons.length; i++) {
        const si = pickSpot(i);
        lastSpot[i] = si;
        taken.add(si);
        place(icons[i], si);
        icons[i].classList.add('show');
        setTimeout(() => cycleIcon(i), 4000 + Math.random() * 3000);
    }
    for (let i = startCount; i < icons.length; i++) {
        setTimeout(() => cycleIcon(i), 1500 + Math.random() * 2500);
    }
});
</script>
@endsection
