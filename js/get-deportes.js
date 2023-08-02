$.ajax({
  url: "../server/get-deportes.php",
  type: "POST",
  dataType: "json",
  success: function (data) {
    var select = $("#deporteSelect");
    select.empty();

    select.append('<option value="">Selecciona un deporte</option>');
    $.each(data, function (index, deporte) {
      select.append(
        '<option value="' + deporte.id + '">' + deporte.nombre + "</option>"
      );
    });
  },
  error: function (xhr) {
    console.log(xhr);
  },
});
