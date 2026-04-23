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
                        sans: ['EducaPeru', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        @font-face {
            font-family: 'EducaPeru';
            src: url('/fonts/educaperu.woff2') format('woff2');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'HeaderFont';
            src: url('/fonts/header.woff2') format('woff2');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'EducaPeru', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Header font */
        header,
        header * {
            font-family: 'HeaderFont', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Smooth hover transitions */
        .nav-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 8px 12px;
            border-radius: 8px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 12px;
            right: 12px;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transform: scaleX(0);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 2px;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        .nav-link:active {
            transform: scale(0.97);
        }

        /* Button hover effect */
        .btn-login {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 14px rgba(26, 26, 26, 0.2);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-login:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 26, 26, 0.3);
            background-color: #1f2937;
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(26, 26, 26, 0.2);
        }

        /* Logo hover effect */
        .header-logo {
            transition: transform 0.3s ease;
        }

        .header-logo:hover {
            transform: scale(1.05);
        }

        .header-logo:active {
            transform: scale(0.98);
        }

        /* Region selector hover */
        .header-region {
            transition: all 0.2s ease;
        }

        .header-region:hover {
            color: #3b82f6;
        }

        .header-region:hover svg {
            stroke: #3b82f6;
        }

        /* Header scroll effect */
        header {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        header.scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            border-bottom-color: rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            transition: all 0.3s ease;
        }

        .mobile-menu-btn:active {
            transform: scale(0.95);
        }

        /* Mobile menu animations */
        #mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0);
            visibility: hidden;
            transition: background-color 0.3s ease, visibility 0.3s ease;
            z-index: 998;
        }

        #mobile-menu-overlay.show {
            background-color: rgba(0, 0, 0, 0.5);
            visibility: visible;
        }

        #mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 85%;
            max-width: 400px;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
            overflow-y: auto;
        }

        #mobile-menu.show {
            transform: translateX(0);
        }

        .mobile-menu-link {
            opacity: 0;
            transform: translateX(30px);
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
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Hamburger animation */
        .hamburger-line {
            transition: all 0.3s ease;
        }

        .mobile-menu-btn.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .mobile-menu-btn.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f5f0eb;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #3b82f6, #2563eb);
            border-radius: 10px;
            border: 2px solid #f5f0eb;
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #2563eb, #1d4ed8);
            border: 2px solid #e5e0db;
        }

        ::-webkit-scrollbar-thumb:active {
            background: linear-gradient(180deg, #1d4ed8, #1e40af);
        }

        /* Firefox scrollbar */
        * {
            scrollbar-width: thin;
            scrollbar-color: #3b82f6 #f5f0eb;
        }

        /* Focus styles for accessibility */
        .nav-link:focus-visible,
        .btn-login:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 4px;
        }
    </style>
</head>
<body class="bg-[#f5f0eb] text-gray-900 antialiased">

<header id="main-header" class="bg-white/95 border-b border-gray-100 fixed top-0 left-0 right-0 z-50 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            {{-- Logo --}}
            <a href="/" class="header-logo flex items-center gap-3 group">
                <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-10 sm:h-12 md:h-14 w-auto object-contain">
            </a>

            {{-- Navigation --}}
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-10">
                <a href="/capacitaciones" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Capacitaciones</a>
                <a href="/nosotros" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Nosotros</a>
                <a href="/desarrollo-web" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Desarrollo Web</a>
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Contacto</a>
            </nav>

            {{-- Right Side Desktop --}}
            <div class="hidden lg:flex items-center gap-5">
                <a href="/login" class="btn-login inline-flex items-center justify-center bg-gray-900 text-white px-5 lg:px-6 py-2 lg:py-2.5 rounded-full text-base lg:text-lg font-black hover:bg-gray-800">
                    Ingresar
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden flex flex-col items-center justify-center w-11 h-11 transition-colors gap-1.5">
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
            </button>
        </div>
    </div>
</header>

{{-- Mobile Menu Overlay --}}
<div id="mobile-menu-overlay" class="lg:hidden"></div>

{{-- Mobile Menu Drawer --}}
<div id="mobile-menu" class="lg:hidden bg-white shadow-2xl">
    <div class="flex items-center justify-between px-8 py-6">
        <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-10 w-auto object-contain">
        <button id="close-menu-btn" class="text-gray-400 hover:text-gray-900 transition-colors">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <nav class="px-8 py-12 space-y-1">
        <a href="#" class="mobile-menu-link block py-5 text-xl font-black text-gray-900 hover:text-gray-400 transition-colors">
            Inicio
        </a>
        <a href="/capacitaciones" class="mobile-menu-link block py-5 text-xl font-black text-gray-900 hover:text-gray-400 transition-colors">
            Capacitaciones
        </a>
        <a href="/nosotros" class="mobile-menu-link block py-5 text-xl font-black text-gray-900 hover:text-gray-400 transition-colors">
            Nosotros
        </a>
        <a href="/desarrollo-web" class="mobile-menu-link block py-5 text-xl font-black text-gray-900 hover:text-gray-400 transition-colors">
            Desarrollo Web
        </a>
        <a href="#" class="mobile-menu-link block py-5 text-xl font-black text-gray-900 hover:text-gray-400 transition-colors">
            Contacto
        </a>
        <div class="pt-8">
            <a href="/login" class="mobile-menu-link block py-5 text-center bg-gray-900 text-white text-xl font-black hover:bg-gray-700 transition-all">
                Ingresar
            </a>
        </div>
    </nav>
