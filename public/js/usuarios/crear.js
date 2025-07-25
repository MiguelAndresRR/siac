function asignarEventosModalCrear() {
    const btnAbrirModal = document.querySelector("#crear-modal-usuarios");
    const btnCerrarModal = document.querySelector("#ocultar-modal-crear1");
    const contModal = document.querySelector(".container-modal-crear");

    if (btnAbrirModal) {
        btnAbrirModal.addEventListener("click", (e) => {
            e.preventDefault();
            contModal.classList.add("mostrar");
            console.log("✅ Modal abierto");
        });
    }

    if (btnCerrarModal) {
        btnCerrarModal.addEventListener("click", (e) => {
            e.preventDefault();
            contModal.classList.remove("mostrar");
            console.log("✅ Modal cerrado");
        });
    }
}

// Al cargar la página
asignarEventosModalCrear();
window.asignarEventosModalCrear = asignarEventosModalCrear;
