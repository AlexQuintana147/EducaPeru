@extends('layouts.app')

@section('title', 'Capacitaciones - Instituto de Programación')

@section('content')

<style>
    .course-card {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
    }
    .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    .badge-coming-soon {
        background: linear-gradient(135deg, #f59e0b, #f97316);
        animation: pulse-badge 2s infinite;
    }
    @keyframes pulse-badge {
        0%, 100% { box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4); }
        50% { box-shadow: 0 0 0 8px rgba(249, 115, 22, 0); }
    }
    .btn-detail {
        background: linear-gradient(135deg, #f97316, #ea580c);
        transition: all 0.3s ease;
    }
    .btn-detail:hover {
        background: linear-gradient(135deg, #ea580c, #c2410c);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(249, 115, 22, 0.4);
    }
    .btn-detail:active {
        transform: translateY(0);
    }
    .filter-btn {
        transition: all 0.25s ease;
    }
    .filter-btn.active {
        background-color: #1e3a8a;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }
    .hero-gradient {
        background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 50%, #2563eb 100%);
    }
    .cpp-card {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 60%, #1e3a8a 100%);
    }
    .cpp-glow {
        animation: cpp-glow 3s ease-in-out infinite;
    }
    @keyframes cpp-glow {
        0%, 100% { text-shadow: 0 0 20px rgba(96, 165, 250, 0.5); }
        50% { text-shadow: 0 0 40px rgba(96, 165, 250, 0.9), 0 0 60px rgba(59, 130, 246, 0.4); }
    }
    .tag-blue {
        background-color: #dbeafe;
        color: #1d4ed8;
    }
    .tag-purple {
        background-color: #ede9fe;
        color: #7c3aed;
    }
    .price-original {
        text-decoration: line-through;
        color: #9ca3af;
    }
    .price-current {
        color: #f97316;
        font-weight: 800;
    }
    .section-divider {
        height: 3px;
        background: linear-gradient(90deg, #1d4ed8, #7c3aed, #f97316);
        border-radius: 2px;
    }
    .stats-card {
        background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
    }
</style>

{{-- Hero Section --}}
<section class="hero-gradient py-16 sm:py-20 md:py-24 px-4 sm:px-6 relative overflow-hidden">
    {{-- Background decorations --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-96 h-96 bg-white opacity-5 rounded-full"></div>
        <div class="absolute -bottom-32 -left-20 w-80 h-80 bg-blue-300 opacity-10 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-400 opacity-5 rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black text-white mb-4 sm:mb-6 leading-tight">
                Aprende las tecnologías<br class="hidden sm:block"> más demandadas
            </h1>
            <p class="text-blue-100 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-8 sm:mb-10">
                Cursos prácticos y profesionales diseñados para llevarte del nivel básico al avanzado con instructores expertos.
            </p>

            {{-- Stats --}}
            <div class="flex flex-wrap justify-center gap-6 sm:gap-10 md:gap-16">
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-black text-white">+500</div>
                    <div class="text-blue-200 text-sm mt-1">Estudiantes</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-black text-white">98%</div>
                    <div class="text-blue-200 text-sm mt-1">Satisfacción</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-black text-white">10+</div>
                    <div class="text-blue-200 text-sm mt-1">Cursos</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-black text-white">2</div>
                    <div class="text-blue-200 text-sm mt-1">Meses promedio</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="py-12 sm:py-16 md:py-20 px-4 sm:px-6 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto">

        {{-- Section Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-12">
            <div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-gray-900 mb-2">
                    Cursos disponibles
                </h2>
                <div class="section-divider w-16"></div>
            </div>
            {{-- Filter buttons --}}
            <div class="flex flex-wrap gap-2">
                <button class="filter-btn active text-sm font-semibold px-4 py-2 rounded-full border-2 border-blue-900">
                    Todos
                </button>
                <button class="filter-btn text-sm font-semibold px-4 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-blue-900 hover:text-blue-900">
                    Básico
                </button>
                <button class="filter-btn text-sm font-semibold px-4 py-2 rounded-full border-2 border-gray-300 text-gray-600 hover:border-blue-900 hover:text-blue-900">
                    Próximamente
                </button>
            </div>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            {{-- Card: Ofimática Profesional --}}
            <div class="course-card bg-white rounded-2xl overflow-hidden shadow-md flex flex-col">
                {{-- Image --}}
                <div class="relative">
                    <img
                        src="{{ asset('image/clases1.webp') }}"
                        alt="Ofimática Profesional"
                        class="w-full h-48 object-cover"
                    >
                    {{-- Overlay gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    {{-- Badge: Próximamente --}}
                    <span class="badge-coming-soon absolute top-3 right-3 text-white text-xs font-black px-3 py-1.5 rounded-full shadow-lg">
                        Próximamente
                    </span>
                </div>

                {{-- Body --}}
                <div class="p-5 flex flex-col flex-1">
                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="tag-blue text-xs font-semibold px-3 py-1 rounded-lg">
                            Ofimática Profesional: Word, PowerPoint y Excel
                        </span>
                        <span class="tag-purple text-xs font-semibold px-3 py-1 rounded-lg">
                            Básico
                        </span>
                    </div>

                    {{-- Title --}}
                    <h3 class="text-base font-black text-gray-900 uppercase tracking-wide mb-1">
                        Ofimática Profesional
                    </h3>
                    <p class="text-sm text-gray-500 mb-4 flex-1">
                        Ofimática Profesional
                    </p>

                    {{-- Price & Duration --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="price-original text-sm">S/ 100.00</span>
                        <span class="price-current text-xl">S/ 49.90</span>
                        <span class="flex items-center gap-1 text-gray-500 text-sm ml-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            02 meses
                        </span>
                    </div>

                    {{-- Button --}}
                    <a href="#" class="btn-detail w-full text-center text-white font-black py-3 rounded-xl text-sm">
                        Ver detalle
                    </a>
                </div>
            </div>

            {{-- Card: C++ (Próximamente) --}}
            <div class="course-card cpp-card rounded-2xl overflow-hidden shadow-md flex flex-col">
                {{-- Image placeholder --}}
                <div class="relative h-48 flex items-center justify-center overflow-hidden">
                    {{-- Animated background --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-800"></div>
                    <div class="absolute inset-0 opacity-20">
                        <div class="absolute top-4 left-4 text-blue-400 text-xs font-mono opacity-60">#include &lt;iostream&gt;</div>
                        <div class="absolute top-10 left-4 text-blue-300 text-xs font-mono opacity-40">int main() {</div>
                        <div class="absolute top-16 left-8 text-green-400 text-xs font-mono opacity-50">cout &lt;&lt; "Hello";</div>
                        <div class="absolute top-22 left-4 text-blue-300 text-xs font-mono opacity-40">return 0;</div>
                        <div class="absolute bottom-8 right-4 text-yellow-400 text-xs font-mono opacity-40">}</div>
                        <div class="absolute bottom-4 right-6 text-blue-400 text-xs font-mono opacity-30">// C++</div>
                    </div>
                    {{-- C++ Logo text --}}
                    <div class="relative z-10 text-center">
                        <div class="cpp-glow text-5xl font-black text-white tracking-tight">C++</div>
                        <div class="text-blue-300 text-xs font-semibold mt-1 tracking-widest uppercase">Programación</div>
                    </div>
                    {{-- Badge --}}
                    <span class="badge-coming-soon absolute top-3 right-3 text-white text-xs font-black px-3 py-1.5 rounded-full shadow-lg">
                        Próximamente
                    </span>
                </div>

                {{-- Body --}}
                <div class="p-5 flex flex-col flex-1">
                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span class="bg-blue-900/40 text-blue-300 text-xs font-semibold px-3 py-1 rounded-lg border border-blue-700/30">
                            Programación C++
                        </span>
                        <span class="bg-purple-900/40 text-purple-300 text-xs font-semibold px-3 py-1 rounded-lg border border-purple-700/30">
                            Intermedio
                        </span>
                    </div>

                    {{-- Title --}}
                    <h3 class="text-base font-black text-white uppercase tracking-wide mb-1">
                        Programación C++
                    </h3>
                    <p class="text-sm text-blue-300 mb-4 flex-1">
                        Fundamentos y programación orientada a objetos con C++
                    </p>

                    {{-- Price placeholder --}}
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-gray-500 text-sm italic">Precio por confirmar</span>
                        <span class="flex items-center gap-1 text-gray-500 text-sm ml-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            02 meses
                        </span>
                    </div>

                    {{-- Button disabled --}}
                    <button disabled class="w-full text-center text-gray-400 font-black py-3 rounded-xl text-sm bg-white/10 border border-white/10 cursor-not-allowed">
                        Próximamente
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- CTA Section --}}
<section class="py-12 sm:py-16 px-4 sm:px-6 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-gray-900 mb-4">
            ¿No encuentras lo que buscas?
        </h2>
        <p class="text-gray-500 text-base sm:text-lg mb-8 max-w-xl mx-auto">
            Contáctanos y cuéntanos qué tecnología quieres aprender. Estamos ampliando nuestra oferta constantemente.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="#" class="inline-flex items-center justify-center gap-2 bg-blue-700 text-white px-8 py-3.5 rounded-full text-base font-bold hover:bg-blue-800 transition-all duration-200 shadow-lg shadow-blue-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                Contactar ahora
            </a>
            <a href="/" class="inline-flex items-center justify-center gap-2 bg-transparent text-blue-700 px-8 py-3.5 rounded-full text-base font-bold border-2 border-blue-700 hover:bg-blue-50 transition-all duration-200">
                Volver al inicio
            </a>
        </div>
    </div>
</section>

@endsection
