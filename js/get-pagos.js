function getAllPagos() {

    let userId = $("#idUser").val();

    const url = `../server/get-pagos.php?userId=${userId}`;
  
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
  
        data.forEach((pago) => {
          const fila = document.createElement("tr");
  
          fila.innerHTML = `
              <td>${pago.id_reserva}</td>
              <td>${pago.fecha_pago}</td>
              <td>${pago.monto}€</td>
              <td>${pago.numero_factura}</td>
              <td class="acciones">
                <button class="btn-borrar" data-id="${pago.id}"><i class="fa-solid fa-check"></i></button>
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
  
  function borrarPago(pagoId, userId) {
    const url = `../server/delete-pago.php?pagoId=${pagoId}`;
    fetch(url)
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        getAllPagos();
      })
      .catch((error) => {
        console.error(error);
      });
  }
  
  document.addEventListener("DOMContentLoaded", function () {
    getAllPagos();
  
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
        const pagoId = btnBorrar.getAttribute("data-id");
        borrarPago(pagoId);
      }
    });
  });
  