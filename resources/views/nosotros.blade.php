@extends('layouts.app')

@section('title', 'Nosotros - EducaPerú')

@section('content')
<div class="relative w-full" style="background-color: var(--bg);">

  {{-- HERO --}}
  <section class="relative hero-full px-4 sm:px-10 border-b border-blueprint">
    <div class="max-w-5xl mx-auto text-center relative z-10">
      <div class="inline-block px-4 py-1.5 border border-blueprint rounded-full text-[10px] font-bold uppercase tracking-[0.3em] text-white/40 mb-12">
        Sobre Nosotros
      </div>
      <h1 class="font-display text-4xl sm:text-6xl md:text-7xl lg:text-[100px] font-extrabold leading-[0.95] sm:leading-[0.9] tracking-tighter mb-8 text-white uppercase">
        FORMAMOS<br><span class="text-white/20">DESARROLLADORES</span>
      </h1>
      <p class="text-white/40 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-16 font-light leading-relaxed">
        Plataforma de capacitaciones enfocada en enseñar programación de forma práctica, accesible y alineada al mercado laboral.
      </p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-20">
        <a href="#valores" class="w-full sm:w-auto px-10 py-5 bg-white text-black font-display font-bold text-sm uppercase tracking-widest btn-glow text-center">
          Nuestros valores
        </a>
        <a href="/capacitaciones" class="w-full sm:w-auto px-10 py-5 border border-blueprint text-white font-display font-bold text-sm uppercase tracking-widest hover:bg-white/5 transition-all text-center">
          Ver cursos
        </a>
      </div>
      <div class="flex items-center justify-center gap-8 sm:gap-14 text-white/20">
        <div class="flex items-center gap-3">
          <i class="ti ti-award text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">Excelencia</div>
            <div class="text-[10px] text-white/25">Académica</div>
          </div>
        </div>
        <div class="w-px h-10 bg-white/10"></div>
        <div class="flex items-center gap-3">
          <i class="ti ti-bulb text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">Innovación</div>
            <div class="text-[10px] text-white/25">Metodológica</div>
          </div>
        </div>
        <div class="w-px h-10 bg-white/10"></div>
        <div class="flex items-center gap-3">
          <i class="ti ti-heart-handshake text-2xl text-white/30"></i>
          <div class="text-left">
            <div class="text-[11px] font-bold text-white/50 uppercase tracking-wider">Compromiso</div>
            <div class="text-[10px] text-white/25">Permanente</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- QUIÉNES SOMOS --}}
  <section class="py-32 px-4 sm:px-10 border-b border-blueprint">
    <div class="max-w-4xl mx-auto">
      <div class="section-label">Quiénes somos</div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-12 text-white uppercase">
        Compromiso con el desarrollo profesional
      </h2>
      <div class="space-y-5 text-white/40 text-sm sm:text-base leading-relaxed font-light">
        <p>
          En el <span class="text-white font-semibold">Centro de Capacitación y Consultoría Empresarial EDUCA PERÚ S.A.C.</span> – RUC <span class="text-white font-semibold">20615550117</span>, asumimos el compromiso de contribuir activamente al desarrollo profesional de quienes buscan crecer, innovar y destacar en un entorno cada vez más competitivo y dinámico.
        </p>
        <p>
          El lanzamiento de nuestros Programas de Especialización responde a la necesidad de ofrecer una formación actualizada, práctica y alineada con las exigencias reales del mercado laboral. Creemos firmemente que la educación continua es el pilar fundamental para fortalecer competencias, potenciar el talento y generar nuevas oportunidades.
        </p>
        <p>
          Nuestro enfoque combina excelencia académica, innovación metodológica y acompañamiento permanente, garantizando una experiencia formativa que trascienda lo teórico y se traduzca en resultados concretos.
        </p>
        <p>
          Invitamos a cada participante a asumir este desafío con compromiso y visión de futuro. En EDUCA PERÚ, trabajamos para que cada paso en su formación represente un avance sólido en su desarrollo profesional.
        </p>
      </div>
      <blockquote class="mt-10 border-l-2 border-white/20 pl-6">
        <p class="font-display text-xl sm:text-2xl font-medium text-white/90 italic leading-tight">
          "La preparación de hoy es el éxito de mañana."
        </p>
      </blockquote>
    </div>
  </section>

  {{-- MISIÓN & VISIÓN --}}
  <section class="py-32 px-4 sm:px-10 border-b border-blueprint">
    <div class="max-w-5xl mx-auto">
      <div class="section-label">Misión y Visión</div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-16 text-white uppercase">
        Nuestro norte
      </h2>
      <div class="grid sm:grid-cols-2 gap-8">
        <div class="border border-blueprint rounded-3xl p-8" style="background-color: var(--bg-card);">
          <div class="mb-6 text-white/20"><i class="ti ti-target text-5xl"></i></div>
          <h3 class="font-display text-xl font-bold mb-4 text-white uppercase">Misión</h3>
          <p class="text-white/40 text-sm leading-relaxed font-light">
            Brindar programas de capacitación, especialización y consultoría empresarial con altos estándares de calidad académica, orientados al desarrollo de competencias estratégicas, la actualización profesional continua y la aplicación práctica del conocimiento, contribuyendo al fortalecimiento del desempeño laboral y al crecimiento sostenible de las organizaciones.
          </p>
        </div>
        <div class="border border-blueprint rounded-3xl p-8" style="background-color: var(--bg-card);">
          <div class="mb-6 text-white/20"><i class="ti ti-eye text-5xl"></i></div>
          <h3 class="font-display text-xl font-bold mb-4 text-white uppercase">Visión</h3>
          <p class="text-white/40 text-sm leading-relaxed font-light">
            Consolidarnos como una institución referente a nivel nacional en formación especializada y consultoría empresarial, reconocida por su excelencia académica, innovación metodológica y compromiso permanente con el desarrollo profesional y la mejora continua.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- VALORES --}}
  <section id="valores" class="py-32 px-4 sm:px-10 border-b border-blueprint">
    <div class="max-w-5xl mx-auto">
      <div class="section-label">Valores</div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-16 text-white uppercase">
        Valores institucionales
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-award text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Excelencia Académica</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Promovemos altos estándares de calidad en nuestros programas formativos, garantizando contenidos actualizados y pertinentes.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-shield-check text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Responsabilidad</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Actuamos con compromiso, seriedad y cumplimiento en cada uno de nuestros procesos académicos y administrativos.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-heart-handshake text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Ética Profesional</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Desarrollamos nuestras actividades con transparencia, integridad y respeto hacia todos nuestros estudiantes y colaboradores.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-bulb text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Innovación</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Impulsamos metodologías modernas y el uso de herramientas tecnológicas que aporten valor real al aprendizaje.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-hand-click text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Vocación de Servicio</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Brindamos acompañamiento y atención oportuna, priorizando las necesidades de nuestra comunidad académica.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- A QUIÉN VA DIRIGIDO --}}
  <section class="py-32 px-4 sm:px-10 border-b border-blueprint">
    <div class="max-w-5xl mx-auto">
      <div class="section-label">Dirigido a</div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-16 text-white uppercase">
        ¿A quién va dirigido?
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
        <div class="group border border-blueprint rounded-2xl p-8" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30 text-center">
          <div class="mb-6 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-school text-5xl"></i></div>
          <h4 class="font-display text-base font-bold mb-3 text-white uppercase">Estudiantes</h4>
          <p class="text-white/40 text-sm leading-relaxed font-light">Que buscan complementar su formación universitaria con habilidades técnicas reales y demandadas.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-8" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30 text-center">
          <div class="mb-6 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-rocket text-5xl"></i></div>
          <h4 class="font-display text-base font-bold mb-3 text-white uppercase">Personas que inician</h4>
          <p class="text-white/40 text-sm leading-relaxed font-light">Que desean aprender programación desde cero, con una base sólida y acompañamiento constante.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-8" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30 text-center">
          <div class="mb-6 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-briefcase text-5xl"></i></div>
          <h4 class="font-display text-base font-bold mb-3 text-white uppercase">Profesionales</h4>
          <p class="text-white/40 text-sm leading-relaxed font-light">Que quieren mejorar su perfil tecnológico y acceder a mejores oportunidades laborales.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- POR QUÉ ELEGIRNOS --}}
  <section class="py-32 px-4 sm:px-10">
    <div class="max-w-5xl mx-auto">
      <div class="section-label">Ventajas</div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tighter mb-16 text-white uppercase">
        ¿Por qué elegirnos?
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-code text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Contenido práctico</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Aprendes haciendo, no solo mirando teoría. Proyectos reales desde el primer día.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-user-star text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Docentes con experiencia</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Profesionales activos en el sector tecnológico que conocen las exigencias del mercado.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-trending-up text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Enfoque laboral</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Pensado para el mundo real y el empleo. Cada curso está alineado al mercado laboral actual.</p>
        </div>
        <div class="group border border-blueprint rounded-2xl p-6" style="background-color: var(--bg-card);" transition-all duration-300 hover:border-white/30">
          <div class="mb-4 text-white/20 transition-colors duration-300 group-hover:text-white"><i class="ti ti-refresh text-4xl"></i></div>
          <h4 class="font-display text-sm font-bold mb-2 text-white uppercase">Contenido actualizado</h4>
          <p class="text-white/40 text-xs sm:text-sm leading-relaxed font-light">Tecnologías y buenas prácticas actuales. Actualizamos constantemente nuestros programas.</p>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection
