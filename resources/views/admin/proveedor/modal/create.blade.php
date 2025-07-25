<div class="container-modal-crear-proveedor">
    <div class="registrar-proveedor-container">
        <h2>Registrar proveedor</h2>
        <form action="{{ route('admin.proveedor.store') }}" method="POST" enctype="multipart/form-data"
            id="formularioProveedor" class="necesita-validacion">
            @csrf
            <label for="nombre_proveedor" class="form-label"><i class="fa-solid fa-building"></i>Nombre del
                proveedor</label>
            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor"
                placeholder="Nombre del proveedor"  required>
            <label for="nit_proveedor" class="form-label"><i class="fa-solid fa-id-card"></i>Nit del proveedor</label>
            <input type="text" class="form-control" id="nit_proveedor" name="nit_proveedor"
                placeholder="Nit del proveedor"  required>
            <label for="direccion_proveedor" class="form-label"><i class="fa-solid fa-map-marker-alt"></i>Direccion del
                proveedor</label>
            <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor"
                placeholder="Direccion del proveedor"  required>
            <label for="telefono_proveedor" class="form-label"><i class="fa-solid fa-phone"></i>Telefono del
                proveedor</label>
            <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor"
                placeholder="Telefono del proveedor" required>
            <label for="correo_proveedor" class="form-label"><i class="fa-solid fa-envelope"></i>Correo del
                proveedor</label>
            <input type="text" class="form-control" id="correo_proveedor" name="correo_proveedor"
                placeholder="Correo del proveedor"  required>
            <br>
            <button type="submit">Crear</button>
        </form>
        <button type="button" class="btn" id="ocultar-modal-crear-proveedor">Cancelar</button>

    </div>
</div>
<script src="{{ asset('js/proveedor/crear.js') }}"></script>
