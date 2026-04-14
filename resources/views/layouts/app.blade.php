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
            <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden flex items-center justify-center w-10 h-10 rounded-lg transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-200 shadow-lg">
        <nav class="px-4 sm:px-6 py-4 space-y-2">
            <a href="#" class="block py-3 px-4 text-base sm:text-lg font-black text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all">Inicio</a>
            <a href="#" class="block py-3 px-4 text-base sm:text-lg font-black text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all">Capacitaciones</a>
            <a href="#" class="block py-3 px-4 text-base sm:text-lg font-black text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all">Nosotros</a>
            <a href="#" class="block py-3 px-4 text-base sm:text-lg font-black text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all">Desarrollo Web</a>
            <a href="#" class="block py-3 px-4 text-base sm:text-lg font-black text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all">Contacto</a>
            <a href="/login" class="block py-3 px-4 text-center bg-gray-900 text-white rounded-full text-base sm:text-lg font-black hover:bg-gray-800 transition-all">Ingresar</a>
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

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!header.contains(e.target)) {
            mobileMenu.classList.add('hidden');
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
