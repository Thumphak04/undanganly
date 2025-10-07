    <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}"><img src="{{asset('/assets/image/logo.png')}}" alt="Undanganly Logo" height="40"></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- The class 'active' is added if the current route is the homepage --}}
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Beranda</a></li>
                    
                    {{-- These links point to sections on the homepage --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}#templates">Template</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}#how-it-works">Cara Kerja</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}#advantages-section">Keunggulan</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>