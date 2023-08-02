$("form.registra-polideportivo").submit(function (event) {
  event.preventDefault();

  var nombre = $('input[name="nombre"]').val();
  var icono = $('select[name="deportes"]').val();


  if (nombre.trim() === "") {
    $("#mensajeSuccess").hide();
    $("#mensajeError").text("Por favor, ingresa un nombre del deporte.").show();
    return;
  }

  if (icono.trim() === "") {
    $("#mensajeSuccess").hide();
    $("#mensajeError").text("Por favor, selecciona un icono del deporte.").show();
    return;
  }

  $.ajax({
    url: "../server/register-deporte.php",
    type: "POST",
    dataType: "json",
    data: {
      nombre: nombre,
      icono: icono,
    },
    success: function (data) {
      if (data.success) {
        $("#mensajeError").hide();
        $("#mensajeSuccess").text(data.message).show();
        $("form.registra-polideportivo")[0].reset();
      } else {
        $("#mensajeSuccess").hide();
        $("#mensajeError").text(data.message).show();
      }
    },
    error: function () {
      console.log("No se ha podido añadir el deporte.");
    },
  });
});
