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
      <h1 class="font-display text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl 2xl:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-4 sm:mb-6 text-white uppercase">
        DISEÑO WEB.<br>HECHO SIMPLE.
      </h1>
      <p class="text-white/40 text-sm sm:text-lg md:text-xl max-w-2xl mx-auto mb-8 sm:mb-12 font-light leading-relaxed">
        Eliminamos la fricción técnica para que puedas concentrarte en lo que importa: hacer crecer tu negocio con una web que proyecta confianza y calidad.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mb-8 sm:mb-16 hero-buttons-container">
        <a href="#contacto" class="w-full sm:w-auto px-8 sm:px-10 py-4 sm:py-5 bg-white text-black font-display font-bold text-xs sm:text-sm uppercase tracking-widest btn-glow text-center">
          Empezar Ahora
        </a>
        <a href="#proceso" class="w-full sm:w-auto px-8 sm:px-10 py-4 sm:py-5 border border-blueprint text-white font-display font-bold text-xs sm:text-sm uppercase tracking-widest hover:bg-white/5 transition-all text-center">
          Ver Metodología
        </a>
      </div>
      <div class="flex flex-row items-center justify-center gap-2 sm:gap-8 text-white/20">
        <div class="flex items-center gap-1.5 sm:gap-3">
          <i class="ti ti-clock text-xl sm:text-2xl text-white"></i>
          <div class="text-left">
            <div class="text-[10px] sm:text-[11px] font-bold text-white/50 uppercase tracking-wider">24/7</div>
            <div class="text-[9px] sm:text-[10px] text-white/25">Presencia</div>
          </div>
        </div>
        <div class="w-px h-8 sm:h-10 bg-white/10"></div>
        <div class="flex items-center gap-1.5 sm:gap-3">
          <i class="ti ti-device-mobile text-xl sm:text-2xl text-white"></i>
          <div class="text-left">
            <div class="text-[10px] sm:text-[11px] font-bold text-white/50 uppercase tracking-wider">Responsive</div>
            <div class="text-[9px] sm:text-[10px] text-white/25">Diseño</div>
          </div>
        </div>
        <div class="w-px h-8 sm:h-10 bg-white/10"></div>
        <div class="flex items-center gap-1.5 sm:gap-3">
          <i class="ti ti-rocket text-xl sm:text-2xl text-white"></i>
          <div class="text-left">
            <div class="text-[10px] sm:text-[11px] font-bold text-white/50 uppercase tracking-wider">SEO</div>
            <div class="text-[9px] sm:text-[10px] text-white/25">Optimizado</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ BENEFICIOS ═══════ -->
  <section class="py-16 sm:py-24 md:py-32 px-4 sm:px-10 border-t border-blueprint">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-y-16 md:gap-x-12 lg:gap-x-20">

        <div>
          <div class="flex items-center gap-4 mb-4">
            <i class="ti ti-clock text-3xl text-white"></i>
            <h3 class="font-display text-2xl font-bold text-white">Presencia 24/7</h3>
          </div>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            Tu negocio nunca duerme. Construimos plataformas robustas que funcionan sin interrupciones, captando clientes mientras tú descansas.
          </p>
        </div>

        <div>
          <div class="flex items-center gap-4 mb-4">
            <i class="ti ti-briefcase text-3xl text-white"></i>
            <h3 class="font-display text-2xl font-bold text-white">Imagen Profesional</h3>
          </div>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            La primera impresión es la que cuenta. Diseñamos estéticas que elevan el valor percibido de tu marca al nivel de las grandes empresas.
          </p>
        </div>

        <div>
          <div class="flex items-center gap-4 mb-4">
            <i class="ti ti-users text-3xl text-white"></i>
            <h3 class="font-display text-2xl font-bold text-white">Más Contactos</h3>
          </div>
          <p class="text-white/40 leading-relaxed font-light text-sm sm:text-base">
            No solo es diseño, es psicología. Optimizamos cada sección para guiar al visitante hacia la acción, aumentando tus prospectos reales.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════ PROCESO / HOJA DE RUTA ═══════ -->
  <section id="proceso" class="py-16 sm:py-24 md:py-32 lg:py-40 px-4 sm:px-10 border-t border-blueprint relative overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-10 sm:mb-16 md:mb-24">
        <h2 class="font-display text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-4 text-white uppercase">NUESTRA HOJA DE RUTA</h2>
        <p class="text-white/40 uppercase tracking-[0.2em] text-xs">Cuatro fases hacia tu éxito digital</p>
      </div>

      <div class="relative">
        <div class="process-line hidden lg:block"></div>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-16 lg:gap-0 relative z-10">

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-5xl sm:text-7xl md:text-8xl font-extrabold text-white mb-4 sm:mb-6">01</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">DESCUBRIMIENTO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Auditoría de tu negocio y definición de objetivos claros.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-5xl sm:text-7xl md:text-8xl font-extrabold text-white mb-4 sm:mb-6">02</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">PROPUESTA</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Diseño visual y arquitectura del sitio bajo tu aprobación.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-5xl sm:text-7xl md:text-8xl font-extrabold text-white mb-4 sm:mb-6">03</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">DESARROLLO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Construcción con tecnologías modernas y optimización SEO.</p>
          </div>

          <div class="flex flex-col items-center lg:items-start lg:px-8">
            <div class="font-display text-5xl sm:text-7xl md:text-8xl font-extrabold text-white mb-4 sm:mb-6">04</div>
            <h4 class="font-display text-lg font-bold mb-3 text-white uppercase">LANZAMIENTO</h4>
            <p class="text-xs sm:text-sm text-white/40 font-light leading-relaxed text-center lg:text-left max-w-[240px] lg:max-w-[200px]">Pruebas finales, puesta en marcha y soporte continuo.</p>
          </div>

        </div>
      </div>
    </div>
  </section>


  <script>
  (function(){
    for(var i=0;i<n;i++){
      var d=document.createElement('button');
      d.className='w-2 h-2 rounded-full transition-all duration-300 '+(i===0?'bg-white w-6':'bg-white/20');
      d.setAttribute('aria-label','Testimonio '+(i+1));
      (function(idx){d.onclick=function(){go(idx)}})(i);
      dots.appendChild(d);
    }
    function go(idx){
      cur=idx;
      items[idx].scrollIntoView({behavior:'smooth',inline:'center',block:'nearest'});
      var ds=dots.children;
      for(var i=0;i<ds.length;i++){
        ds[i].className='w-2 h-2 rounded-full transition-all duration-300 '+(i===idx?'bg-white w-6':'bg-white/20');
      }
      resetTimer();
    }
    function next(){go((cur+1)%n)}
    function resetTimer(){clearInterval(timer);timer=setInterval(next,5000)}
    el.addEventListener('scroll',function(){
      var sl=el.scrollLeft,w=el.offsetWidth;
      var idx=Math.round(sl/w);
      if(idx!==cur&&idx>=0&&idx<n){cur=idx;var ds=dots.children;for(var i=0;i<ds.length;i++){ds[i].className='w-2 h-2 rounded-full transition-all duration-300 '+(i===idx?'bg-white w-6':'bg-white/20')}}
    });
    resetTimer();
  })();
  </script>

  <!-- ═══════ CONTACTO ═══════ -->
  <section id="contacto" class="relative py-16 sm:py-24 md:py-32 lg:py-40 px-4 sm:px-10 overflow-hidden">

    <div class="absolute inset-0 z-0 opacity-20 sm:opacity-30 cta-video-container">
      <video src="https://videos.pexels.com/video-files/8597294/8597294-hd_1280_720_30fps.mp4" poster="https://images.pexels.com/videos/8597294/pexels-photo-8597294.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=630&w=1200" autoplay muted loop playsinline preload="metadata" class="w-full h-full object-cover">
      </video>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10">
      <h2 class="font-display text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold tracking-tighter mb-4 sm:mb-6 text-white uppercase">HAGÁMOSLO REAL.</h2>
      <p class="text-white/60 text-base sm:text-lg mb-8 sm:mb-12 max-w-xl mx-auto font-light">
        Cuéntanos tu idea hoy y recibe una propuesta profesional en menos de 24 horas.
      </p>

      <div class="max-w-md mx-auto">
        <form class="space-y-6" onsubmit="event.preventDefault(); this.querySelector('button').textContent='Enviado ✓'; this.querySelector('button').disabled=true;">
          <input type="text" placeholder="Tu Nombre / Empresa" required class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors">
          <input type="email" placeholder="Correo Electrónico" required class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors">
          <textarea placeholder="Cuéntanos brevemente sobre tu proyecto..." required rows="3" class="w-full bg-transparent border-b border-blueprint py-4 px-2 text-white placeholder:text-white/20 outline-none focus:border-white transition-colors resize-none"></textarea>
          <button type="submit" class="w-full mt-6 sm:mt-8 px-8 py-4 sm:py-5 bg-white text-black font-display font-black text-sm uppercase tracking-widest btn-glow transition-all">
            Solicitar Blueprint Gratuito
          </button>
        </form>
      </div>
    </div>
  </section>

</div>
@endsection
