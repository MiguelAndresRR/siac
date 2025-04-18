<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/171f3dc321.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans+JP:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="container_login">
            <header class="headerlogin">
                <h1 class="">Iniciar sesión</h1>
            </header>
            @if ($errors->has('login_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('login_error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="container_select mb-3">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <label>Rol</label>
                    <select name="rol" class="form-select" required>
                        <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Selecciona un rol</option>
                        <option value="1" {{ old('rol') == '1' ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ old('rol') == '2' ? 'selected' : '' }}>Usuario</option>
                    </select>
                    @error('rol')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="container_input mb-3">
                    <i class="fa-solid fa-circle-user fa-bounce fa-lg"></i>
                    <label>Usuario</label>
                    <input type="text" class="form-control" name="user" value="{{ old('user') }}"
                        placeholder="example-admin123" required>
                    @error('user')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="container_input mb-3">
                    <i class="fa-solid fa-key"></i>
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="example-holamundo"
                        required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Ingresar</button>
            </form>
        </div>
    </div>
    <div class="logologin">
        <img src="{{ asset('img/logo.jpg') }}" height="300px" width="300px" alt="Logo">
    </div>
</body>

</html>
