@extends('layouts.app')

@section('title', 'Programación en Python - Curso Básico - EducaPerú')

@section('content')
<style>
    .course-detail-container {
        padding-top: 6rem;
    }
    @media (max-width: 1024px) {
        .course-detail-container {
            padding-top: 7rem;
        }
    }

    .banner-card {
        position: relative;
        width: 100%;
        aspect-ratio: 16/9;
        border-radius: 24px;
        overflow: hidden;
        border: 1px dashed rgba(255, 255, 255, 0.1);
        background-color: var(--bg-card);
    }
    @media (max-width: 640px) {
        .banner-card {
            aspect-ratio: 4/3;
        }
    }

    .banner-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.65;
    }

    .banner-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 24px;
        z-index: 10;
    }
    @media (max-width: 640px) {
        .banner-overlay {
            padding: 16px;
        }
    }

    .stack-badge {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 5px 12px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px dashed rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.6);
    }

    .topic-card {
        background: rgba(27, 25, 19, 0.4);
        border: 1px dashed rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 24px;
    }
    @media (max-width: 640px) {
        .topic-card {
            padding: 18px;
            border-radius: 16px;
        }
    }

    .module-card {
        background: rgba(27, 25, 19, 0.4);
        border: 1px dashed rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        overflow: hidden;
    }

    .module-header {
        padding: 20px 24px;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.08);
    }
    @media (max-width: 640px) {
        .module-header {
            padding: 16px 18px;
        }
    }

    .schedule-table {
        width: 100%;
        border-collapse: collapse;
    }

    .schedule-table th,
    .schedule-table td {
        padding: 14px 24px;
        text-align: left;
        font-size: 14px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    @media (max-width: 640px) {
        .schedule-table th,
        .schedule-table td {
            padding: 12px 18px;
        }
    }

    .schedule-table th {
        color: rgba(255, 255, 255, 0.35);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 0.1em;
        background: rgba(255, 255, 255, 0.02);
    }

    .schedule-table td {
        color: rgba(255, 255, 255, 0.7);
        font-weight: 300;
    }

    .schedule-table tr:last-child td {
        border-bottom: none;
    }

    .schedule-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.02);
    }

    .price-highlight {
        background: rgba(255, 255, 255, 0.05);
        border: 1px dashed rgba(255, 255, 255, 0.12);
        padding: 16px;
    }

    .btn-glow,
    .btn-glow:hover,
    .btn-glow:active {
        transition: none !important;
        transform: none !important;
        box-shadow: none !important;
    }
</style>

