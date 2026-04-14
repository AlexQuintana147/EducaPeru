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

        .mobile-menu-btn:hover {
            background-color: rgba(59, 130, 246, 0.1);
            transform: scale(1.05);
        }

        .mobile-menu-btn:active {
            transform: scale(0.95);
        }

        /* Mobile menu animations */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #mobile-menu.show {
            max-height: 600px;
        }

        .mobile-menu-link {
            opacity: 0;
            transform: translateX(-20px);
            animation: slideIn 0.3s ease forwards;
        }

        .mobile-menu-link:nth-child(1) { animation-delay: 0.05s; }
        .mobile-menu-link:nth-child(2) { animation-delay: 0.1s; }
        .mobile-menu-link:nth-child(3) { animation-delay: 0.15s; }
        .mobile-menu-link:nth-child(4) { animation-delay: 0.2s; }
        .mobile-menu-link:nth-child(5) { animation-delay: 0.25s; }
        .mobile-menu-link:nth-child(6) { animation-delay: 0.3s; }

        @keyframes slideIn {
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

        /* Focus styles for accessibility */
        .nav-link:focus-visible,
        .btn-login:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 4px;
        }
    </style>
</head>
<body class="bg-[#f5f0eb] text-gray-900 antialiased">

<header id="main-header" class="bg-transparent border-b border-transparent sticky top-0 z-50 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">

            {{-- Logo --}}
            <a href="/" class="header-logo flex items-center gap-3 group">
                <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-10 sm:h-12 md:h-14 w-auto object-contain">
            </a>

            {{-- Navigation --}}
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-10">
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Inicio</a>
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Capacitaciones</a>
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Nosotros</a>
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Desarrollo Web</a>
                <a href="#" class="nav-link text-base lg:text-lg font-black text-gray-700 hover:text-blue-600">Contacto</a>
            </nav>

            {{-- Right Side Desktop --}}
            <div class="hidden lg:flex items-center gap-5">
                <a href="/login" class="btn-login inline-flex items-center justify-center bg-gray-900 text-white px-5 lg:px-6 py-2 lg:py-2.5 rounded-full text-base lg:text-lg font-black hover:bg-gray-800">
                    Ingresar
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden flex flex-col items-center justify-center w-11 h-11 rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors gap-1.5">
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
                <span class="hamburger-line w-6 h-0.5 bg-gray-900 rounded-full"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="lg:hidden bg-gradient-to-b from-white to-gray-50">
        <nav class="px-4 sm:px-6 py-6 space-y-1">
            <a href="#" class="mobile-menu-link group flex items-center gap-3 py-4 px-5 text-base sm:text-lg font-black text-gray-800 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 rounded-2xl transition-all shadow-sm hover:shadow-md border border-gray-100">
                <svg class="w-5 h-5 text-blue-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Inicio
            </a>
            <a href="#" class="mobile-menu-link group flex items-center gap-3 py-4 px-5 text-base sm:text-lg font-black text-gray-800 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 rounded-2xl transition-all shadow-sm hover:shadow-md border border-gray-100">
                <svg class="w-5 h-5 text-purple-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Capacitaciones
            </a>
            <a href="#" class="mobile-menu-link group flex items-center gap-3 py-4 px-5 text-base sm:text-lg font-black text-gray-800 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 rounded-2xl transition-all shadow-sm hover:shadow-md border border-gray-100">
                <svg class="w-5 h-5 text-green-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Nosotros
            </a>
            <a href="#" class="mobile-menu-link group flex items-center gap-3 py-4 px-5 text-base sm:text-lg font-black text-gray-800 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 rounded-2xl transition-all shadow-sm hover:shadow-md border border-gray-100">
                <svg class="w-5 h-5 text-orange-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
                Desarrollo Web
            </a>
            <a href="#" class="mobile-menu-link group flex items-center gap-3 py-4 px-5 text-base sm:text-lg font-black text-gray-800 bg-white hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 rounded-2xl transition-all shadow-sm hover:shadow-md border border-gray-100">
                <svg class="w-5 h-5 text-pink-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Contacto
            </a>
            <div class="pt-3">
                <a href="/login" class="mobile-menu-link flex items-center justify-center gap-2 py-4 px-5 text-center bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-2xl text-base sm:text-lg font-black hover:from-gray-800 hover:to-gray-700 transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Ingresar
                </a>
            </div>
        </nav>
    </div>
</header>

<main class="min-h-screen">
    @yield('content')
</main>

<script>
    // Header scroll effect
    const header = document.getElementById('main-header');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        mobileMenuBtn.classList.toggle('active');
        mobileMenu.classList.toggle('show');
    });

    // Close mobile menu when clicking a link
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenuBtn.classList.remove('active');
            mobileMenu.classList.remove('show');
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!header.contains(e.target)) {
            mobileMenuBtn.classList.remove('active');
            mobileMenu.classList.remove('show');
        }
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
