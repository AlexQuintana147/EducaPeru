<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @font-face {
            font-family: 'EducaPeru';
            src: url('/fonts/educaperu.woff2') format('woff2'),
                 url('/fonts/educaperu.woff') format('woff'),
                 url('/fonts/educaperu.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'EducaPeru';
            src: url('/fonts/educaperu-bold.woff2') format('woff2'),
                 url('/fonts/educaperu-bold.woff') format('woff'),
                 url('/fonts/educaperu-bold.ttf') format('truetype');
            font-weight: 700;
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

        /* Smooth hover transitions */
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Button hover effect */
        .btn-login {
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(26, 26, 26, 0.15);
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(26, 26, 26, 0.25);
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
    </style>
</head>
<body class="bg-[#f5f0eb] text-gray-900 antialiased">

<header class="bg-[#f5f0eb] border-b border-gray-200/60 sticky top-0 z-50 backdrop-blur-sm bg-opacity-95">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="/" class="header-logo flex items-center gap-3 group">
                <img src="{{ asset('image/logo1prueba.webp') }}" alt="{{ config('app.name') }}" class="h-14 w-auto object-contain">
            </a>

            {{-- Navigation --}}
            <nav class="hidden md:flex items-center space-x-10">
                <a href="#" class="nav-link text-base font-bold text-gray-700 hover:text-blue-600">Inicio</a>
                <a href="#" class="nav-link text-base font-bold text-gray-700 hover:text-blue-600">Capacitaciones</a>
                <a href="#" class="nav-link text-base font-bold text-gray-700 hover:text-blue-600">Nosotros</a>
                <a href="#" class="nav-link text-base font-bold text-gray-700 hover:text-blue-600">Desarrollo Web</a>
                <a href="#" class="nav-link text-base font-bold text-gray-700 hover:text-blue-600">Contacto</a>
            </nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-5">
                <button class="header-region flex items-center gap-2 text-base font-bold text-gray-700 hover:text-blue-600 cursor-pointer">
                    <svg class="w-5 h-5 stroke-current" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span>SG</span>
                </button>

                <a href="/login" class="btn-login inline-flex items-center justify-center bg-gray-900 text-white px-6 py-2.5 rounded-lg text-base font-semibold hover:bg-gray-800">
                    Login
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-200/50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<main class="min-h-screen">
    @yield('content')
</main>

</body>
</html>