</div>

<main class="min-h-screen pt-16 sm:pt-20">
    @yield('content')
</main>

<footer style="background:#09090b; border-top: 1px solid rgba(255,255,255,0.07);">
    <style>
        .footer-link {
            font-size: 13.5px;
            color: #71717a;
            text-decoration: none;
            transition: color .2s ease;
        }
        .footer-link:hover { color: #fff; }
    </style>
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20">

        {{-- Top: brand + tagline --}}
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-12 pb-14" style="border-bottom:1px solid rgba(255,255,255,0.08);">

            {{-- Brand --}}
            <div class="max-w-sm">
                <a href="/" class="inline-flex items-center gap-3 mb-5 group">
                    <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}"
                         class="h-14 w-auto object-contain"
                         style="filter: brightness(0) invert(1);">
                </a>
                <p style="font-size:14px; color:#71717a; line-height:1.8; margin-bottom:20px;">
                    Plataforma de capacitación en tecnología y programación. Formamos profesionales con habilidades reales para el mundo laboral.
                </p>
                {{-- Social icons --}}
                <div style="display:flex; gap:8px;">
                    <a href="#" aria-label="Facebook"
                       style="width:38px;height:38px;border-radius:9px;border:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:all .2s;"
                       onmouseover="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='rgba(255,255,255,0.06)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='transparent'">
                        <svg width="16" height="16" fill="#fff" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                    <a href="#" aria-label="TikTok"
                       style="width:38px;height:38px;border-radius:9px;border:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:all .2s;"
                       onmouseover="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='rgba(255,255,255,0.06)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='transparent'">
                        <svg width="16" height="16" fill="#fff" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.75a4.85 4.85 0 01-1.01-.06z"/></svg>
                    </a>
                    <a href="#" aria-label="WhatsApp"
                       style="width:38px;height:38px;border-radius:9px;border:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:all .2s;"
                       onmouseover="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='rgba(255,255,255,0.06)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='transparent'">
                        <svg width="16" height="16" fill="#fff" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram"
                       style="width:38px;height:38px;border-radius:9px;border:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;transition:all .2s;"
                       onmouseover="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='rgba(255,255,255,0.06)'"
                       onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.background='transparent'">
                        <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-10">
                <div>
                    <div style="font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#fff;margin-bottom:18px;">Plataforma</div>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;">
                        <li><a href="/capacitaciones" class="footer-link">Capacitaciones</a></li>
                        <li><a href="/nosotros" class="footer-link">Nosotros</a></li>
                        <li><a href="/desarrollo-web" class="footer-link">Desarrollo Web</a></li>
                        <li><a href="#" class="footer-link">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <div style="font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#fff;margin-bottom:18px;">Cursos</div>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;">
                        <li><a href="#" class="footer-link">Ofimática</a></li>
                        <li><a href="#" class="footer-link" style="display:flex;align-items:center;gap:6px;">C++ <span style="font-size:10px;color:#f97316">Pronto</span></a></li>
                        <li><a href="#" class="footer-link" style="display:flex;align-items:center;gap:6px;">Python <span style="font-size:10px;color:#f97316">Pronto</span></a></li>
                    </ul>
                </div>
                <div>
                    <div style="font-size:11px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:#fff;margin-bottom:18px;">Contacto</div>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;">
                        <li style="display:flex;align-items:flex-start;gap:8px;">
                            <svg style="flex-shrink:0;margin-top:2px;" width="14" height="14" fill="none" stroke="#71717a" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span style="font-size:13px;color:#71717a;line-height:1.5;">Perú</span>
                        </li>
                        <li style="display:flex;align-items:center;gap:8px;">
                            <svg style="flex-shrink:0;" width="14" height="14" fill="none" stroke="#71717a" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span style="font-size:13px;color:#71717a;">contacto@educaperu.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-8">
            <p style="font-size:12.5px;color:#3f3f46;">
                © {{ date('Y') }} Centro de Capacitación y Consultoría Empresarial <span style="color:#71717a;">EDUCA PERÚ S.A.C.</span>
            </p>
        </div>

    </div>
</footer>

<script>
    // Header scroll effect removed (header is now fixed)

    // Mobile menu toggle
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

    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        openMenu();
    });

    closeMenuBtn.addEventListener('click', closeMenu);
    mobileMenuOverlay.addEventListener('click', closeMenu);

    // Close mobile menu when clicking a link
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>

</body>
</html>
