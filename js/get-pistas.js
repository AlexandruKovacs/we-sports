function getAllPistas() {
    const url = `../server/get-pistas.php`;
  
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
  
        data.forEach((pista) => {
          const fila = document.createElement("tr");
  
          fila.innerHTML = `
              <td>${pista.nombre_pista}</td>
              <td>${pista.nombre_deporte}</td>
              <td>${pista.descripcion}</td>
              <td>${pista.nombre_polideportivo}</td>
              <td class="acciones">
                <button class="btn-borrar" data-id="${pista.id_pista}"><i class="fa-solid fa-trash"></i></button>
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
  
  function borrarPista(pistaId) {
    const url = `../server/delete-pista.php?pistaId=${pistaId}`;
    fetch(url)
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        getAllPistas();
      })
      .catch((error) => {
        console.error(error);
      });
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    getAllPistas();
  
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
        const pistaId = btnBorrar.getAttribute("data-id");
        borrarPista(pistaId);
      }
    });
  });
  