<div class="relative w-full course-detail-container pb-24" style="background-color: var(--bg);">
    <div class="max-w-7xl mx-auto px-4 sm:px-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2 space-y-12">

                <div class="banner-card">
                    <img src="{{ asset('https://alex123456.x02.me/i/3W5R.png') }}" alt="Programación en Python Banner" class="w-full h-full object-cover">
                    <div class="banner-overlay">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white text-black font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Nuevo</span>
                            <span class="px-3 py-1 bg-white/10 text-white border border-white/15 font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Desde cero</span>
                        </div>
                    </div>
                </div>

                <div class="lg:hidden border border-blueprint p-5 space-y-5" style="background-color: var(--bg-card);">
                    <div class="price-highlight">
                        <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Oferta especial</div>
                        <div class="flex items-baseline gap-3">
                            <span class="font-display text-3xl font-extrabold text-white">S/ 60.00</span>
                            <span class="text-white/30 line-through text-sm">S/ 120.00</span>
                        </div>
                        <div class="text-xs text-white/60 mt-1">Pago único</div>
                        <div class="text-[10px] text-white/40 mt-2">Válido hasta el 12 de agosto</div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de inicio</div>
                            <div class="font-display text-base font-extrabold text-white">12 ago</div>
                            <div class="text-[10px] text-white/40">Miércoles</div>
                        </div>
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de fin</div>
                            <div class="font-display text-base font-extrabold text-white">10 oct</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                    </div>

                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">2 meses</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-calendar text-white/40 text-lg"></i>
                            <span>Sesiones: <strong class="text-white/80">18 clases</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-chart-bar text-white/40 text-lg"></i>
                            <span>Nivel: <strong class="text-white/80">Básico</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-certificate text-white/40 text-lg"></i>
                            <span>Certificación: <strong class="text-white/80">Digital</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-device-laptop text-white/40 text-lg"></i>
                            <span>Modalidad: <strong class="text-white/80">Virtual</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-video text-white/40 text-lg"></i>
                            <span>Plataformas: <strong class="text-white/80">Google Meet y Moodle</strong></span>
                        </li>
                    </ul>
                    <a href="https://wa.me/51957290861?text=Hola%2C%20quiero%20inscribirme%20al%20curso%20de%20Programaci%C3%B3n%20en%20Python." target="_blank" rel="noopener noreferrer" class="block w-full py-3 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Inscribirme Ahora
                    </a>
                    <div class="text-[10px] text-center text-white/30">
                        12 de agosto – 10 de octubre. Cupos limitados.
                    </div>
                </div>

                <div>
                    <h1 class="font-display text-3xl sm:text-5xl font-extrabold tracking-tighter text-white uppercase mb-6 leading-tight">
                        Curso de Programación<br>en Python.
                    </h1>
                    <p class="text-white/40 text-sm sm:text-base md:text-lg font-light leading-relaxed max-w-3xl">
                        Aprende a programar desde cero con Python, el lenguaje más versátil y demandado del mercado. Desde los conceptos básicos hasta tu primer proyecto funcional, este curso te da las bases sólidas para continuar en desarrollo de software, análisis de datos o automatización.
                    </p>
                </div>

                <div class="space-y-6">
                    <h2 class="font-display text-xl sm:text-2xl font-bold uppercase tracking-tight text-white/90">
                        Lo que aprenderás en este curso
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-code text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Fundamentos</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Variables, tipos de datos, operadores, estructuras condicionales y bucles. La base para pensar como programador.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-database text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Estructuras de datos</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Listas, tuplas, diccionarios y conjuntos. Aprende a organizar y manipular información de forma eficiente.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-file-text text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Archivos y módulos</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Lectura y escritura de archivos, uso de módulos de la librería estándar e instalación de librerías con pip.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-box text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">POO y proyectos</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Programación orientada a objetos, manejo de errores y desarrollo de un proyecto final aplicando lo aprendido.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <h2 class="font-display text-xl sm:text-2xl font-bold uppercase tracking-tight text-white/90">
                        Cronograma del curso
                    </h2>

                    {{-- Módulo I --}}
                    <div class="module-card">
                        <div class="module-header">
                            <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Módulo I</div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-white/5 border border-blueprint flex items-center justify-center text-white">
                                    <i class="ti ti-code text-lg"></i>
                                </div>
                                <h3 class="font-display text-lg sm:text-xl font-bold text-white uppercase">Fundamentos de Python</h3>
                            </div>
                        </div>
                        <table class="schedule-table">
                            <thead>
                                <tr>
                                    <th>Clases</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Introducción a Python</td>
                                    <td>Miércoles 12 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Variables y tipos de datos</td>
                                    <td>Sábado 15 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Operadores y expresiones</td>
                                    <td>Miércoles 19 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Estructuras condicionales</td>
                                    <td>Sábado 22 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Bucles: for y while</td>
                                    <td>Miércoles 26 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Listas y tuplas</td>
                                    <td>Sábado 29 de agosto</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Diccionarios y conjuntos</td>
                                    <td>Miércoles 2 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Funciones y ámbito</td>
                                    <td>Sábado 5 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Módulo II --}}
                    <div class="module-card">
                        <div class="module-header">
                            <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Módulo II</div>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-white/5 border border-blueprint flex items-center justify-center text-white">
                                    <i class="ti ti-box text-lg"></i>
                                </div>
                                <h3 class="font-display text-lg sm:text-xl font-bold text-white uppercase">Python Aplicado</h3>
                            </div>
                        </div>
                        <table class="schedule-table">
                            <thead>
                                <tr>
                                    <th>Clases</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Manejo de cadenas</td>
                                    <td>Miércoles 9 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Manejo de archivos</td>
                                    <td>Sábado 12 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Módulos y librerías estándar</td>
                                    <td>Miércoles 16 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Programación orientada a objetos</td>
                                    <td>Sábado 19 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Herencia y polimorfismo</td>
                                    <td>Miércoles 23 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Manejo de errores</td>
                                    <td>Sábado 26 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Introducción a pip</td>
                                    <td>Miércoles 30 de septiembre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Proyecto final: planificación</td>
                                    <td>Sábado 3 de octubre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Proyecto final: desarrollo</td>
                                    <td>Miércoles 7 de octubre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Proyecto final: presentación</td>
                                    <td>Sábado 10 de octubre</td>
                                    <td>6:00 pm – 8:00 pm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div id="iniciar" class="space-y-8 lg:sticky lg:top-24 self-start">

                <div class="hidden lg:block border border-blueprint p-5 sm:p-8 space-y-6" style="background-color: var(--bg-card);">
                    <div class="price-highlight">
                        <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Oferta especial</div>
                        <div class="flex items-baseline gap-3">
                            <span class="font-display text-3xl sm:text-4xl font-extrabold text-white">S/ 60.00</span>
                            <span class="text-white/30 line-through text-sm">S/ 120.00</span>
                        </div>
                        <div class="text-xs text-white/60 mt-1">Pago único</div>
                        <div class="text-[10px] text-white/40 mt-2">Válido hasta el 12 de agosto</div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de inicio</div>
                            <div class="font-display text-base sm:text-lg font-extrabold text-white">12 ago</div>
                            <div class="text-[10px] text-white/40">Miércoles</div>
                        </div>
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de fin</div>
                            <div class="font-display text-base sm:text-lg font-extrabold text-white">10 oct</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                    </div>

                    <div class="w-full h-px bg-white/10"></div>

                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold mb-4">El curso incluye:</div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">2 meses</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-calendar text-white/40 text-lg"></i>
                            <span>Sesiones: <strong class="text-white/80">18 clases</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-chart-bar text-white/40 text-lg"></i>
                            <span>Nivel: <strong class="text-white/80">Básico</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-certificate text-white/40 text-lg"></i>
                            <span>Certificación: <strong class="text-white/80">Digital</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-device-laptop text-white/40 text-lg"></i>
                            <span>Modalidad: <strong class="text-white/80">Virtual</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-video text-white/40 text-lg"></i>
                            <span>Plataformas: <strong class="text-white/80">Google Meet y Moodle</strong></span>
                        </li>
                    </ul>

                    <a href="https://wa.me/51957290861?text=Hola%2C%20quiero%20inscribirme%20al%20curso%20de%20Programaci%C3%B3n%20en%20Python." target="_blank" rel="noopener noreferrer" class="block w-full py-4 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Inscribirme Ahora
                    </a>

                    <div class="text-[10px] text-center text-white/30">
                        12 de agosto – 10 de octubre. Cupos limitados.
                    </div>
                </div>

                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-4" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Herramientas:</div>
                    <div class="flex flex-wrap gap-2">
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-brand-python text-sm"></i> Python 3
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-terminal text-sm"></i> VS Code
                        </span>
                    </div>
                </div>

                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-6" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Docentes del curso:</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/8ACN4.jpg') }}" alt="Alex M. Quintana De La Cruz" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Alex M. Quintana De La Cruz</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/Alex.pdf') }}" download class="block w-full py-2 text-center border border-blueprint text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
                                <i class="ti ti-file-cv text-sm mr-1"></i> Ver CV
                            </a>
                        </div>
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/M5GP.webp') }}" alt="Richerd A. Rodas Ramirez" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Richerd A. Rodas Ramirez</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/Antony.pdf') }}" download class="block w-full py-2 text-center border border-blueprint text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
                                <i class="ti ti-file-cv text-sm mr-1"></i> Ver CV
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection