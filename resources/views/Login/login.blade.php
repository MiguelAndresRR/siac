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
</head>
<body>
    <div class="container">
    
    <div>
        <div class="container_login">
            <form method="POST">
                <div class='container_select'>
                    <i class="fa-solid fa-person-chalkboard" style="color: #000000;"></i>
                    <label>Rol</label>
                    <select class="form-select" name="rol_permiso" required>
                        <option value="" disabled selected>Seleccione Rol</option>
                        <option value="admin">administrador</option>
                        <option value="usuario">trabajador</option>
                    </select>
                </div>
                <div class="container_input">
                <i class="fa-solid fa-circle-user fa-bounce fa-lg" style="color: #74C0FC;"></i>
                <label>Usuario</label>
                <input type="text" class="form-control" name="nombre_usuario" placeholder="example-admin123"required>
                <i class="fa-solid fa-key" style="color: #FFD43B;"></i>
                <label>Contraseña</label>
                <input type="password" class="form-control" name="contrasena" placeholder="example-goticasdeidad" required>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </form>
    </div>
</body>

</html>
