<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont/tabler-icons.min.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'HeaderFont';
            src: url('/fonts/header.woff2') format('woff2');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }

        :root {
            --font-display: 'Instrument Sans', sans-serif;
            --font-body: 'Inter', sans-serif;
            --bg: rgba(20, 18, 11);
            --bg-card: rgba(27, 25, 19);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-body), -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .font-display { font-family: var(--font-display), sans-serif; }

        /* Blueprint dashed borders */
        .border-blueprint {
            border-style: dashed;
            border-color: rgba(255, 255, 255, 0.1);
        }

        /* Button glow */
        .btn-glow { transition: all 0.3s ease; }
        .btn-glow:hover { box-shadow: 0 0 20px rgba(255, 255, 255, 0.35); transform: translateY(-1px); }
        .btn-glow:active { transform: translateY(0); }

        /* Section label */
        .section-label {
            font-size: 11px; font-weight: 800;
            letter-spacing: .18em; text-transform: uppercase;
            color: #6366f1; margin-bottom: 12px;
            display: flex; align-items: center; gap: 10px;
        }
        .section-label::before {
            content: ''; display: block;
            width: 28px; height: 2px;
            background: #6366f1; border-radius: 2px; flex-shrink: 0;
        }

        /* ─── HEADER ─── */
        header, header * {
            font-family: 'HeaderFont', var(--font-display), -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .nav-link {
            font-family: var(--font-display), sans-serif;
            font-size: 13px; font-weight: 700;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            padding: 8px 0;
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link:hover { color: #fff; }
        .nav-link::after {
            content: ''; position: absolute;
            bottom: 0; left: 0; right: 0; height: 1px;
            background: rgba(255,255,255,0.3);
            transform: scaleX(0); transition: transform 0.3s ease;
        }
        .nav-link:hover::after { transform: scaleX(1); }

        header.scrolled {
            background-color: rgba(20, 18, 11, 0.95) !important;
            border-bottom-color: rgba(255,255,255,0.08);
        }

        /* ─── MOBILE MENU ─── */
        #mobile-menu-overlay {
            position: fixed; inset: 0;
            background-color: rgba(20, 18, 11, 0);
            visibility: hidden;
            transition: background-color 0.3s ease, visibility 0.3s ease;
            z-index: 998;
        }
        #mobile-menu-overlay.show {
            background-color: rgba(20, 18, 11, 0.6);
            visibility: visible;
        }

        #mobile-menu {
            position: fixed; top: 0; right: 0; bottom: 0;
            width: 85%; max-width: 400px;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999; overflow-y: auto;
        }
        #mobile-menu.show { transform: translateX(0); }

        .mobile-menu-link {
            opacity: 0; transform: translateX(30px);
            font-family: var(--font-display), sans-serif;
        }
        #mobile-menu.show .mobile-menu-link {
            animation: slideInFromRight 0.4s ease forwards;
        }
        #mobile-menu.show .mobile-menu-link:nth-child(1) { animation-delay: 0.1s; }
        #mobile-menu.show .mobile-menu-link:nth-child(2) { animation-delay: 0.15s; }
        #mobile-menu.show .mobile-menu-link:nth-child(3) { animation-delay: 0.2s; }
        #mobile-menu.show .mobile-menu-link:nth-child(4) { animation-delay: 0.25s; }
        #mobile-menu.show .mobile-menu-link:nth-child(5) { animation-delay: 0.3s; }
        #mobile-menu.show .mobile-menu-link:nth-child(6) { animation-delay: 0.35s; }

        @keyframes slideInFromRight {
            to { opacity: 1; transform: translateX(0); }
        }

        .hamburger-line { transition: all 0.3s ease; }
        .mobile-menu-btn.active .hamburger-line:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .mobile-menu-btn.active .hamburger-line:nth-child(2) { opacity: 0; }
        .mobile-menu-btn.active .hamburger-line:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }

        /* ─── SCROLLBAR ─── */
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.25); }
        * { scrollbar-width: thin; scrollbar-color: rgba(255,255,255,0.15) var(--bg); }

        /* ─── HERO ─── */
        .hero-full {
            min-height: 100vh;
            padding-top: 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        @media (min-width: 640px) {
            .hero-full { padding-top: 5rem; }
        }
        .hero-full::before {
            content: '';
            position: absolute; inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }
        .hero-full::after {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            width: 600px; height: 600px;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ─── FOOTER ─── */
        .footer-link {
            font-size: 13px; color: rgba(255,255,255,0.35);
            text-decoration: none; transition: color .2s ease;
        }
        .footer-link:hover { color: #fff; }
    </style>
</head>
<body class="text-white antialiased" style="background-color: var(--bg);">

<!-- ═══════ HEADER ═══════ -->
<header id="main-header" style="background-color: rgba(20,18,11,0.9);" class="border-b border-blueprint fixed top-0 left-0 right-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 group transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-10 sm:h-12 w-auto object-contain" style="filter: brightness(0) invert(1);">
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-10">
                <a href="/capacitaciones" class="nav-link">Capacitaciones</a>
                <a href="/nosotros" class="nav-link">Nosotros</a>
                <a href="/desarrollo-web" class="nav-link">Desarrollo Web</a>
            </nav>

            {{-- Desktop CTA --}}
            <div class="hidden lg:flex items-center gap-5">
                <a href="/login" class="px-6 py-2.5 bg-white text-black font-display font-bold text-xs uppercase tracking-widest btn-glow">
                    Ingresar
                </a>
            </div>

            {{-- Mobile Hamburger --}}
            <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden flex flex-col items-center justify-center w-11 h-11 gap-1.5">
                <span class="hamburger-line w-6 h-0.5 bg-white rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-white rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-white rounded-full"></span>
            </button>
        </div>
    </div>
</header>

{{-- Mobile Overlay --}}
<div id="mobile-menu-overlay" class="lg:hidden"></div>

{{-- Mobile Drawer --}}
<div id="mobile-menu" class="lg:hidden" style="background-color: var(--bg);">
    <div class="flex items-center justify-between px-8 py-6 border-b border-blueprint">
        <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-10 w-auto object-contain" style="filter: brightness(0) invert(1);">
        <button id="close-menu-btn" class="text-white/40 hover:text-white transition-colors">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <nav class="px-8 py-12 space-y-1">
        <a href="/" class="mobile-menu-link block py-5 text-lg font-display font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">
            Inicio
        </a>
        <a href="/capacitaciones" class="mobile-menu-link block py-5 text-lg font-display font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">
            Capacitaciones
        </a>
        <a href="/nosotros" class="mobile-menu-link block py-5 text-lg font-display font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">
            Nosotros
        </a>
        <a href="/desarrollo-web" class="mobile-menu-link block py-5 text-lg font-display font-bold uppercase tracking-widest text-white/40 hover:text-white transition-colors">
            Desarrollo Web
        </a>
        <div class="pt-8">
            <a href="/login" class="mobile-menu-link block py-5 text-center bg-white text-black font-display font-bold text-sm uppercase tracking-widest btn-glow">
                Ingresar
            </a>
        </div>
    </nav>
</div>

<main class="min-h-screen">
    @yield('content')
</main>

<!-- ═══════ FOOTER ═══════ -->
<footer style="background-color: var(--bg);" class="border-t border-blueprint">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20">

        {{-- Top: brand + links --}}
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-12 pb-14 border-b border-blueprint">

            {{-- Brand --}}
            <div class="max-w-sm">
                <a href="/" class="inline-flex items-center gap-3 mb-5">
                    <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}"
                         class="h-14 w-auto object-contain" style="filter: brightness(0) invert(1);">
                </a>
                <p class="text-white/35 text-sm leading-relaxed mb-6 font-light">
                    Plataforma de capacitación en tecnología y programación. Formamos profesionales con habilidades reales para el mundo laboral.
                </p>
                {{-- Social icons --}}
                <div class="flex gap-2">
                    <a href="#" aria-label="Facebook"
                       class="w-10 h-10 rounded-xl border border-blueprint flex items-center justify-center text-white/30 hover:text-white hover:border-white/30 transition-all">
                        <i class="ti ti-brand-facebook text-lg"></i>
                    </a>
                    <a href="#" aria-label="TikTok"
                       class="w-10 h-10 rounded-xl border border-blueprint flex items-center justify-center text-white/30 hover:text-white hover:border-white/30 transition-all">
                        <i class="ti ti-brand-tiktok text-lg"></i>
                    </a>
                    <a href="#" aria-label="WhatsApp"
                       class="w-10 h-10 rounded-xl border border-blueprint flex items-center justify-center text-white/30 hover:text-white hover:border-white/30 transition-all">
                        <i class="ti ti-brand-whatsapp text-lg"></i>
                    </a>
                    <a href="#" aria-label="Instagram"
                       class="w-10 h-10 rounded-xl border border-blueprint flex items-center justify-center text-white/30 hover:text-white hover:border-white/30 transition-all">
                        <i class="ti ti-brand-instagram text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-10">
                <div>
                    <div class="font-display text-[11px] font-extrabold tracking-[0.14em] uppercase text-white mb-5">Plataforma</div>
                    <ul class="space-y-3">
                        <li><a href="/capacitaciones" class="footer-link">Capacitaciones</a></li>
                        <li><a href="/nosotros" class="footer-link">Nosotros</a></li>
                        <li><a href="/desarrollo-web" class="footer-link">Desarrollo Web</a></li>
                    </ul>
                </div>
                <div>
                    <div class="font-display text-[11px] font-extrabold tracking-[0.14em] uppercase text-white mb-5">Cursos</div>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link">Ofimática</a></li>
                        <li><a href="#" class="footer-link flex items-center gap-2">C++ <span class="text-[10px] text-white/20 font-bold uppercase tracking-wider">Pronto</span></a></li>
                        <li><a href="#" class="footer-link flex items-center gap-2">Python <span class="text-[10px] text-white/20 font-bold uppercase tracking-wider">Pronto</span></a></li>
                    </ul>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <div class="font-display text-[11px] font-extrabold tracking-[0.14em] uppercase text-white mb-5">Contacto</div>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2">
                            <i class="ti ti-map-pin text-white/25 mt-0.5"></i>
                            <span class="text-white/35 text-[13px] leading-relaxed">Perú</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="ti ti-mail text-white/25"></i>
                            <span class="text-white/35 text-[13px]">contacto@educaperu.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-8">
            <p class="text-[12px] text-white/20">
                © {{ date('Y') }} Centro de Capacitación y Consultoría Empresarial <span class="text-white/35">EDUCA PERÚ S.A.C.</span>
            </p>
        </div>

    </div>
</footer>

<script>
    // Header scroll
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 20);
    });

    // Mobile menu
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const closeMenuBtn = document.getElementById('close-menu-btn');

    function openMenu() {
        mobileMenuBtn.classList.add('active');
        mobileMenu.classList.add('show');
        mobileMenuOverlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenuBtn.classList.remove('active');
        mobileMenu.classList.remove('show');
        mobileMenuOverlay.classList.remove('show');
        document.body.style.overflow = '';
    }

    mobileMenuBtn.addEventListener('click', (e) => { e.stopPropagation(); openMenu(); });
    closeMenuBtn.addEventListener('click', closeMenu);
    mobileMenuOverlay.addEventListener('click', closeMenu);
    document.querySelectorAll('.mobile-menu-link').forEach(link => link.addEventListener('click', closeMenu));

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>

</body>
</html>
