const btnLanzarModalEdit = document.querySelector("#editar-modal");
const btnOcultarModalEdit = document.querySelector("#ocultar-modal");
const contModalEdit = document.querySelector(".container-modal-editar");

btnLanzarModalEdit.addEventListener("click", (e) => {
    e.preventDefault();
    contModalEdit.classList.add("mostrar");
});

btnOcultarModalEdit.addEventListener("click", (e) => {
    e.preventDefault();
    contModalEdit.classList.remove("mostrar");
});

document.querySelectorAll(".btn-editar").forEach((btn) => {
    btn.addEventListener("click", function () {
        const id = this.dataset.id_producto;

        fetch(`/admin/productos/${id}`)
            .then((response) => response.json())
            .then((data) => {
                document.getElementById("nombre_producto").value =
                    data.nombre_producto;
                document.getElementById("precio_producto").value =
                    data.precio_producto;
                document.getElementById("id_categoria_producto").value =
                    data.id_categoria_producto;
                document.getElementById("id_unidad_peso_producto").value =
                    data.id_unidad_peso_producto;
                document.getElementById("formEditar").action =
                    "/admin/productos/{id}";
                document
                    .querySelector(".container-modal-editar")
                    .classList.add("mostrar");
            })
            .catch((error) => console.error("Error al cargar datos:", error));
    });
});
