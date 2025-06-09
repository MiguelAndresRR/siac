document.getElementById('entries').addEventListener('change', function () {
    const valor = this.value;

    const params = new URLSearchParams(window.location.search);

    params.set('PorPagina', valor);

    window.location.href = `${window.location.pathname}?${params.toString()}`;
});
