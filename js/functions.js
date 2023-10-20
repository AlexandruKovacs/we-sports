const xhr = new XMLHttpRequest();
const xhrReservasUserEstado = new XMLHttpRequest();
const xhrEstado = new XMLHttpRequest();
const xhrCancelar = new XMLHttpRequest();
const xhrReactivar = new XMLHttpRequest();
const xhrArchivar = new XMLHttpRequest();
const xhrHorarios = new XMLHttpRequest();

if (window.location.pathname.includes("/index.php")) {
  sessionStorage.clear();
}

if (loginUser) {
  loginUser.addEventListener("click", function () {
    window.location.href = "login.php";
  });
}

if (registerReserva) {
  registerReserva.addEventListener("click", function () {
    window.location.href = "pistas.php";
  });
}

if (btnBack) {
  btnBack.addEventListener("click", function () {
    window.location.href = "index.php";
  });
}

if (reservasActivas) {
  reservasActivas.addEventListener("click", function () {
    window.location.href = "../user/reservas/reservas-activas.php";
  });
}

if (reservasCanceladas) {
  reservasCanceladas.addEventListener("click", function () {
    window.location.href = "../user/reservas/reservas-canceladas.php";
  });
}

if (reservasCompletadas) {
  reservasCompletadas.addEventListener("click", function () {
    window.location.href = "../user/reservas/reservas-completadas.php";
  });
}

if (btnPista) {
  btnPista.addEventListener("click", function () {
    window.location.href = "pistas.php";
  });
}

if (btnReserva) {
  btnReserva.addEventListener("click", function () {
    window.location.href = "reservas.php";
  });
}

if (finReserva) {
  finReserva.addEventListener("click", function () {
    window.location.href = "pistas.php";
  });
}

if (btnPolideportivo) {
  btnPolideportivo.addEventListener("click", function () {
    window.location.href = "polideportivos.php";
  });
}

if (btnRegistraPista) {
  btnRegistraPista.addEventListener("click", function () {
    window.location.href = "pistas-poli.php";
  });
}

if (btnVerReservas) {
  btnVerReservas.addEventListener("click", function () {
    window.location.href = "reservas-poli.php";
  });
}

if (btnPerfil) {
  btnPerfil.addEventListener("click", function () {
    window.location.href = "profile-user.php";
  });
}

if (horaInicioInput) {
  horaInicioInput.addEventListener("input", limitarHoras);
}

if (horaFinInput) {
  horaFinInput.addEventListener("input", limitarHoras);
}

function redirectToRegister(tipoUsuario, isLegal) {
  sessionStorage.setItem("tipoUsuario", tipoUsuario);
  const url = isLegal ? "../register-user.php" : "register-user.php";
  window.location.href = url;
}

function togglePassword(inputElement, iconElement) {
  iconElement.classList.toggle("fa-eye");
  iconElement.classList.toggle("fa-eye-slash");

  if (inputElement.type === "password") {
    inputElement.type = "text";
  } else {
    inputElement.type = "password";
  }
}

function showMessage(message, success) {
  if (success) {
    mensajeError.style.display = "none";
    mensajeSuccess.style.display = "block";
    mensajeSuccess.innerHTML = '<i class="fa-solid fa-check"></i>' + message;
  } else {
    mensajeSuccess.style.display = "none";
    mensajeError.style.display = "block";
    mensajeError.innerHTML =
      '<i class="fa-solid fa-circle-exclamation"></i>' + message;
  }
}

