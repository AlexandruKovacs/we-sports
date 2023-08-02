$("form.registra-polideportivo").submit(function (event) {
  event.preventDefault();

  var nombre = $("input[name='nombre']").val();
  var deporteId = $("#deporteSelect").val();
  var descripcion = $("textarea[name='descripcion']").val();
  var idUsuario = $("input[name='id_usuario']").val();
  var polideportivoId = localStorage.getItem("polideportivoId");

  console.log(deporteId);

  if (nombre.trim() === "") {
    $("#mensajeSuccess").hide();
    $("#mensajeError").text("Por favor, ingresa un nombre de pista.").show();
    return;
  }

  if (deporteId === "") {
    $("#mensajeSuccess").hide();
    $("#mensajeError").text("Por favor, selecciona un deporte.").show();
    return;
  }

  if (descripcion === "") {
    $("#mensajeSuccess").hide();
    $("#mensajeError").text("Por favor, ingresa una descripción de la pista.").show();
    return;
  }

  $.ajax({
    url: "../server/register-pista.php",
    type: "POST",
    dataType: "json",
    data: {
      nombre: nombre,
      deporteId: deporteId,
      descripcion: descripcion,
      idUsuario: idUsuario,
      polideportivoId: polideportivoId,
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
      console.log("No se ha podido añadir la pista");
    },
  });
});
