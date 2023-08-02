function getAllPolideportivos() {
  const url = `../server/get-polideportivos.php`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const tablaReservasEstado = document.getElementById(
        "tablaReservasEstado"
      );
      const vacio = document.getElementById("vacio");
      const tbody = tablaReservasEstado.getElementsByTagName("tbody")[0];
      tbody.innerHTML = "";
      console.log(data);

      data.forEach((polideportivo) => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
            <td>${polideportivo.nombre}</td>
            <td>${polideportivo.direccion}</td>
            <td>${polideportivo.horario_apertura} - ${polideportivo.horario_cierre}</td>
            <td>${polideportivo.ciudad}</td>
            <td>${polideportivo.telefono}</td>
            <td>${polideportivo.email}</td>
            <td>${polideportivo.email_usuario}</td>
            <td class="acciones">
              <button class="btn-borrar" data-id="${polideportivo.id}"><i class="fa-solid fa-trash"></i></button>
            </td>
          `;

        tbody.appendChild(fila);
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

function borrarPolideportivo(polideportivoId) {
  const url = `../server/delete-polideportivo.php?polideportivoId=${polideportivoId}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      getAllPolideportivos();
    })
    .catch((error) => {
      console.error(error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  getAllPolideportivos();

  const tablaReservasEstado = document.getElementById("tablaReservasEstado");
  tablaReservasEstado.addEventListener("click", (event) => {
    const target = event.target;

    if (
      target.classList.contains("btn-borrar") ||
      target.closest(".btn-borrar")
    ) {
      const btnBorrar = target.classList.contains("btn-borrar")
        ? target
        : target.closest(".btn-borrar");
      const polideportivo = btnBorrar.getAttribute("data-id");
      borrarPolideportivo(polideportivo);
    }
  });
});