function getReservasPorUsuarioEstado(idUser, estado) {
  const tablaReservasEstado = document.getElementById("tablaReservasEstado");
  const vacio = document.getElementById("vacio");

  while (tablaReservasEstado.rows.length > 1) {
    tablaReservasEstado.deleteRow(1);
  }

  xhrReservasUserEstado.onreadystatechange = function () {
    if (
      xhrReservasUserEstado.readyState === 4 &&
      xhrReservasUserEstado.status === 200
    ) {
      console.log(xhrReservasUserEstado.responseText);
      let reservas = JSON.parse(xhrReservasUserEstado.responseText);

      if (reservas.length === 0) {
        tablaReservasEstado.style.visibility = "hidden";
        vacio.style.visibility = "visible";
        vacio.style.display = "grid";
      } else {
        tablaReservasEstado.style.visibility = "visible";
        vacio.style.visibility = "hidden";
        vacio.style.display = "none";
      }

      const tbody = document.querySelector("#tablaReservasEstado tbody");

      reservas.forEach((reserva) => {
        const fila = document.createElement("tr");

        const nombrePolideportivo = document.createElement("td");
        nombrePolideportivo.textContent = reserva.nombrePolideportivo
          ? reserva.nombrePolideportivo
          : "-";
        fila.appendChild(nombrePolideportivo);

        const nombrePista = document.createElement("td");
        nombrePista.textContent = reserva.nombrePista
          ? reserva.nombrePista
          : "-";
        fila.appendChild(nombrePista);

        const fecha = document.createElement("td");

        const datoFecha = new Date(reserva.fecha_reserva);
        const fechaFormateada = `${datoFecha.getDate()}-${
          datoFecha.getMonth() + 1
        }-${datoFecha.getFullYear()}`;

        fecha.textContent = fechaFormateada;
        fila.appendChild(fecha);

        const horaInicio = document.createElement("td");
        horaInicio.textContent = reserva.hora_inicio;
        fila.appendChild(horaInicio);

        const horaFin = document.createElement("td");
        horaFin.textContent = reserva.hora_fin;
        fila.appendChild(horaFin);

        const estado = document.createElement("td");
        if (reserva.estado_reserva === "Activa") {
          const elementoEstado = crearElementoEstado(
            "fa-solid fa-xmark",
            "activa"
          );
          elementoEstado.addEventListener("click", () =>
            cancelarReserva(reserva.id)
          );
          estado.appendChild(elementoEstado);
        } else if (reserva.estado_reserva === "Cancelada") {
          const elementoEstado = crearElementoEstado(
            "fa-solid fa-rotate-left",
            "cancelada"
          );
          elementoEstado.addEventListener("click", () =>
            reactivarReserva(reserva.id)
          );
          estado.appendChild(elementoEstado);
        } else {
          const elementoEstado = crearElementoEstado(
            "fa-solid fa-box-archive",
            "terminada"
          );
          elementoEstado.addEventListener("click", () =>
            archivarReserva(reserva.id)
          );
          estado.appendChild(elementoEstado);
        }

        fila.appendChild(estado);

        tbody.appendChild(fila);
      });
    }
  };
  xhrReservasUserEstado.open(
    "GET",
    `../../server/get-reservas-estado.php?idUser=${idUser}&estado_reserva=${estado}`,
    true
  );
  xhrReservasUserEstado.send();
}

function crearElementoEstado(iconoClass, textoClass) {
  const icono = document.createElement("i");
  const textoElemento = document.createElement("p");

  icono.className = iconoClass;
  textoElemento.className = textoClass;

  textoElemento.appendChild(icono);

  return textoElemento;
}

function cambiarEstadoReserva(idReserva, nuevoEstado) {
  xhrEstado.onreadystatechange = function () {
    if (xhrEstado.readyState === 4 && xhrEstado.status === 200) {
      getReservasPorUsuarioEstado(idUser, estado);
    }
  };
  xhrEstado.open("POST", "../server/update-estado.php", true);
  xhrEstado.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  xhrEstado.send(`idReserva=${idReserva}&nuevoEstado=${nuevoEstado}`);
}

function cancelarReserva(idReserva) {
  xhrCancelar.onreadystatechange = function () {
    if (xhrCancelar.readyState === 4 && xhrCancelar.status === 200) {
      getReservasPorUsuarioEstado(idUser, estado);
    }
  };
  xhrCancelar.open("POST", "../../server/cancelar-reserva.php", true);
  xhrCancelar.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  xhrCancelar.send(`idReserva=${idReserva}`);
}

function reactivarReserva(idReserva) {
  xhrReactivar.onreadystatechange = function () {
    if (xhrReactivar.readyState === 4 && xhrReactivar.status === 200) {

      var response = JSON.parse(xhrReactivar.responseText);

      if(response.success) {
        getReservasPorUsuarioEstado(idUser, estado);
        console.log(response);
      } else {
        showMessage(response.message, success = false);
      }
    }
  };
  xhrReactivar.open("POST", "../../server/reactivar-reserva.php", true);
  xhrReactivar.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  xhrReactivar.send(`idReserva=${idReserva}`);
}

function archivarReserva(idReserva) {
  xhrArchivar.onreadystatechange = function () {
    if (xhrArchivar.readyState === 4 && xhrArchivar.status === 200) {
      getReservasPorUsuarioEstado(idUser, estado);
    }
  };
  xhrArchivar.open("POST", "../../server/archivar-reserva.php", true);
  xhrArchivar.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  xhrArchivar.send(`idReserva=${idReserva}`);
}

