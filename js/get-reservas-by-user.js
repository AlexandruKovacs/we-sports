function obtenerReservas(administradorId) {
  const url = `../server/get-reservas-by-user.php?administradorId=${administradorId}`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {

      const tablaReservasEstado = document.getElementById("tablaReservasEstado");
      const vacio = document.getElementById("vacio");
      const tbody = tablaReservasEstado.getElementsByTagName("tbody")[0];
      tbody.innerHTML = "";

      console.log(data);
      data.forEach((reserva) => {
        const fila = document.createElement("tr");

        const inicioReservaSplit = reserva.inicio_reserva.split(" ");
        const fechaInicioSplit = inicioReservaSplit[0].split("-");
        const fechaInicio = `${fechaInicioSplit[2]}-${fechaInicioSplit[1]}-${fechaInicioSplit[0]}`;
        const horaInicio = inicioReservaSplit[1].slice(0, -3);

        const finReservaSplit = reserva.fin_reserva.split(" ");
        const fechaFinSplit = finReservaSplit[0].split("-");
        const fechaFin = `${fechaFinSplit[2]}-${fechaFinSplit[1]}-${fechaFinSplit[0]}`;
        const horaFin = finReservaSplit[1].slice(0, -3);

        fila.innerHTML = `
            <td>${reserva.nombre_polideportivo}</td>
            <td>${reserva.nombre_pista}</td>
            <td>${fechaInicio}</td>
            <td>${horaInicio}</td>
            <td>${horaFin}</td>
            <td>${reserva.estado_reserva}</td>
            <td><button class="btn-borrar" data-id="${reserva.id}"><i class="fa-solid fa-trash"></i></button></td>
          `;
        tbody.appendChild(fila);
      });

      const btnsBorrar = document.getElementsByClassName("btn-borrar");
      Array.from(btnsBorrar).forEach((btn) => {
        btn.addEventListener("click", (e) => {
          const id = e.target.dataset.id;
          const url = `../server/delete-reserva.php?reservaId=${id}`;

          fetch(url)
            .then((response) => response.json())
            .then((data) => {
              console.log(data);
              obtenerReservas(administradorId);
            })
            .catch((xhr) => {
              console.error(xhr);
            });
        });
      });

      if (data.length === 0) {
        tablaReservasEstado.style.visibility = "hidden";
        vacio.style.visibility = "visible";
        vacio.style.display = "grid";
      } else {
        tablaReservasEstado.style.visibility = "visible";
        vacio.style.visibility = "hidden";
        vacio.style.display = "none";
      }
    })
    .catch((error) => {
      console.error(error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  const idUser = $("#idUser").val();
  obtenerReservas(idUser);
});
