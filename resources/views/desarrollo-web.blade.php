@extends('layouts.app')

@section('title', 'Desarrollo Web Profesional - EducaPerú')

@section('content')
<style>
  /* Horizontal Line for Process */
  .process-line {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(255, 255, 255, 0.2) 50%, transparent 50%);
    background-size: 20px 1px;
    z-index: 0;
  }

  /* Animation for Ink CTA */
  .cta-video-container {
    mask-image: radial-gradient(circle at center, black 0%, transparent 80%);
    -webkit-mask-image: radial-gradient(circle at center, black 0%, transparent 80%);
  }
</style>

<div class="relative w-full" style="background-color: var(--bg);">

  <!-- ═══════ HERO ═══════ -->
  <section class="relative hero-full px-4 sm:px-10">
    <div class="max-w-5xl mx-auto text-center relative z-10">
      <div class="inline-block px-4 py-1.5 border border-blueprint rounded-full text-[10px] font-bold uppercase tracking-[0.3em] text-white/40 mb-12">
        Arquitectura Digital de Alto Impacto
      </div>
      <h1 class="font-display text-4xl sm:text-6xl md:text-7xl lg:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-8 text-white uppercase">
        DISEÑO WEB.<br>HECHO SIMPLE.
      </h1>
      <p class="text-white/40 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-16 font-light leading-relaxed">
        Eliminamos la fricción técnica para que puedas concentrarte en lo que importa: hacer crecer tu negocio con una web que proyecta confianza y calidad.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-20">
        <a href="#contacto" class="w-full sm:w-auto px-10 py-5 bg-white text-black font-display font-bold text-sm uppercase tracking-widest btn-glow text-center">
          Empezar Ahora
        </a>
        <a href="#proceso" class="w-full sm:w-auto px-10 py-5 border border-blueprint text-white font-display font-bold text-sm uppercase tracking-widest hover:bg-white/5 transition-all text-center">
          Ver Metodología
        </a>
      </div>
      <div class="flex items-center justify-center gap-8 sm:gap-14 text-white/20">
        <div class="flex items-center gap-3">
          <i class="ti ti-clock text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">24/7</div>
            <div class="text-[10px] text-white/25">Presencia</div>
          </div>
        </div>
        <div class="w-px h-10 bg-white/10"></div>
        <div class="flex items-center gap-3">
          <i class="ti ti-device-mobile text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">Responsive</div>
            <div class="text-[10px] text-white/25">Diseño</div>
          </div>
        </div>
        <div class="w-px h-10 bg-white/10"></div>
        <div class="flex items-center gap-3">
          <i class="ti ti-rocket text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">SEO</div>
            <div class="text-[10px] text-white/25">Optimizado</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ BENEFICIOS ═══════ -->
  <section class="py-32 px-4 sm:px-10 border-t border-blueprint">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-y-16 md:gap-x-12 lg:gap-x-20">

        <div class="group">
          <div class="mb-8 text-white/20 transition-colors duration-300 group-hover:text-white">
            <i class="ti ti-clock text-6xl font-thin"></i>
          </div>
          <h3 class="font-display text-2xl font-bold mb-4 text-white">Presencia 24/7</h3>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            Tu negocio nunca duerme. Construimos plataformas robustas que funcionan sin interrupciones, captando clientes mientras tú descansas.
          </p>
        </div>

        <div class="group">
          <div class="mb-8 text-white/20 transition-colors duration-300 group-hover:text-white">
            <i class="ti ti-briefcase text-6xl font-thin"></i>
          </div>
          <h3 class="font-display text-2xl font-bold mb-4 text-white">Imagen Profesional</h3>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            La primera impresión es la que cuenta. Diseñamos estéticas que elevan el valor percibido de tu marca al nivel de las grandes empresas.
          </p>
        </div>

        <div class="group">
          <div class="mb-8 text-white/20 transition-colors duration-300 group-hover:text-white">
            <i class="ti ti-users text-6xl font-thin"></i>
          </div>
          <h3 class="font-display text-2xl font-bold mb-4 text-white">Más Contactos</h3>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            No solo es diseño, es psicología. Optimizamos cada sección para guiar al visitante hacia la acción, aumentando tus prospectos reales.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ PROCESO / HOJA DE RUTA ═══════ -->
  <section id="proceso" class="py-48 px-4 sm:px-10 border-t border-blueprint relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-32">
        <h2 class="font-display text-4xl sm:text-5xl font-extrabold tracking-tighter mb-4 text-white uppercase">NUESTRA HOJA DE RUTA</h2>
        <p class="text-white/40 uppercase tracking-[0.2em] text-xs">Cuatro fases hacia tu éxito digital</p>
      </div>

      <div class="relative">
        <div class="process-line hidden lg:block"></div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-16 lg:gap-0 relative z-10">

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-7xl sm:text-8xl font-extrabold text-white/5 mb-6 hover:text-white transition-colors duration-300 cursor-default">01</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">DESCUBRIMIENTO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Auditoría de tu negocio y definición de objetivos claros.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-7xl sm:text-8xl font-extrabold text-white/5 mb-6 hover:text-white transition-colors duration-300 cursor-default">02</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">PROPUESTA</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Diseño visual y arquitectura del sitio bajo tu aprobación.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-7xl sm:text-8xl font-extrabold text-white/5 mb-6 hover:text-white transition-colors duration-300 cursor-default">03</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">DESARROLLO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Construcción con tecnologías modernas y optimización SEO.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-7xl sm:text-8xl font-extrabold text-white/5 mb-6 hover:text-white transition-colors duration-300 cursor-default">04</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">LANZAMIENTO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Pruebas finales, puesta en marcha y soporte continuo.</p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ TESTIMONIAL ═══════ -->
  <section class="py-32 px-4 sm:px-10 border-y border-blueprint bg-white/[0.01]">
    <div class="max-w-4xl mx-auto text-center">
      <i class="ti ti-quote text-5xl text-white/20 mb-10 block"></i>
      <blockquote class="font-display text-xl sm:text-2xl md:text-3xl lg:text-4xl font-medium leading-tight tracking-tight mb-12 italic text-white/90">
        "Triplicamos nuestros contactos desde que lanzamos la nueva web. Y lo mejor, no tuve que aprender nada de programación ni preocuparme por servidores."
      </blockquote>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <div class="w-12 h-12 rounded-full border border-blueprint overflow-hidden">
          <img src="https://i.pravatar.cc/100?u=ceo" alt="CEO" class="w-full h-full object-cover">
        </div>
        <div class="text-center sm:text-left">
          <p class="font-bold text-sm text-white">Carlos Mendoza</p>
          <p class="text-xs text-white/40 uppercase tracking-widest mt-0.5">Director General, Logística Andina</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ CONTACTO ═══════ -->
  <section id="contacto" class="relative py-48 px-4 sm:px-10 overflow-hidden">

    <div class="absolute inset-0 z-0 opacity-20 sm:opacity-30 cta-video-container">
      <video src="https://videos.pexels.com/video-files/8597294/8597294-hd_1280_720_30fps.mp4" poster="https://images.pexels.com/videos/8597294/pexels-photo-8597294.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=630&w=1200" autoplay muted loop playsinline preload="metadata" class="w-full h-full object-cover">
      </video>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
      <h2 class="font-display text-5xl sm:text-7xl md:text-8xl font-extrabold tracking-tighter mb-8 text-white uppercase">HAGÁMOSLO REAL.</h2>
      <p class="text-white/60 text-base sm:text-lg mb-16 max-w-xl mx-auto font-light">
        Cuéntanos tu idea hoy y recibe una propuesta profesional en menos de 24 horas.
      </p>

      <div class="max-w-md mx-auto">
        <form class="space-y-6" onsubmit="event.preventDefault(); this.querySelector('button').textContent='Enviado ✓'; this.querySelector('button').disabled=true;">
          <input type="text" placeholder="Tu Nombre / Empresa" required class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors">
          <input type="email" placeholder="Correo Electrónico" required class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors">
          <textarea placeholder="Cuéntanos brevemente sobre tu proyecto..." required rows="3" class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors resize-none"></textarea>
          <button type="submit" class="w-full mt-10 px-10 py-6 bg-white text-black font-display font-black text-sm uppercase tracking-widest btn-glow transition-all">
            Solicitar Blueprint Gratuito
          </button>
        </form>
      </div>
    </div>
  </section>

</div>
@endsection
