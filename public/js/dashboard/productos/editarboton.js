const btnLanzarModalEdit = document.querySelector('#editar-modal');
const btnOcultarModalEdit = document.querySelector('#ocultar-modal');
const contModalEdit = document.querySelector('.container-modal-editar');

btnLanzarModalEdit.addEventListener('click', (e) => {
    e.preventDefault();
    contModalEdit.classList.add('mostrar');
});

btnOcultarModalEdit.addEventListener('click', (e) => {
    e.preventDefault();
    contModalEdit.classList.remove('mostrar');
});

