<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <meta charset="UTF-8">
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
        <div class="container-productos-class">
            <div class="container-productos">
                <h2>Lista de Productos</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Unidad Medida</th>
                        <th>
                            <form method="get" action="{{ route('admin.productos.create') }}">
                                <button class="buton-create" type="submit">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id_producto }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->precio_producto }}</td>
                            <td>{{ $producto->categoria->categoria }}</td>
                            <td>{{ $producto->unidad->unidad_peso }}</td>
                            <td>
                                <div class="button.container">
                                    <form action="{{ route('admin.productos.edit', $producto->id_producto) }}">
                                        @method('UPDATE')
                                        <button type="button" class='edit-button'
                                            data-id="{{ $producto->id_producto }}">
                                            <i class="fa-solid fa-pen-to-square" style="color: #ffc800;"></i>
                                        </button>
                                        <script src="{{ asset('js/dashboard/productos/editform.js')}}"></script>
                                    </form>
                                    <form id="formEliminar{{ $producto->id_producto }}" method="POST"
                                        action="{{ route('admin.productos.destroy', $producto->id_producto) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button"
                                            onclick="confirmarEliminacion({{ $producto->id_producto }})"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                        </button>
                                        <script src="{{ asset('js/dashboard/productos/eliminarboton.js') }}"></script>
                                    </form>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="form-edit" style="display: none;"></div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </div>

        <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
</body>

</html>
