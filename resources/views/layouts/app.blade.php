<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!-- Agregar CSS, Bootstrap u otros estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('extra_head')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-light">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ route('landing-page') }}">CRUD Escuelas/Alumnos con Autenticación - Ricard Espinàs Llovet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Verifica si el usuario está autenticado y muestra la barra de navegación -->
                @if (Auth::check())
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('alumnos.index') }}">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('escuelas.index') }}">Escuelas</a>
                            </li>
                            <form class="nav-item text-white" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                            </form>
                        </ul>
                    </div>
                @endif
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <!-- Scripts, puedes agregar aquí tus scripts como Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
