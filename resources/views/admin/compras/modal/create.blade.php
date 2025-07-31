<div class="container-modal-crear-compras">
    <div class="registrar-compras-container">
        <h2>Registrar Compra</h2>
        <form action="{{ route('admin.compras.store') }}" method="POST" enctype="multipart/form-data"
            id="formularioCompras" class="necesita-validacion">
            @csrf
            <div class="datos-compra">
                {{-- <label for="nombre_usuario">Usuario: {{ Auth::user()->nombre_usuario }}</label>
                <label for="fecha_compra">Fecha de compra: {{ date('d/m/Y') }}</label>
                <label for="total_compra">Total de la compra: {{ $total_compra }}</label> --}}
            </div>
            <button type="submit">Crear</button>
        </form>
        <button type="button" class="btn" id="ocultar-modal-crear-compras">Cancelar</button>

    </div>
</div>
<script src="{{ asset('js/compras/crear.js') }}"></script>
