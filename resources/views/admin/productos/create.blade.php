<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>
<!DOCTYPE html>
<html lang="en">

<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/171f3dc321.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/dashboard/productos.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>

</header>

<body>
    <div class="container">
        @if (session('message'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        title: '{{ session('message')['type'] === 'error' ? 'Error' : 'Éxito' }}',
                        text: '{{ session('message')['text'] }}',
                        icon: '{{ session('message')['type'] }}',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        @endif
    </div>
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
    <div class="content-productos">
        <div class="header">
            <h1><i class="fa-solid fa-cubes"></i>Productos</h1>
        </div>
        <div class="registrar-producto-container">
            <h2>Registrar producto</h2>
            <form action="{{ route('admin.productos.index') }}" method="POST">
                @csrf
                <label><i class="fa-solid fa-cubes"></i>Productos</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto"
                    value="{{ old('nombre_producto') }}" placeholder="Nombre del producto" required><br>
                <label><i class="fa-sharp fa-solid fa-coins" style="color: #FFD43B;"></i>Precio del producto</label>
                <input type="number" class="form-control" name="precio_producto" value="{{ old('precio_producto') }}"
                    placeholder="Precio del producto" required><br>
                <label for=""><i class="fa-sharp fa-solid fa-layer-group"
                        style="color: #ff0000;"></i>Categoría</label>
                <select name="id_categoria_producto" id="" class="form-control" required>
                    <option value="" disabled {{ old('id_categoria_producto') ? '' : 'selected' }}>
                        Selecciona categoría
                    </option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria_producto }}"
                            {{ old('id_categoria_producto') == $categoria->id_categoria_producto ? 'selected' : '' }}>
                            {{ $categoria->categoria }}
                        </option>
                    @endforeach
                </select><br>
                <label for=""><i class="fa-solid fa-scale-balanced" style="color: #04fb56;"></i>Unidad de
                    medida</label>
                <select name="id_unidad_peso_producto" id="" class="form-control" required>
                    <option value="" disabled {{ old('id_unidad_peso_producto') ? '' : 'selected' }}>
                        Selecciona unidad de medida</option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id_unidad_peso_producto }}"
                            {{ old('id_unidad_peso_producto') == $unidad->id_unidad_peso_producto ? 'selected' : '' }}>
                            {{ $unidad->unidad_peso }}
                        </option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary mt-2">Ingresar</button>
                <p class="error" id="errorMessage"></p>
                <div class="options-crud">
                    <form action="{{ route('admin.productos.index') }}" method="get">
                        <button type="submit" class="boton-regresar">Regresar</button>
                    </form>
                </div>
            </form>
        </div>

        <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
</body>

</html>
