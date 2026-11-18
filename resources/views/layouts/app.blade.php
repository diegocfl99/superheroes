
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Superhéroes')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="navbar">

        <a href="{{ route('superheroes.index') }}" class="logo">
            HEROES DATABASE
        </a>

        <nav>
            <a href="{{ route('superheroes.index') }}">Inicio</a>

            <a href="{{ route('superheroes.create') }}" class="nav-button">
                + Nuevo superhéroe
            </a>
        </nav>

    </header>

    <main class="container">

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

    <footer>
        Sistema CRUD de Superhéroes | Actividad 8 - Laravel
    </footer>

</body>
</html>
