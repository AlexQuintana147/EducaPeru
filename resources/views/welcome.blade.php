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
                <a href="#cursos" class="w-full sm:w-auto inline-flex items-center justify-center bg-blue-600 text-white px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm sm:text-base font-semibold hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    Ver capacitaciones
                </a>
                <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center bg-white text-gray-900 px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm sm:text-base font-semibold border border-gray-300 hover:border-gray-400 transition-all duration-200 shadow-sm hover:shadow-md">
                    Solicitar información
                </button>
            </div>

        </div>
    </div>
</section>

@endsection

