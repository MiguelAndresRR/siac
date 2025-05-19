document.querySelectorAll(".btn-editar").forEach((btn) => {
    btn.addEventListener("click", function () {
        const id = this.dataset.id_producto;

        fetch(`/admin/productos/${id}`)
            .then((response) => response.json())
            .then((data) => {
                document.getElementById("nombre_producto").value = data.nombre_producto;
                document.getElementById("precio_producto").value = data.precio_producto;
                document.getElementById("id_categoria_producto").value = data.id_categoria_producto;
                document.getElementById("id_unidad_peso_producto").value = data.id_unidad_peso_producto;
                document.getElementById(
                    "formEditar"
                ).action = '/admin/productos/index/${id}';
                // Muestra el modal
                document
                    .querySelector('.container-modal-editar')
                    .classList.add('mostrar');
            })
            .catch((error) => console.error('Error al cargar datos:', error));
    });
});
