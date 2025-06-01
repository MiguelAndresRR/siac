const porPagina = document.getElementById("entries").value;
document.getElementById("entries").addEventListener("change", function () {
    const perPage = this.value;
    const url = new URL(window.location.href);
    url.searchParams.set("PorPagina", porPagina);
    url.searchParams.set("pagina", 1);

    window.location.href = url.toString();
});
