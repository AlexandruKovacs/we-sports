$(document).ready(function () {
  $.ajax({
    url: "../server/get-polideportivos.php",
    method: "GET",
    dataType: "json",
    success: function (response) {
      let polideportivoContainer = $("#polideportivoContainer");
      polideportivoContainer.empty();

      $("#pistasContainer").css("display", "none");
      $("#fechaHoraContainer").css("display", "none");
      $("#resumenContainer").css("display", "none");
      $("#finContainer").css("display", "none");

      if (response.length > 0) {
        $.each(response, function (index, polideportivo) {
          let div = $("<div>").addClass("opt-polideportivo");

          let content = `
            <div class="icon-polideportivo">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="text-polideportivo">
              <h4>${polideportivo.nombre}</h4>
              <p><strong>Dirección:</strong> ${polideportivo.direccion}</p>
              <p><strong>Horario:</strong> 
                ${polideportivo.horario_apertura
                  .split(":")
                  .slice(0, 2)
                  .join(":")} - 
                ${polideportivo.horario_cierre.split(":").slice(0, 2).join(":")}
              </p>
              <p><strong>Ciudad:</strong> ${polideportivo.ciudad}</p>
              <p><strong>Teléfono:</strong> ${polideportivo.telefono}</p>
              <p><strong>Correo:</strong> ${polideportivo.email}</p>
            </div>
          `;

          div.html(content);

          div.click(function () {
            sessionStorage.setItem("polideportivoId", polideportivo.id);
            sessionStorage.setItem("polideportivoNombre", polideportivo.nombre);
            sessionStorage.removeItem("pistaId");

            $("#fechaHoraContainer").css("display", "none");
            $("#resumenContainer").css("display", "none");
            $("#finContainer").css("display", "none");
            mensajeError.style.display = "none";
            mensajeSuccess.style.display = "none";

            $(".opt-polideportivo").removeClass("selected");
            $(this).addClass("selected");

            let polideportivoId = sessionStorage.getItem("polideportivoId");
            if (polideportivoId) {
              $("#pistasContainer").css("display", "block");
              cargarPistas(polideportivoId);
            }
          });

          polideportivoContainer.append(div);
        });
      }
    },
    error: function (xhr, error, status) {
      console.log(xhr.responseText);
      console.log(error.responseText);
      console.log(status.responseText);
    },
  });

  $("#reservaForm").submit(function (event) {
    event.preventDefault();

    let pistaId = sessionStorage.getItem("pistaId");
    let polideportivoId = sessionStorage.getItem("polideportivoId");
    let fecha = $("#fecha").val();
    let horaInicio = $("#horaInicio").val();
    let horaFin = $("#horaFin").val();

    let fechaActual = new Date();
    let horaActual = fechaActual.getHours();
    let minutoActual = fechaActual.getMinutes();
    let horaActualFormateada = `${horaActual
      .toString()
      .padStart(2, "0")}:${minutoActual.toString().padStart(2, "0")}`;

    if (fecha < fechaActual.toISOString().split("T")[0]) {
      showMessage(
        "La fecha no puede ser anterior a la fecha actual",
        (success = false)
      );
      return;
    } else if (
      fecha === fechaActual.toISOString().split("T")[0] &&
      horaInicio < horaActualFormateada
    ) {
      showMessage(
        "La hora de inicio no puede ser anterior a la hora actual",
        (success = false)
      );
      return;
    } else if (horaInicio >= horaFin) {
      showMessage(
        "La hora de inicio debe ser anterior a la hora de fin",
        (success = false)
      );
      return;
    }

    let mensajeError = document.getElementById("mensajeError");
    let loader = document.getElementById("loader");

    mensajeError.style.display = "none";
    loader.style.display = "block";

    $.ajax({
      url: "../server/get-pistas-disponibles.php",
      method: "POST",
      data: {
        polideportivo_id: polideportivoId,
        pista_id: pistaId,
        fecha: fecha,
        hora_inicio: horaInicio,
        hora_fin: horaFin,
      },
      dataType: "json",
      cache: false,
      success: function (response) {
        if (response.success) {
          setTimeout(function () {
            loader.style.display = "none";
            $("#resumenContainer").css("display", "block");

            let horaInicioObj = new Date(`2000-01-01T${horaInicio}`);
            let horaFinObj = new Date(`2000-01-01T${horaFin}`);
            let duracionHoras = (horaFinObj - horaInicioObj) / (1000 * 60 * 60);

            let precioPorHora = 2.5;
            let precioTotal = duracionHoras * precioPorHora;

            let resumen = `
            <div class="icon-resumen">
              <i class="fa-solid fa-list-check"></i>
            </div>
            <div class="text-resumen">
              <p><strong>Polideportivo:</strong> ${sessionStorage.getItem(
                "polideportivoNombre"
              )}</p>
              <p><strong>Pista:</strong> ${sessionStorage.getItem(
                "pistaNombre"
              )}</p>
              <p><strong>Fecha:</strong> ${parsearFecha(fecha)}</p>
              <p><strong>Hora de inicio:</strong> ${horaInicio}</p>
              <p><strong>Hora de fin:</strong> ${horaFin}</p>
              <p><strong>Precio:</strong> ${precioTotal.toFixed(2)}€</p>
              <p classs="pago"><strong><i class="fa-solid fa-circle-info"></i> EL PAGO SE REALIZARÁ EN EL POLIDEPORTIVO</strong></p>
          </div>
            `;
            $("#resumenReserva").html(resumen);

            showMessage(response.message, (success = true));
          }, 1000);
        } else {
          setTimeout(function () {
            loader.style.display = "none";
            $("#resumenContainer").css("display", "none");
            showMessage(response.message, (success = false));
          }, 1000);
        }
      },
      error: function (xhr, error, status) {
        console.log(xhr.responseText);
        console.log(error.responseText);
        console.log(status.responseText);
      },
    });
  });

  $("#reservaButton").click(function () {
    let pistaId = sessionStorage.getItem("pistaId");
    let polideportivoId = sessionStorage.getItem("polideportivoId");
    let polideportivoNombre = sessionStorage.getItem("polideportivoNombre");
    let pistaNombre = sessionStorage.getItem("pistaNombre");
    let fecha = $("#fecha").val();
    let horaInicio = $("#horaInicio").val();
    let horaFin = $("#horaFin").val();

    mensajeError.style.display = "none";
    loader1.style.display = "block";

    $.ajax({
      url: "../server/reservar-pista.php",
      method: "POST",
      data: {
        polideportivo_id: polideportivoId,
        polideportivo_nombre: polideportivoNombre,
        pista_id: pistaId,
        pista_nombre: pistaNombre,
        fecha: fecha,
        hora_inicio: horaInicio,
        hora_fin: horaFin,
        id_user: document.getElementById("idUser").value,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          console.log(response.message);
          setTimeout(function () {
            loader1.style.display = "none";
            $("#polideportivosContainer").css("display", "none");
            $("#pistasContainer").css("display", "none");
            $("#fechaHoraContainer").css("display", "none");
            $("#resumenContainer").css("display", "none");
            $("#finContainer").css("display", "block");
            $("#infoFin").html(response.message);
          }, 2000);
        } else {
          setTimeout(function () {
            loader.style.display = "none";
            $("#finContainer").css("display", "none");
          }, 2000);
        }
      },
      error: function (xhr, error, status) {
        console.log(xhr.responseText);
        console.log(error.responseText);
        console.log(status.responseText);
      },
    });
  });
});
