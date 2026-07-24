<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taller Automotriz')</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .btn-custom-primary {
            background-color: #0d6efd;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 20px;
        }
        .btn-custom-primary:hover {
            background-color: #0b5ed7;
        }
        .main-footer {
            margin-top: auto;
            background-color: #ffffff;
            border-top: 1px solid #e9ecef;
            padding: 15px 0;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
    @yield('styles')
</head>
<body>

    @auth
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('servicios.index') }}">
                <i class="bi bi-wrench-adjustable-circle text-warning fs-4"></i>
                <span>Taller Automotriz</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('servicios.*') ? 'active fw-bold' : '' }}" href="{{ route('servicios.index') }}">
                            <i class="bi bi-speedometer2 me-1"></i> Módulo Servicios
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-secondary px-3 py-2 fs-6 d-flex align-items-center gap-2">
                        <i class="bi bi-person-circle text-info"></i>
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center gap-1">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="main-footer">
        <div class="container">
            &copy; {{ date('Y') }} Taller Automotriz - Examen Parcial Practico
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
