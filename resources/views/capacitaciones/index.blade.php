@extends('layouts.app')

@section('title', 'Capacitación - EducaPerú')

@section('content')

<div class="bg-zinc-950 min-h-screen">

    {{-- HERO SECTION --}}
    <section class="bg-gradient-to-b from-zinc-900 to-zinc-950 border-b border-zinc-800 py-20 px-4 sm:py-28">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
                        OFIMÁTICA PROFESIONAL
                    </h1>
                    <p class="text-lg text-zinc-400 leading-relaxed mb-8">
                        Domina las herramientas office más demandadas en el mercado laboral. Aprende a crear documentos, presentaciones y hojas de cálculo como un profesional.
                    </p>
                    <button class="bg-zinc-800 hover:bg-zinc-700 text-white px-8 py-3 rounded-lg font-bold transition-colors">
                        Inscribirse
                    </button>
                </div>
                <div>
                    <img src="https://via.placeholder.com/400x300?text=Ofimática" alt="Ofimática Profesional" class="w-full rounded-2xl border border-zinc-700">
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES SECTION --}}
    <section class="border-b border-zinc-800 py-16 px-4">
        <div class="max-width-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center hover:border-zinc-600 transition-colors">
                    <div class="text-3xl mb-3">⏱️</div>
                    <div class="text-xl font-bold text-white mb-1">02 meses</div>
                    <div class="text-xs text-zinc-500 font-semibold">Duración</div>
                </div>
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center hover:border-zinc-600 transition-colors">
                    <div class="text-3xl mb-3">💻</div>
                    <div class="text-xl font-bold text-white mb-1">Virtual</div>
                    <div class="text-xs text-zinc-500 font-semibold">Modalidad</div>
                </div>
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center hover:border-zinc-600 transition-colors">
                    <div class="text-3xl mb-3">💵</div>
                    <div class="text-xl font-bold text-white mb-1">S/ 45.50</div>
                    <div class="text-xs text-zinc-500 font-semibold">Inversión</div>
                </div>
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center hover:border-zinc-600 transition-colors">
                    <div class="text-3xl mb-3">📅</div>
                    <div class="text-xl font-bold text-white mb-1">Del 21/04/2026</div>
                    <div class="text-xs text-zinc-500 font-semibold">Fechas</div>
                </div>
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 text-center hover:border-zinc-600 transition-colors">
                    <div class="text-3xl mb-3">👨‍🏫</div>
                    <div class="text-xl font-bold text-white mb-1">3 instructores</div>
                    <div class="text-xs text-zinc-500 font-semibold">Docentes</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="bg-zinc-900/50 border-b border-zinc-800 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            {{-- <div class="flex items-center gap-3 mb-3">
                <div class="w-7 h-0.5 bg-zinc-500"></div>
                <p class="text-xs font-bold uppercase tracking-widest text-zinc-500">Sobre esta capacitación</p>
            </div> --}}
            <h2 class="text-3xl md:text-4xl font-black text-white mb-8">¿Qué aprenderás?</h2>
            <div class="space-y-4 mb-8">
                <p class="text-base text-zinc-400 leading-relaxed">
                    El Curso de Especialización en Ofimática Profesional está diseñado para fortalecer las competencias en el uso eficiente de las principales herramientas ofimáticas: Microsoft Excel, Word y PowerPoint.
                </p>
                <p class="text-base text-zinc-400 leading-relaxed">
                    A lo largo del curso, aprenderás a optimizar procesos administrativos, mejorar la presentación de documentos, analizar información de forma efectiva y desarrollar habilidades digitales esenciales para un mejor desempeño en tu institución y entorno laboral.
                </p>
            </div>
            <div class="text-center">
                <button class="bg-zinc-800 hover:bg-zinc-700 text-white px-8 py-3 rounded-lg font-bold transition-colors">
                    Ver temario
                </button>
            </div>
        </div>
    </section>

    {{-- CURRICULUM SECTION --}}
    <section class="border-b border-zinc-800 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-8">Temario</h2>

            <div class="space-y-3">
                <div class="accordion-item bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden active">
                    <div class="accordion-header bg-zinc-900 p-6 cursor-pointer flex items-center gap-3 hover:bg-zinc-800/50 transition-colors">
                        <div class="accordion-icon w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-white text-xs font-bold flex-shrink-0 transition-transform">1</div>
                        <div class="accordion-title text-base font-bold text-white flex-1">Microsoft Word</div>
                    </div>
                    <div class="accordion-content bg-zinc-800/30 px-6 max-h-0 overflow-hidden transition-all">
                        <div class="accordion-text text-sm text-zinc-400 py-6">
                            Introducción a Word, formato de documentos, creación de estilos, tablas, índices, referencias cruzadas, combinación de correspondencia y más.
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden">
                    <div class="accordion-header bg-zinc-900 p-6 cursor-pointer flex items-center gap-3 hover:bg-zinc-800/50 transition-colors">
                        <div class="accordion-icon w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-white text-xs font-bold flex-shrink-0 transition-transform">2</div>
                        <div class="accordion-title text-base font-bold text-white flex-1">Microsoft PowerPoint</div>
                    </div>
                    <div class="accordion-content bg-zinc-800/30 px-6 max-h-0 overflow-hidden transition-all">
                        <div class="accordion-text text-sm text-zinc-400 py-6">
                            Diseño de presentaciones profesionales, animaciones, transiciones, manejo de multimedia, presentación efectiva y técnicas de impacto visual.
                        </div>
                    </div>
                </div>

                <div class="accordion-item bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden">
                    <div class="accordion-header bg-zinc-900 p-6 cursor-pointer flex items-center gap-3 hover:bg-zinc-800/50 transition-colors">
                        <div class="accordion-icon w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-white text-xs font-bold flex-shrink-0 transition-transform">3</div>
                        <div class="accordion-title text-base font-bold text-white flex-1">Microsoft Excel</div>
                    </div>
                    <div class="accordion-content bg-zinc-800/30 px-6 max-h-0 overflow-hidden transition-all">
                        <div class="accordion-text text-sm text-zinc-400 py-6">
                            Funciones básicas y avanzadas, análisis de datos, gráficos, tablas dinámicas, validación de datos, macros y reporting profesional.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DOCENTES SECTION --}}
    <section class="bg-zinc-900/50 border-b border-zinc-800 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-12">Docentes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 transition-colors">
                    <div class="flex gap-4 mb-6">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-zinc-600 to-zinc-800 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Deysi Alicia Flores Toledo</h3>
                            <p class="text-xs text-zinc-400">Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 bg-zinc-700 hover:bg-zinc-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">📄 Ver CV</button>
                        <button class="flex-1 bg-emerald-700 hover:bg-emerald-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">⬇️ Descargar CV</button>
                    </div>
                </div>

                <div class="p-6 transition-colors">
                    <div class="flex gap-4 mb-6">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-zinc-600 to-zinc-800 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Roxana Karina Diaz Zavala</h3>
                            <p class="text-xs text-zinc-400">Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 bg-zinc-700 hover:bg-zinc-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">📄 Ver CV</button>
                        <button class="flex-1 bg-emerald-700 hover:bg-emerald-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">⬇️ Descargar CV</button>
                    </div>
                </div>

                <div class="p-6 transition-colors">
                    <div class="flex gap-4 mb-6">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-zinc-600 to-zinc-800 flex-shrink-0"></div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Madely Jhuleys Blas Bacilio</h3>
                            <p class="text-xs text-zinc-400">Docente con amplia experiencia.</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button class="flex-1 bg-zinc-700 hover:bg-zinc-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">📄 Ver CV</button>
                        <button class="flex-1 bg-emerald-700 hover:bg-emerald-600 text-white px-3 py-2 rounded text-xs font-bold transition-colors">⬇️ Descargar CV</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OTHER COURSES SECTION --}}
    <section class="border-b border-zinc-800 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-12">Otras capacitaciones que te pueden interesar</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden hover:border-zinc-700">
                    <div class="bg-gradient-to-br from-zinc-700 to-zinc-800 h-40 flex items-center justify-center text-5xl">📱</div>
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-white mb-2">MARKETING DIGITAL CON INTELIGENCIA ARTIFICIAL</h3>
                        <p class="text-xs text-zinc-400">Aprende a impulsar tu negocio con estrategias digitales modernas.</p>
                    </div>
                </div>

                <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden hover:border-zinc-700">
                    <div class="bg-gradient-to-br from-zinc-700 to-zinc-800 h-40 flex items-center justify-center text-5xl">💻</div>
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-white mb-2">DESARROLLO WEB FULL STACK</h3>
                        <p class="text-xs text-zinc-400">Conviértete en desarrollador web con tecnologías actuales.</p>
                    </div>
                </div>

                <div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden hover:border-zinc-700">
                    <div class="bg-gradient-to-br from-zinc-700 to-zinc-800 h-40 flex items-center justify-center text-5xl">🎨</div>
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-white mb-2">DISEÑO GRÁFICO PROFESIONAL</h3>
                        <p class="text-xs text-zinc-400">Domina las herramientas de diseño más demandadas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA FINAL SECTION --}}
    <section class="bg-zinc-900/50 border-b border-zinc-800 py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Da el siguiente paso en tu formación profesional</h2>
            <p class="text-base text-slate-300 mb-8 max-w-2xl mx-auto">
                Inscríbete ahora y empieza a desarrollar habilidades en Ofimática Profesional con nuestra base sólida de enseñanza.
            </p>
            <button class="bg-zinc-800 hover:bg-zinc-700 text-white px-8 py-3 rounded-lg font-bold transition-colors">
                Inscribirse
            </button>
        </div>
    </section>

</div>

<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const content = item.querySelector('.accordion-content');
            const icon = item.querySelector('.accordion-icon');

            // Cerrar otros acordeones
            document.querySelectorAll('.accordion-item').forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.accordion-content').style.maxHeight = '0';
                    otherItem.querySelector('.accordion-icon').style.transform = 'rotate(0deg)';
                }
            });

            item.classList.toggle('active');

            if (item.classList.contains('active')) {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.style.maxHeight = '0';
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });

    // Inicializar el primer acordeón
    const firstItem = document.querySelector('.accordion-item.active');
    if (firstItem) {
        const content = firstItem.querySelector('.accordion-content');
        content.style.maxHeight = content.scrollHeight + 'px';
    }
</script>

@endsection
