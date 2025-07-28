<div class="container-modal-editar-proveedor">
    <div class="modificar-proveedor-container">
        <h2>Modificar proveedor</h2>
        <form id="form_editar-proveedor" method="POST" enctype="multipart/form-data" action="">
            @csrf
            @method('PUT')
            <label for="nombre_proveedor"><i class="fa-solid fa-building"></i>Nombre del proveedor</label>
            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor"
                value="{{ old('nombre_proveedor') }}" placeholder="Nombre del proveedor" required><br>
            <label for="nit_proveedor"><i class="fa-solid fa-id-card"></i>Nit del proveedor</label>
            <input type="text" class="form-control" id="nit_proveedor" name="nit_proveedor"
                value="{{ old('nit_proveedor') }}" placeholder="Nit del proveedor" required><br>
            <label for="direccion_proveedor"><i class="fa-solid fa-map-marker-alt"></i>Direccion del proveedor</label>
            <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor"
                value="{{ old('direccion_proveedor') }}" placeholder="Direccion del proveedor" required><br>
            <label for="telefono_proveedor"><i class="fa-solid fa-phone"></i>Telefono del proveedor</label>
            <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor"
                value="{{ old('telefono_proveedor') }}" placeholder="Telefono del proveedor" required><br>
            <label for="correo_proveedor"><i class="fa-solid fa-envelope"></i>Correo del proveedor</label>
            <input type="text" class="form-control" id="correo_proveedor" name="correo_proveedor"
                value="{{ old('correo_proveedor') }}" placeholder="Correo del proveedor" required><br>
            <button type="submit">Guardar</button>
            <p class="error" id="errorMessage"></p>
        </form>
        <button type="submit" class="btn" id="ocultar-modal-editar-proveedor">Salir</button>
    </div>
</div>

<script src="{{ asset('js/proveedor/editar.js') }}"></script>