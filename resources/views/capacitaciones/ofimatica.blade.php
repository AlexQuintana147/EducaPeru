@extends('layouts.app')

@section('title', 'Ofimática Profesional - Curso Completo - EducaPerú')

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
                    <img src="{{ asset('https://x02.me/i/RD47.png') }}" alt="Ofimática Profesional Banner" class="w-full h-full object-cover">
                    <div class="banner-overlay">
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white text-black font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Destacado</span>
                            <span class="px-3 py-1 bg-white/10 text-white border border-white/15 font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Oficina Moderna</span>
                        </div>
                    </div>
                </div>

                <div class="lg:hidden border border-blueprint p-5 space-y-5" style="background-color: var(--bg-card);">
                    <div class="price-highlight">
                        <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Oferta especial</div>
                        <div class="flex items-baseline gap-3">
                            <span class="font-display text-3xl font-extrabold text-white">S/ 49.90</span>
                            <span class="text-white/30 line-through text-sm">S/ 100.00</span>
                        </div>
                        <div class="text-xs text-white/60 mt-1">Mensual</div>
                        <div class="text-[10px] text-white/40 mt-2">Válido hasta el 2 de agosto</div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de inicio</div>
                            <div class="font-display text-base font-extrabold text-white">8 ago</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de fin</div>
                            <div class="font-display text-base font-extrabold text-white">26 sep</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                    </div>

                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">100 horas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-calendar text-white/40 text-lg"></i>
                            <span>Sesiones: <strong class="text-white/80">8 sesiones</strong></span>
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
                    <a href="https://wa.me/51957290861?text=Hola%2C%20quiero%20inscribirme%20al%20curso%20de%20Ofim%C3%A1tica%20Profesional." target="_blank" rel="noopener noreferrer" class="block w-full py-3 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Inscribirme Ahora
                    </a>
                    <div class="text-[10px] text-center text-white/30">
                        8 de agosto – 26 de septiembre. Cupos limitados.
                    </div>
                </div>

                <div>
                    <h1 class="font-display text-3xl sm:text-5xl font-extrabold tracking-tighter text-white uppercase mb-6 leading-tight">
                        Curso de Ofimática<br>Profesional.
                    </h1>
                    <p class="text-white/40 text-sm sm:text-base md:text-lg font-light leading-relaxed max-w-3xl">
                        Aprende a dominar las herramientas más demandadas del entorno profesional: Microsoft Word, Excel y PowerPoint. Desde la creación de documentos formales hasta el análisis de datos y el diseño de presentaciones impactantes, este curso te prepara para destacar en cualquier puesto administrativo.
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
                                    <i class="ti ti-file-text text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Microsoft Word</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Edición y formato de texto, diseño profesional de documentos, configuración de página e impresión de archivos corporativos.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-table text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Microsoft Excel</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Fórmulas, funciones básicas e intermedias, gestión y análisis de datos, gráficos, visualización y herramientas avanzadas.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-presentation text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Microsoft PowerPoint</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Diseño de diapositivas, inserción de elementos, animaciones, transiciones y técnicas para presentaciones profesionales.
                            </p>
                        </div>

                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-device-laptop text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Modalidad Virtual</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Clases en vivo por Google Meet con acceso al Aula Virtual Moodle, materiales digitales y soporte durante todo el programa.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <h2 class="font-display text-xl sm:text-2xl font-bold uppercase tracking-tight text-white/90">
                        Cronograma del curso
                    </h2>

                    <div class="module-card">
                        <div class="module-header">
                            <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Módulo I</div>
                            <h3 class="font-display text-lg sm:text-xl font-bold text-white uppercase">Microsoft Word</h3>
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
                                    <td>Introducción a Word</td>
                                    <td>Sábado 8 de agosto</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Edición y formato de texto</td>
                                    <td>Sábado 8 de agosto</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Formato profesional de documentos</td>
                                    <td>Sábado 8 de agosto</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Configuración de página e impresión</td>
                                    <td>Sábado 8 de agosto</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="module-card">
                        <div class="module-header">
                            <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Módulo II</div>
                            <h3 class="font-display text-lg sm:text-xl font-bold text-white uppercase">Microsoft Excel</h3>
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
                                    <td>Introducción a Excel</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Fórmulas y funciones básicas</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Funciones intermedias</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Gestión y análisis de datos</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Gráficos y visualización</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Herramientas avanzadas</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="module-card">
                        <div class="module-header">
                            <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30 mb-1">Módulo III</div>
                            <h3 class="font-display text-lg sm:text-xl font-bold text-white uppercase">Microsoft PowerPoint</h3>
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
                                    <td>Introducción a PowerPoint</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Diseño de diapositivas</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Inserción de elementos</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Animaciones y transiciones</td>
                                    <td>Sábado</td>
                                    <td>4:00 pm – 7:00 pm</td>
                                </tr>
                                <tr>
                                    <td>Presentación profesional</td>
                                    <td>Sábado 26 de septiembre</td>
                                    <td>4:00 pm – 7:00 pm</td>
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
                            <span class="font-display text-3xl sm:text-4xl font-extrabold text-white">S/ 49.90</span>
                            <span class="text-white/30 line-through text-sm">S/ 100.00</span>
                        </div>
                        <div class="text-xs text-white/60 mt-1">Mensual</div>
                        <div class="text-[10px] text-white/40 mt-2">Válido hasta el 2 de agosto</div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de inicio</div>
                            <div class="font-display text-base sm:text-lg font-extrabold text-white">8 ago</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                        <div class="border border-blueprint p-3 text-center" style="background-color: rgba(255,255,255,0.02);">
                            <div class="text-[10px] uppercase tracking-widest text-white/30 mb-1">Fecha de fin</div>
                            <div class="font-display text-base sm:text-lg font-extrabold text-white">26 sep</div>
                            <div class="text-[10px] text-white/40">Sábado</div>
                        </div>
                    </div>

                    <div class="w-full h-px bg-white/10"></div>

                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold mb-4">El curso incluye:</div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">100 horas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-calendar text-white/40 text-lg"></i>
                            <span>Sesiones: <strong class="text-white/80">8 sesiones</strong></span>
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

                    <a href="https://wa.me/51957290861?text=Hola%2C%20quiero%20inscribirme%20al%20curso%20de%20Ofim%C3%A1tica%20Profesional." target="_blank" rel="noopener noreferrer" class="block w-full py-4 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Inscribirme Ahora
                    </a>

                    <div class="text-[10px] text-center text-white/30">
                        8 de agosto – 26 de septiembre. Cupos limitados.
                    </div>
                </div>

                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-4" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Herramientas:</div>
                    <div class="flex flex-wrap gap-2">
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-file-text text-sm"></i> MS Word
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-file-spreadsheet text-sm"></i> MS Excel
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-presentation text-sm"></i> MS PowerPoint
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-video text-sm"></i> Google Meet
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-school text-sm"></i> Moodle
                        </span>
                    </div>
                </div>

                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-6" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Docentes del curso:</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/UDC7Q7.png') }}" alt="Deysi Alicia Flores Toledo" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Deysi A. Flores Toledo</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/DeysiAlicia.pdf') }}" download class="block w-full py-2 text-center border border-blueprint text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
                                <i class="ti ti-file-cv text-sm mr-1"></i> Ver CV
                            </a>
                        </div>
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/R3PR.webp') }}" alt="Roxana Karina Diaz Zavala" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Roxana K. Diaz Zavala</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/RoxanaKarina.pdf') }}" download class="block w-full py-2 text-center border border-blueprint text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
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
