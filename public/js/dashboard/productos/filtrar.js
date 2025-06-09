document.addEventListener("DOMContentLoaded", function () {
    const filtroCategoria = document.getElementById("filtro-categoria");
    const filtroUnidad = document.getElementById("filtro-unidad");

    function filtrar() {
        const categoria = filtroCategoria.value.toLowerCase();
        const unidad = filtroUnidad.value.toLowerCase();
        const filas = document.querySelectorAll("#container-productos-table tr");

        filas.forEach(fila => {
            const textoCategoria = fila.querySelector("td:nth-child(4)")?.textContent.toLowerCase() || "";
            const textoUnidad = fila.querySelector("td:nth-child(5)")?.textContent.toLowerCase() || "";

            const coincideCategoria = categoria === "" || textoCategoria.includes(categoria);
            const coincideUnidad = unidad === "" || textoUnidad.includes(unidad);

            fila.style.display = (coincideCategoria || coincideUnidad) ? "" : "none";
        });
    }

    filtroCategoria.addEventListener("change", filtrar);
    filtroUnidad.addEventListener("change", filtrar);
});
