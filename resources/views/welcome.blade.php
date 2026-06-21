@extends('layouts.app')

@section('title', 'Bienvenido - Instituto de Programación')

@section('content')
<style>
    .hero-video-card {
        position: absolute;
        width: 140px; height: 90px;
        border-radius: 12px;
        overflow: hidden;
        border: 1px dashed rgba(255,255,255,0.08);
        opacity: 0;
        z-index: 1;
        pointer-events: none;
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .hero-video-card.show {
        opacity: 0.35;
        transform: scale(1);
    }
    @media (min-width: 640px) {
        .hero-video-card { width: 200px; height: 125px; border-radius: 16px; }
    }
    @media (min-width: 1024px) {
        .hero-video-card { width: 240px; height: 150px; }
    }
    .hero-video-card video { width: 100%; height: 100%; object-fit: cover; }
</style>

<div class="relative w-full" style="background-color: var(--bg);">

  <!-- HERO -->
  <section class="relative hero-full px-4 sm:px-10 overflow-hidden">
    {{-- Floating video cards --}}
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/f7e25ace-ebf2-41d5-9568-33062142ac43/horizontal/previews/clear/large.mp4?token=exp=1782061665~hmac=595f247355fd3ab64ba2f2c70f7f3c22fb325a6f84553a556f4c9a0cf6aa1eca" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/a427b278-0f39-4658-91c4-03549d815dbd/horizontal/previews/clear/large.mp4?token=exp=1782061727~hmac=225f3bc0b270b4c6c732056694de306a9091f6ebba0c86294d61aae92f898ba8" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/9946c208-3b8a-4ca5-97d6-4d06c49ced4c/horizontal/previews/clear/large.mp4?token=exp=1782061770~hmac=f391d02ab4e8eac420ffdcd1ef10eddd579804e0ce143e7647107b5da13089d4" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/0efe3cda-dd52-4ae9-ae27-69109dbf899b/horizontal/previews/clear/large.mp4?token=exp=1782061938~hmac=b4f0183d4e9ca3ed58507c0bc0b0ab8790eb7241cdda5f3825398fdbfd6507f7" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/4844fad1-de18-4f13-b58b-c810ecc4a820/horizontal/previews/clear/large.mp4?token=exp=1782061964~hmac=1361706f9a2391a5e6c943fde168645839f3330f61af03dabd6fb5feb2a88833" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/bdab795b-6cb0-4e46-bc02-8d7fe47bcac9/horizontal/previews/clear/large.mp4?token=exp=1782062792~hmac=fba176cdfd7038fdc4bca89024e1658d98cc046bc8129fe719a184471dba7c5a" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/ef0135fe-7b28-40d9-8617-a60aa0851fb8/horizontal/previews/clear/large.mp4?token=exp=1782062843~hmac=503984a9748b3b27ea38b45523511957b2dcd2f496cc1e8d92452bf45bba2b4e" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/20ea20b3-2195-52ab-ad01-6f51498ae268/horizontal/previews/clear/large.mp4?token=exp=1782062872~hmac=1a390ecbb779b0eac4ac56920f3cd8333be0ea22b57a117d1f159812b5ca31a2" autoplay muted loop playsinline></video></div>
    <div class="hero-video-card" style="transform:scale(0.85)"><video src="https://videocdn.cdnpk.net/videos/9303d06b-6b7c-4408-a3d2-82b60237c164/horizontal/previews/clear/large.mp4?token=exp=1782062965~hmac=146d1e7ed2ed6f716ed69352df3d63c69dcfff4e2f634bfac1958d16be1035e5" autoplay muted loop playsinline></video></div>
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

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cards = [...document.querySelectorAll('.hero-video-card')];
    const spots = [
        { top:'8%',  left:'3%',  right:'',   bottom:'', centerX:false },
        { top:'10%', left:'',   right:'4%',  bottom:'', centerX:false },
        { top:'44%', left:'4%', right:'',   bottom:'', centerX:false },
        { top:'40%', left:'',   right:'3%',  bottom:'', centerX:false },
        { top:'',    left:'',   right:'',   bottom:'8%', centerX:true },
    ];
    const taken = new Set();
    const lastSpot = cards.map(() => -1);

    function place(card, si) {
        const s = spots[si];
        card.style.top = s.top; card.style.left = s.left;
        card.style.right = s.right; card.style.bottom = s.bottom;
        card.style.transform = s.centerX ? 'scale(1) translateX(-50%)' : 'scale(1)';
    }
    function hide(card, si) {
        const s = spots[si];
        card.style.transform = s.centerX ? 'scale(0.85) translateX(-50%)' : 'scale(0.85)';
    }
    function pickSpot(i) {
        const ok = [...Array(spots.length).keys()].filter(s => !taken.has(s) && s !== lastSpot[i]);
        return ok.length ? ok[Math.floor(Math.random() * ok.length)] : [...Array(spots.length).keys()].filter(s => !taken.has(s))[0];
    }

    function cycleCard(i) {
        const card = cards[i];
        // hide
        if (lastSpot[i] >= 0) { taken.delete(lastSpot[i]); }
        card.classList.remove('show');
        hide(card, lastSpot[i] >= 0 ? lastSpot[i] : 0);
        setTimeout(() => {
            const si = pickSpot(i);
            lastSpot[i] = si;
            taken.add(si);
            place(card, si);
            card.classList.add('show');
        }, 650);
        setTimeout(() => cycleCard(i), 5000 + Math.random() * 2000);
    }

    // start 2-3 cards immediately, staggered
    const startCount = 2 + Math.floor(Math.random() * 2); // 2 or 3
    for (let i = 0; i < startCount; i++) {
        const si = pickSpot(i);
        lastSpot[i] = si;
        taken.add(si);
        place(cards[i], si);
        cards[i].classList.add('show');
        setTimeout(() => cycleCard(i), 5000 + Math.random() * 2000);
    }
    // start remaining cards with initial delay
    for (let i = startCount; i < cards.length; i++) {
        setTimeout(() => cycleCard(i), 2000 + Math.random() * 3000);
    }
});
</script>
@endsection
