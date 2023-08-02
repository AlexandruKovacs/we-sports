let idUser = $("#idUser").val();

$(document).ready(function () {

  $("#pistasForm").hide();

  $.ajax({
    url: "../server/get-polideportivos-by-id.php",
    type: "POST",
    dataType: "json",
    data: { idUser: idUser },
    success: function (data) {
      var select = $("#polideportivoSelect");

      if (data.length == 0) {
        select.append('<option value="0">No hay polideportivos</option>');
      } else {
        select.empty();
        select.append('<option value="0">Selecciona un polideportivo</option>');
        $.each(data, function (index, polideportivo) {
          select.append(
            '<option value="' +
              polideportivo.id +
              '">' +
              polideportivo.nombre +
              "</option>"
          );
        });
      }

      console.log(data);
    },
    error: function () {
      console.log("No se ha podido obtener la información");
    },
  });



  $("#polideportivoSelect").change(function () {
    var selectedOption = $(this).children("option:selected");
    var polideportivoId = selectedOption.val();
    var polideportivoNombre = selectedOption.text();

    if (polideportivoId === "0") {
      $("#pistasForm").hide();
    } else {
      $("#pistasForm").show();
      localStorage.setItem("polideportivoId", polideportivoId);
    }
  });
});
