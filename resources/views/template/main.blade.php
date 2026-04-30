<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>RPLFLIX | @yield('title')</title>
</head>
<body>
    <div class="dashboard-container" id="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <span class="logo-text">RPLFLIX</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                       🏠 Home
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('content.index') }}"
                       class="nav-link {{ request()->routeIs('content.*') ? 'active' : '' }}">
                       🎥 Content
                    </a>
                </li>
                
                @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('genre.index') }}"
                       class="nav-link {{ request()->routeIs('genre.*') ? 'active' : '' }}">
                       🎬 Genre 
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                       class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                       👤 User
                    </a>
                </li>
                @endif
            </ul>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>