function validarHoras() {
  const fechaSeleccionada = fechaInput.value;
  const horaInicioSeleccionada = horaInicioInput.value;
  const horaFinSeleccionada = horaFinInput.value;

  const fechaActual = new Date();
  const horaActual = fechaActual.getHours() + ":" + fechaActual.getMinutes();

  if (fechaSeleccionada === fechaActual.toISOString().split("T")[0]) {
    horaInicioInput.min = horaActual;
  } else {
    horaInicioInput.min = "";
  }

  if (horaInicioSeleccionada >= horaFinSeleccionada) {
    horaFinInput.value = "";
  }
}

function cargarPistas(polideportivoId) {
  $.ajax({
    url: "../server/get-pistas-polideportivo.php",
    method: "POST",
    data: { polideportivo_id: polideportivoId },
    dataType: "json",
    success: function (response) {
      let pistaContainer = $("#pistaContainer");
      pistaContainer.empty();

      if (response.length > 0) {
        $.each(response, function (index, pista) {
          let div = $("<div>").addClass("opt-pista");

          let content = `
            <div class="icon-pista">
                <i class="fa-solid ${pista.icono}"></i>
            </div>
            <div class="text-pista">
              <h4>${pista.nombre}</h4>
              <p>${pista.descripcion}</p>
            </div>
          `;

          div.html(content);

          div.click(function () {
            sessionStorage.setItem("pistaId", pista.id);
            sessionStorage.setItem("pistaNombre", pista.nombre);

            $(".opt-pista").removeClass("selected");
            $(this).addClass("selected");

            $("#fechaHoraContainer").css("display", "block");
          });

          pistaContainer.append(div);
        });
      } else {
        let p = $("<p>").text("No hay pistas disponibles.");
        pistaContainer.append(p);
      }
    },
    error: function (xhr, error, status) {
      console.log(xhr.responseText);
      console.log(error.responseText);
      console.log(status.responseText);
    },
  });
}

function parsearFecha(fecha) {
  let fechaObjeto = new Date(fecha);
  let dia = fechaObjeto.getDate();
  let mes = fechaObjeto.getMonth() + 1;
  let anio = fechaObjeto.getFullYear();

  let fechaFormateada = `${dia.toString().padStart(2, "0")}-${mes
    .toString()
    .padStart(2, "0")}-${anio}`;

  return fechaFormateada;
}

function limitarHoras() {
  var horaInicio = horaInicioInput.value;
  var horaFin = horaFinInput.value;

  if (horaInicio && horaFin) {
      var paso = 1800;
      var inicioSegundos = obtenerSegundosDesdeMedianoche(horaInicio);
      var finSegundos = obtenerSegundosDesdeMedianoche(horaFin);

      inicioSegundos = Math.round(inicioSegundos / paso) * paso;
      finSegundos = Math.round(finSegundos / paso) * paso;

      var horaInicioFormateada = segundosAHora(inicioSegundos);
      var horaFinFormateada = segundosAHora(finSegundos);

      horaInicioInput.value = horaInicioFormateada;
      horaFinInput.value = horaFinFormateada;
  }
}

function obtenerSegundosDesdeMedianoche(hora) {
  var partesHora = hora.split(":");
  var horas = parseInt(partesHora[0]);
  var minutos = parseInt(partesHora[1]);
  return (horas * 3600) + (minutos * 60);
}

function segundosAHora(segundos) {
  var horas = Math.floor(segundos / 3600);
  var minutos = Math.floor((segundos % 3600) / 60);
  return pad(horas, 2) + ":" + pad(minutos, 2);
}

function pad(numero, longitud) {
  var str = numero.toString();
  while (str.length < longitud) {
      str = "0" + str;
  }
  return str;
}

document.addEventListener("DOMContentLoaded", function () {
  
  document.addEventListener("click", function (e) {
    if (e.target.matches("#registerUser")) {
      redirectToRegister("cliente", false);
    } else if (e.target.matches("#registerAdmin")) {
      redirectToRegister("admin_polideportivo", false);
    } else if (e.target.matches("#registerUserLegal")) {
      redirectToRegister("cliente", true);
    }
  });

  menuButton.addEventListener("click", function() {
    menu.classList.toggle("active");
    menuButton.classList.toggle("active");

    let icon = menuButton.querySelector("i");
    if (menu.classList.contains("active")) {
      icon.className = "fa-solid fa-times";
    } else {
      icon.className = "fa-solid fa-bars";
    }
  });

});
