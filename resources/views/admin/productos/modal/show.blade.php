<div class="container-modal-show">
    <div class="mostrar-producto-container">
        <h2>Producto</h2>

        <label>Nombre:</label>
        <input type="text" id="nombre_producto" readonly />

        <label>Precio:</label>
        <input type="text" id="precio_producto" readonly />

        <label>Categoría:</label>
        <input type="text" id="id_categoria_producto" readonly />

        <label>Unidad de peso:</label>
        <input type="text" id="id_unidad_peso_producto" readonly />
        <button type="button" id="ocultar-modal">Salir</button>
    </div>
</div>
<script src="{{ asset('js/dashboard/productos/showboton.js') }}"></script>
