@extends('layouts.app')

@section('title', 'Bienvenido - Instituto de Programación')

@section('content')
<div class="relative w-full" style="background-color: var(--bg);">

  <!-- HERO -->
  <section class="relative hero-full px-4 sm:px-10">
    <div class="max-w-5xl mx-auto text-center relative z-10">
      <h1 class="font-display text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-4 sm:mb-6 text-white uppercase">
        FORMAMOS<br>DESARROLLADORES.
      </h1>
      <p class="text-white/40 text-sm sm:text-lg md:text-xl max-w-2xl mx-auto mb-8 sm:mb-12 font-light leading-relaxed">
        Programas especializados en tecnologías modernas para equipos de alto rendimiento y empresas que quieren crecer.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mb-8 sm:mb-16 hero-buttons-container">
        <a href="/capacitaciones" class="w-full sm:w-auto px-8 sm:px-10 py-4 sm:py-5 bg-white text-black font-display font-bold text-xs sm:text-sm uppercase tracking-widest btn-glow text-center">
          Ver capacitaciones
        </a>
        <a href="/desarrollo-web" class="w-full sm:w-auto px-8 sm:px-10 py-4 sm:py-5 border border-blueprint text-white font-display font-bold text-xs sm:text-sm uppercase tracking-widest hover:bg-white/5 transition-all text-center">
          Desarrollo web
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
          <div class="font-display text-xl sm:text-3xl font-extrabold text-white/60">3</div>
          <div class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] mt-1">Programas</div>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICIOS -->
  <section class="py-16 sm:py-24 md:py-32 px-4 sm:px-10 border-t border-blueprint">
    <div class="max-w-7xl mx-auto">
      <h2 class="font-display text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-8 sm:mb-12 md:mb-16 text-white uppercase text-center">
        Servicios flexibles para cada<br class="hidden sm:block"> necesidad al instante
      </h2>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Cursos -->
        <div class="border border-blueprint rounded-3xl p-8 sm:p-10" style="background-color: var(--bg-card);">
          <h3 class="font-display text-2xl sm:text-3xl font-bold mb-4 text-white">
            <span class="text-white/40">Explora</span> nuestros cursos
          </h3>
          <p class="text-white/40 text-sm sm:text-base mb-6 leading-relaxed">
            Capacita a tu equipo con cursos especializados en las tecnologías más demandadas del mercado.
          </p>
          <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
            <img src="{{ asset('image/clases1.webp') }}" alt="Cursos de programación" class="w-full max-w-xs h-auto object-contain rounded-lg">
            <a href="/capacitaciones" class="inline-flex items-center justify-center gap-2 border border-blueprint text-white px-8 py-3 rounded-full text-sm font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-all">
              Ver cursos
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
          </div>
        </div>

        <!-- Desarrollo Web -->
        <div class="border border-blueprint rounded-3xl p-8 sm:p-10" style="background-color: var(--bg-card);">
          <h3 class="font-display text-2xl sm:text-3xl font-bold mb-4 text-white">
            <span class="text-white/40">Desarrolla</span> tu sitio web
          </h3>
          <p class="text-white/40 text-sm sm:text-base mb-6 leading-relaxed">
            Obtén un desarrollo web profesional con tecnologías modernas y diseño personalizado para tu empresa.
          </p>
          <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
            <img src="{{ asset('image/desarrollo2.webp') }}" alt="Desarrollo web" class="w-full max-w-xs h-auto object-contain rounded-lg">
            <a href="/desarrollo-web" class="inline-flex items-center justify-center gap-2 border border-blueprint text-white px-8 py-3 rounded-full text-sm font-display font-bold uppercase tracking-widest hover:bg-white/5 transition-all">
              Cotizar web
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection
