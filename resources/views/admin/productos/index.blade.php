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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard/editar.css') }}">
    </heade>

<body>
    <div class="container">
        @if (session('message'))
            <script>
                Swal.fire({
                    title: {!! session('message')['type'] === 'error' ? json_encode('Error') : json_encode('Éxito') !!},
                    text: @json(session('message')['text']),
                    icon: @json(session('message')['type']),
                    confirmButtonText: 'Aceptar'
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
                            <button type="submit" class="btn" id='crear-modal'>
                                <i class="fa-solid fa-plus"></i>
                            </button>
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
                                    <button type="submit" class="btn-editar" id="editar-modal"
                                        data-id_producto="{{ $producto->id_producto }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <form id="formEliminar{{ $producto->id_producto }}" method="POST"
                                        action="{{ route('admin.productos.destroy', $producto->id_producto) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button"
                                            onclick="confirmarEliminacion({{ $producto->id_producto }})"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.productos.modal.edit')
        @include('admin.productos.modal.create')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
        <script src="{{ asset('js/dashboard/productos/eliminarboton.js') }}"></script>
        <script src="{{ asset('js/dashboard/productos/editar.js') }}"></script>
    </div>
</body>
</head>
