<div class="container-proveedor-class">
    <table class="tableFixHead">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nit</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>
                    <button type="submit" class="btn" id='crear-modal-proveedor'>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </th>

            </tr>
        </thead>
        <tbody id="container-proveedor-table">
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id_proveedor }}</td>
                    <td>{{ $proveedor->nombre_proveedor }}</td>
                    <td>{{ $proveedor->nit_proveedor }}</td>
                    <td>{{ $proveedor->direccion_proveedor }}</td>
                    <td>{{ $proveedor->telefono_proveedor }}</td>
                    <td>{{ $proveedor->correo_proveedor }}</td>
                    <td id="botones">
                        <button type="button" class="btn-ver"data-id_proveedor="{{ $proveedor->id_proveedor }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button type="button" class="btn-editar" data-id_proveedor="{{ $proveedor->id_proveedor }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="borrar-boton btn btn-danger"
                            data-id_proveedor="{{ $proveedor->id_proveedor }}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        @if ($proveedor->id_proveedor)
                            <form id="formEliminar{{ $proveedor->id_proveedor }}" method="POST"
                                action="{{ route('admin.proveedor.destroy', $proveedor->id_proveedor) }}"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="paginacion">
    @include('admin.proveedor.layoutproveedor.paginacion')
</div>
<script src="{{ asset('js/proveedor/borrar.js') }}"></script>
