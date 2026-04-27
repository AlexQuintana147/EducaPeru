@extends('layouts.app')

@section('title', 'Bienvenido - Instituto de Programación')

@section('content')
<section class="relative flex items-center justify-center px-4 sm:px-6 overflow-hidden bg-[#f5f0eb]" style="min-height: calc(100vh - 4rem); padding-top: 2rem; padding-bottom: 2rem;">
    <div class="max-w-6xl mx-auto w-full flex flex-col justify-center">
        <div class="text-center">

            <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 mb-4 sm:mb-6 md:mb-8 lg:mb-10 leading-tight tracking-tight px-2">
                Capacitación profesional<br class="sm:hidden"> en programación
                <span class="inline-flex items-center ml-1 sm:ml-2 md:ml-3 -space-x-1 sm:-space-x-2 md:-space-x-3 align-middle">
                    <div class="w-8 h-8 xs:w-10 xs:h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 xl:w-20 xl:h-20 rounded-full bg-gray-300 border-2 border-[#f5f0eb] overflow-hidden">
                        <img src="https://cdn-icons-png.flaticon.com/512/7022/7022937.png" alt="User 1" class="w-full h-full object-cover">
                    </div>
                    <div class="w-8 h-8 xs:w-10 xs:h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 xl:w-20 xl:h-20 rounded-full bg-gray-300 border-2 border-[#f5f0eb] overflow-hidden">
                        <img src="https://cdn-icons-png.flaticon.com/512/7022/7022937.png" alt="User 2" class="w-full h-full object-cover">
                    </div>
                    <div class="w-8 h-8 xs:w-10 xs:h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 xl:w-20 xl:h-20 rounded-full bg-gray-300 border-2 border-[#f5f0eb] overflow-hidden">
                        <img src="https://cdn-icons-png.flaticon.com/512/7022/7022937.png" alt="User 3" class="w-full h-full object-cover">
                    </div>
                </span><br>
                y desarrollo web para empresas
            </h1>

            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-600 mb-6 sm:mb-8 md:mb-10 max-w-3xl mx-auto px-4">
                Formamos equipos de alto rendimiento con programas especializados en tecnologías modernas
            </p>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center mb-6 sm:mb-8 md:mb-10 px-4">
                <a href="#cursos" class="w-full sm:w-auto inline-flex items-center justify-center bg-blue-600 text-white px-8 sm:px-10 md:px-12 py-3.5 sm:py-4 rounded-full text-sm sm:text-base md:text-lg font-medium hover:bg-blue-700 transition-all duration-200">
                    Ver capacitaciones
                </a>
                <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center bg-transparent text-blue-600 px-8 sm:px-10 md:px-12 py-3.5 sm:py-4 rounded-full text-sm sm:text-base md:text-lg font-medium border-2 border-blue-600 hover:bg-blue-50 transition-all duration-200">
                    Solicitar información
                </button>
            </div>

        </div>
    </div>
</section>

