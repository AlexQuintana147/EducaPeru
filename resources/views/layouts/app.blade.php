<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f0eb;
            color: #1a1a1a;
        }

        /* ── HEADER ── */
        header {
            background-color: #f5f0eb;
            border-bottom: 1px solid rgba(0,0,0,0.06);
            padding: 0 40px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Logo */
        .header-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #1a1a1a;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background-color: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.3px;
            color: #1a1a1a;
        }

        /* Nav links */
        nav.header-nav {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        nav.header-nav a {
            text-decoration: none;
            font-size: 14.5px;
            color: #1a1a1a;
            font-weight: 400;
            transition: color 0.15s;
        }

        nav.header-nav a:hover {
            color: #2563eb;
        }

        /* Right side */
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-region {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            color: #1a1a1a;
            cursor: pointer;
        }

        .header-region svg {
            width: 16px;
            height: 16px;
            stroke: #1a1a1a;
            fill: none;
        }

        .btn-login {
            background-color: #1a1a1a;
            color: #fff;
            border: none;
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.15s;
        }

        .btn-login:hover {
            background-color: #333;
        }

        /* ── MAIN CONTENT ── */
        main {
            padding: 40px;
        }
    </style>
</head>
<body>

<header>
    {{-- Logo --}}
    <a href="/" class="header-logo">
        <div class="logo-icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="5" fill="white"/>
                <circle cx="12" cy="4"  r="2" fill="white"/>
            </svg>
        </div>
        <span class="logo-text">osome</span>
    </a>

    {{-- Nav --}}
    <nav class="header-nav">
        <a href="#">Incorporation</a>
        <a href="#">Accounting</a>
        <a href="#">Secretary</a>
        <a href="#">Pricing</a>
        <a href="#">Resources</a>
        <a href="#">About</a>
    </nav>

    {{-- Right --}}
    <div class="header-right">
        <div class="header-region">
            <svg viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <line x1="2" y1="12" x2="22" y2="12"/>
                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
            </svg>
            <span>SG</span>
        </div>
        <a href="/login" class="btn-login">Login</a>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>
