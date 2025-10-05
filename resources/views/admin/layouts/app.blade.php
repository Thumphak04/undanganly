<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="robots" content="noindex, nofollow">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body, html {
            height: 100%;
            overflow-x: hidden;
        }
        .main-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 280px;
            background-color: #212529; /* Darker sidebar */
            color: white;
            flex-shrink: 0; /* Prevent sidebar from shrinking */
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            border-radius: .25rem;
            margin-bottom: .25rem;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #343a40;
        }
        .sidebar .dropdown-toggle::after {
            display: none; /* Hide default dropdown arrow */
        }
        .content {
            flex-grow: 1; /* Allow content to grow and fill space */
            padding: 2rem;
            background-color: #f8f9fa;
            overflow-y: auto; /* Allow content to scroll if it overflows */
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        <nav class="sidebar d-flex flex-column p-3">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('dashboard') }}" class="fs-4 text-white text-decoration-none">
                    <x-application-logo style="height: 40px;"/>
                </a>
                <span class="fs-5 ms-2 text-white">Admin Panel</span>
            </div>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.templates.index') }}" class="nav-link @if(request()->routeIs('admin.templates.*')) active @endif">
                        <i class="bi bi-grid-fill me-2"></i>
                        Templates
                    </a>
                </li>
            </ul>

            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle p-2" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                Sign out
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>