<!-- Sección de Servicios -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 px-4 sm:px-6 lg:px-8 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 text-center mb-8 sm:mb-12 md:mb-16">
            Servicios flexibles para cada<br class="hidden sm:block"> necesidad al instante
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            <!-- Tarjeta Izquierda: Cursos Disponibles -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 shadow-sm">
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">
                    <span class="text-blue-600">Explora</span> nuestros cursos
                </h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Capacita a tu equipo con cursos especializados en las tecnologías más demandadas del mercado.
                </p>

                <div class="flex flex-col sm:relative sm:flex-row sm:justify-end">
                    <img src="{{ asset('image/clases1.webp') }}" alt="Cursos de programación" class="w-full max-w-sm h-auto object-contain mx-auto sm:mx-0 mb-6 sm:mb-0">
                    <a href="#cursos" class="w-full sm:w-auto sm:absolute sm:bottom-8 sm:left-0 inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-3 rounded-full text-base font-semibold border-2 border-blue-600 hover:bg-blue-50 transition-all duration-200">
                        Ver cursos
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta Derecha: Cotizar Web -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 shadow-sm">
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">
                    <span class="text-blue-600">Desarrolla</span> tu sitio web
                </h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Obtén un desarrollo web profesional con tecnologías modernas y diseño personalizado para tu empresa.
                </p>

                <div class="flex flex-col sm:relative sm:flex-row sm:justify-end">
                    <img src="{{ asset('image/desarrollo2.webp') }}" alt="Desarrollo web" class="w-full max-w-sm h-auto object-contain mx-auto sm:mx-0 mb-6 sm:mb-0">
                    <button type="button" class="w-full sm:w-auto sm:absolute sm:bottom-8 sm:left-0 inline-flex items-center justify-center gap-2 bg-white text-blue-600 px-8 py-3 rounded-full text-base font-semibold border-2 border-blue-600 hover:bg-blue-50 transition-all duration-200">
                        Cotizar web
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 sm:py-16 md:py-20 lg:py-24 px-4 sm:px-6 lg:px-8 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 text-center mb-8 sm:mb-12 md:mb-16">
            Docentes<br class="hidden sm:block">
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
            <!-- Docente 1: Roxana Karina Diaz Zavala -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex-shrink-0"></div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">
                            Roxana Karina<br class="hidden xs:block sm:hidden"> Diaz Zavala
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mt-1">Docente Especialista</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm sm:text-base leading-relaxed text-justify">
                    Técnica en Computación e Informática y Bachiller en Ingeniería de Sistemas, con amplia experiencia en soporte técnico, gestión administrativa y docencia. Especialista en mantenimiento de equipos, configuración de software y desarrollo básico web, destacando por su capacidad para transmitir conocimientos técnicos de forma clara y práctica.
                </p>
            </div>

            <!-- Docente 2: Deysi Alicia Flores Toledo -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex-shrink-0"></div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900">
                            Deysi Alicia<br class="hidden xs:block sm:hidden"> Flores Toledo
                        </h3>
                        <p class="text-sm text-blue-600 font-semibold mt-1">Docente Especialista</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm sm:text-base leading-relaxed text-justify">
                    Licenciada en Educación, egresada de Maestría en Docencia Universitaria, con sólida experiencia en formación académica en áreas tecnológicas y administrativas. Destaca por el uso de metodologías innovadoras, enfoque en competencias y compromiso con la calidad educativa y el desarrollo integral de sus estudiantes.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-12 sm:py-16 md:py-20 lg:py-24 px-4 sm:px-6 lg:px-8 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 text-center mb-8 sm:mb-12 md:mb-16">
            Nosotros<br class="hidden sm:block">
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 md:gap-8">
            <div class="bg-white rounded-3xl p-6 sm:p-8 md:p-10 shadow-sm">
                <div class="space-y-6">
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed text-justify">
                        En <span class="font-bold text-gray-900">EDUCA PERÚ S.A.C.</span>, formamos profesionales preparados para destacar en un mercado competitivo, a través de programas de especialización prácticos, actualizados y orientados a resultados reales. Nuestro compromiso es desarrollar talento humano que se adapte a las exigencias del sector empresarial y tecnológico actual.
                    </p>
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed text-justify">
                        Combinamos innovación, excelencia académica y acompañamiento constante para que cada aprendizaje se convierta en una oportunidad concreta de crecimiento. Creemos que la educación continua es el pilar fundamental para fortalecer competencias, potenciar el talento y generar nuevas oportunidades profesionales.
                    </p>
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed text-justify">
                        Nuestro enfoque metodológico combina teoría y práctica, garantizando una experiencia formativa integral que trascienda lo teórico y se traduzca en resultados concretos en el desempeño laboral de nuestros participantes.
                    </p>
                    <div class="mt-8 pl-6 border-l-4 border-blue-600 bg-blue-50 py-4">
                        <p class="text-lg sm:text-xl font-semibold text-gray-900 italic">
                            "La preparación de hoy es el éxito de mañana."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

