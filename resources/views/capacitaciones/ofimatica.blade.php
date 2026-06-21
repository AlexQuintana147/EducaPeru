@extends('layouts.app')

@section('title', 'Ofimática Profesional - Curso Completo - EducaPerú')

@section('content')
<style>
    /* Section offset for fixed navbar */
    .course-detail-container {
        padding-top: 6rem;
    }
    @media (max-width: 1024px) {
        .course-detail-container {
            padding-top: 7rem;
        }
    }

    /* Course Banner Card */
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
        object-cover: cover;
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

    /* Tag badges */
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

    /* Learning grid card */
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

    /* Override global btn-glow: no transitions or transforms on this page */
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

        {{-- MAIN GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- LEFT COLUMN: Course details --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- FEATURED BANNER --}}
                <div class="banner-card">
                    <img src="{{ asset('https://x02.me/i/RD47.png') }}" alt="Ofimática Profesional Banner" class="w-full h-full object-cover">
                    <div class="banner-overlay">
                        {{-- Top tags --}}
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-white text-black font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Destacado</span>
                            <span class="px-3 py-1 bg-white/10 text-white border border-white/15 font-display font-bold text-[9px] sm:text-[10px] uppercase tracking-widest rounded-full">Oficina Moderna</span>
                        </div>
                    </div>
                </div>

                {{-- MOBILE PRICE (below banner) --}}
                <div class="lg:hidden border border-blueprint rounded-2xl p-5 space-y-5" style="background-color: var(--bg-card);">
                    <div class="space-y-2">
                        <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30">Precio promocional</div>
                        <div class="flex items-baseline gap-2">
                            <span class="font-display text-2xl font-extrabold text-white">S/ 120</span>
                            <span class="text-white/30 line-through text-sm">S/ 250</span>
                        </div>
                    </div>
                    <div class="w-full h-px bg-white/10"></div>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">32 horas académicas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-book text-white/40 text-lg"></i>
                            <span>Clases: <strong class="text-white/80">24 lecciones prácticas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-chart-bar text-white/40 text-lg"></i>
                            <span>Nivel: <strong class="text-white/80">Desde cero hasta avanzado</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-certificate text-white/40 text-lg"></i>
                            <span>Certificación: <strong class="text-white/80">Certificado incluido</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-device-laptop text-white/40 text-lg"></i>
                            <span>Modalidad: <strong class="text-white/80">Online + asesorías</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-messages text-white/40 text-lg"></i>
                            <span>Soporte: <strong class="text-white/80">Resolución de dudas</strong></span>
                        </li>
                    </ul>
                    <button class="w-full py-3 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Comenzar Ahora
                    </button>
                    <div class="text-[10px] text-center text-white/30">
                        Acceso de por vida a los materiales del curso y actualizaciones futuras.
                    </div>
                </div>

                {{-- HEADER & DESCRIPTION --}}
                <div>
                    <h1 class="font-display text-3xl sm:text-5xl font-extrabold tracking-tighter text-white uppercase mb-6 leading-tight">
                        Curso de Ofimática<br>Profesional.
                    </h1>
                    <p class="text-white/40 text-sm sm:text-base md:text-lg font-light leading-relaxed max-w-3xl">
                        Domina las herramientas esenciales del entorno laboral moderno: Word, Excel, PowerPoint y Google Workspace. Aprende a estructurar informes de alta calidad, realizar análisis de datos financieros complejos, automatizar tareas diarias y diseñar diapositivas profesionales que impacten a tus clientes y superiores.
                    </p>
                </div>

                {{-- WHAT YOU WILL LEARN --}}
                <div class="space-y-6">
                    <h2 class="font-display text-xl sm:text-2xl font-bold uppercase tracking-tight text-white/90">
                        Lo que aprenderás en este curso
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Word -->
                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-file-text text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Procesamiento Eficiente (Word)</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Creación de documentos corporativos impecables, uso de estilos avanzados, automatización de tablas de contenido, correspondencia combinada y plantillas dinámicas.
                            </p>
                        </div>

                        <!-- Excel -->
                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-table text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Análisis de Datos (Excel)</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Fórmulas y funciones lógicas, búsqueda de datos, tablas dinámicas avanzadas, modelado y visualización de gráficos ejecutivos para la toma de decisiones rápidas.
                            </p>
                        </div>

                        <!-- PowerPoint -->
                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-presentation text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Presentaciones de Impacto</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Diseño visual premium de diapositivas, aplicación de transiciones modernas, inserción de elementos multimedia e interactivos y técnicas avanzadas de oratoria corporativa.
                            </p>
                        </div>

                        <!-- Nube -->
                        <div class="topic-card">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-blueprint flex items-center justify-center text-white shrink-0">
                                    <i class="ti ti-cloud-upload text-xl"></i>
                                </div>
                                <h3 class="font-display text-lg font-bold text-white leading-tight">Colaboración Digital</h3>
                            </div>
                            <p class="text-white/40 text-sm leading-relaxed font-light">
                                Gestión de archivos compartidos en la nube a través de OneDrive y Google Drive. Trabajo colaborativo en tiempo real utilizando herramientas de Google Docs y Sheets.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN: Sidebar card --}}
            <div id="iniciar" class="space-y-8 lg:sticky lg:top-24 self-start">

                {{-- EL CURSO INCLUYE CARD (desktop) --}}
                <div class="hidden lg:block border border-blueprint rounded-3xl p-5 sm:p-8 space-y-6" style="background-color: var(--bg-card);">
                    <div class="space-y-2">
                        <div class="text-[10px] font-extrabold uppercase tracking-widest text-white/30">Precio promocional</div>
                        <div class="flex items-baseline gap-2">
                            <span class="font-display text-3xl sm:text-4xl font-extrabold text-white">S/ 120</span>
                            <span class="text-white/30 line-through text-sm">S/ 250</span>
                        </div>
                    </div>

                    <div class="w-full h-px bg-white/10"></div>

                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold mb-4">El curso incluye:</div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-clock text-white/40 text-lg"></i>
                            <span>Duración: <strong class="text-white/80">32 horas académicas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-book text-white/40 text-lg"></i>
                            <span>Clases: <strong class="text-white/80">24 lecciones prácticas</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-chart-bar text-white/40 text-lg"></i>
                            <span>Nivel: <strong class="text-white/80">Desde cero hasta avanzado</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-certificate text-white/40 text-lg"></i>
                            <span>Certificación: <strong class="text-white/80">Certificado incluido</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-device-laptop text-white/40 text-lg"></i>
                            <span>Modalidad: <strong class="text-white/80">Online + asesorías</strong></span>
                        </li>
                        <li class="flex items-center gap-3 text-white/60 text-sm font-light">
                            <i class="ti ti-messages text-white/40 text-lg"></i>
                            <span>Soporte: <strong class="text-white/80">Resolución de dudas</strong></span>
                        </li>
                    </ul>

                    <button class="w-full py-4 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow text-center">
                        Comenzar Ahora
                    </button>

                    <div class="text-[10px] text-center text-white/30">
                        Acceso de por vida a los materiales del curso y actualizaciones futuras.
                    </div>
                </div>

                {{-- STACK CARD --}}
                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-4" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Herramientas:</div>
                    <div class="flex flex-wrap gap-2">
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-file-spreadsheet text-sm"></i> MS Excel
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-file-text text-sm"></i> MS Word
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-presentation text-sm"></i> MS PowerPoint
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-cloud text-sm"></i> OneDrive
                        </span>
                        <span class="stack-badge flex items-center gap-1.5">
                            <i class="ti ti-brand-google text-sm"></i> Google Workspace
                        </span>
                    </div>
                </div>

                {{-- DOCENTES CARD --}}
                <div class="border border-blueprint rounded-3xl p-5 sm:p-8 space-y-6" style="background-color: var(--bg-card);">
                    <div class="font-display text-xs uppercase tracking-widest text-white/50 font-bold">Docentes del curso:</div>
                    <div class="grid grid-cols-2 gap-4">
                        {{-- Docente 1 --}}
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/UDC7Q7.png') }}" alt="Deysi Alicia Flores Toledo" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Deysi A. Flores Toledo</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/DeysiAlicia.pdf') }}" download class="block w-full py-2 text-center border border-blueprint rounded-xl text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
                                <i class="ti ti-file-cv text-sm mr-1"></i> Ver CV
                            </a>
                        </div>
                        {{-- Docente 2 --}}
                        <div class="space-y-3">
                            <div class="flex flex-col items-center text-center gap-3">
                                <img src="{{ asset('https://alex123456.x02.me/i/R3PR.webp') }}" alt="Roxana Karina Diaz Zavala" class="w-16 h-16 rounded-2xl border border-blueprint object-cover">
                                <div>
                                    <h4 class="font-display font-extrabold text-white text-sm">Roxana K. Diaz Zavala</h4>
                                    <p class="text-white/30 text-[10px] mt-0.5">Docente</p>
                                </div>
                            </div>
                            <a href="{{ asset('pdf/RoxanaKarina.pdf') }}" download class="block w-full py-2 text-center border border-blueprint rounded-xl text-white/50 text-[10px] font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-colors">
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
