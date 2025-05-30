document.querySelectorAll(".borrar-boton").forEach((btn) => {
    btn.addEventListener("click", function() {
        const id_producto = this.dataset.id_producto;
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formEliminar" + id_producto).submit();
            }
        });
    });
});
