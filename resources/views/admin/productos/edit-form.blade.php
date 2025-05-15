<div class="registrar-producto-container">
    <h2>{{ isset($producto) ? 'Editar producto' : 'Registrar producto' }}</h2>

    <form action="{{ isset($producto) ? route('admin.productos.update', $producto->id_productos) : route('admin.productos.store') }}" method="POST">
        @csrf

        @if(isset($producto))
            @method('PUT')
        @endif

        <label><i class="fa-solid fa-cubes"></i>Productos</label>
        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto"
            value="{{ old('nombre_producto', $producto->nombre_producto ?? '') }}" placeholder="Nombre del producto" required><br>

        <label><i class="fa-sharp fa-solid fa-coins" style="color: #FFD43B;"></i>Precio del producto</label>
        <input type="number" class="form-control" name="precio_producto"
            value="{{ old('precio_producto', $producto->precio_producto ?? '') }}" placeholder="Precio del producto" required><br>

        <label for=""><i class="fa-sharp fa-solid fa-layer-group" style="color: #ff0000;"></i>Categoría</label>
        <select name="id_categoria_producto" id="" class="form-control" required>
            <option value="" disabled {{ old('id_categoria_producto', $producto->id_categoria_producto ?? '') ? '' : 'selected' }}>
                Selecciona categoría
            </option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id_categoria_producto }}"
                    {{ (old('id_categoria_producto', $producto->id_categoria_producto ?? '') == $categoria->id_categoria_producto) ? 'selected' : '' }}>
                    {{ $categoria->categoria }}
                </option>
            @endforeach
        </select><br>

        <label for=""><i class="fa-solid fa-scale-balanced" style="color: #04fb56;"></i>Unidad de medida</label>
        <select name="id_unidad_peso_producto" id="" class="form-control" required>
            <option value="" disabled {{ old('id_unidad_peso_producto', $producto->id_unidad_peso_producto ?? '') ? '' : 'selected' }}>
                Selecciona unidad de medida
            </option>
            @foreach ($unidades as $unidad)
                <option value="{{ $unidad->id_unidad_peso_producto }}"
                    {{ (old('id_unidad_peso_producto', $producto->id_unidad_peso_producto ?? '') == $unidad->id_unidad_peso_producto) ? 'selected' : '' }}>
                    {{ $unidad->unidad_peso }}
                </option>
            @endforeach
        </select><br>

        <button type="submit" class="btn btn-primary mt-2">
            {{ isset($producto) ? 'Actualizar' : 'Ingresar' }}
        </button>
        <p class="error" id="errorMessage"></p>
    </form>

    <div class="options-crud">
        <form action="{{ route('admin.productos.index') }}" method="get">
            <button type="submit" class="boton-regresar">Regresar</button>
        </form>
    </div>
</div>
