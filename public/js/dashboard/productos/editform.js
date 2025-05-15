$(".edit-button").click(function () {
    var id_producto = $(this).data("id_producto");

    $.ajax({
        url: "/productos/" + id_producto,
        type: "GET",
        success: function (response) {
            $("#form-edit").html(response).show();
        },
        error: function () {
            alert("Error al cargar el formulario");
        },
    });
});
