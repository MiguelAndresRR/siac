<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/171f3dc321.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="sidebar collapsed" id="sidebar">
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-house"></i>
                <span class="span-subtittle">Inicio</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-user"></i>
                <span class="span-subtittle">Perfil</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.productos.index') }}'" class="nav_link">
                <i class="fa-solid fa-box"></i>
                <span class="span-subtittle">Productos</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-paper-plane"></i>
                <span class="span-subtittle">Reportes</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="span-subtittle">Compras</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-users"></i>
                <span class="span-subtittle">Usuarios</span>
            </a>
            <a onclick="window.location.href='{{ route('admin.dashboard') }}'" class="nav_link">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <span class="span-subtittle">Clientes</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="nav_link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="span-subtittle">Cerrar Sesión</span>
            </a>
        </div>
    </div>
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
</body>

</html>
