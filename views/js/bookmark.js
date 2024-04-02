$(".tablas").on("click", ".btnEditarMaterial", function () {
  var editarMaterial = $(this).attr("id");
  console.log("editarMaterial", editarMaterial);
  var datos = new FormData();
  datos.append("editar", editarMaterial);

  $.ajax({
    url: "ajax/bookmark.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      $("#txtEditarClave").val(respuesta["id"]);
      $("#txtEditarMaterial").val(respuesta["title"]);
      $("#txtEditarURL").val(respuesta["url"]);
    },
  });
});

$(".tablas").on("click", ".btnEliminarMaterial", function () {
  var idMaterial = $(this).attr("id");

  swal({
    title: "¿Está seguro de borrar?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=bookmark&id=" + idMaterial 
    }
  });
});