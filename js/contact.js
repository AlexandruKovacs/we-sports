$(document).ready(function () {
  $(".formulario").submit(function (event) {
    event.preventDefault();

    const urlPHP = document.getElementById("urlPHP").value;

    let nombre = $("#nombre").val();
    let email = $("#email").val();
    let mensaje = $("#mensaje").val();

    if (nombre === "" || email === "" || mensaje === "") {
      showMessage("Por favor, complete todos los campos", false);
      return false;
    } else {
      mensajeError.style.display = "none";
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      showMessage("Por favor, ingrese un correo electrónico válido", false);
      return false;
    } else {
      mensajeError.style.display = "none";
    }

    if (mensaje.length < 10) {
      showMessage("Por favor, ingrese un mensaje de al menos 10 caracteres", false);
      return false;
    } else {
      mensajeError.style.display = "none";
    }

    loader.style.display = "block";

    $.ajax({
      url: urlPHP,
      method: "POST",
      data: { nombre: nombre, email: email, mensaje: mensaje },
      dataType: "json",
      success: function (response) {
        setTimeout(function () {
          if (response.success) {
            $("#nombre").val("");
            $("#email").val("");
            $("#mensaje").val("");

            mensajeSuccess.style.display = "block";
            mensajeSuccess.innerHTML = response.message;
            loader.style.display = "none";
          }
        }, 1000);
      },
      error: function (xhr) {
        console.error(xhr.responseText);

        mensajeError.style.display = "block";
        loader.style.display = "none";
        mensajeError.innerHTML = response.message;
      },
    });
  });
});
