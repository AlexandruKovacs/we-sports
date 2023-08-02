function getAllUsers() {
  const url = `../server/get-users.php`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const tablaReservasEstado = document.getElementById("tablaReservasEstado");
      const vacio = document.getElementById("vacio");
      const tbody = tablaReservasEstado.getElementsByTagName("tbody")[0];
      tbody.innerHTML = "";
      console.log(data);

      data.forEach((usuario) => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
          <td>${usuario.nombre}</td>
          <td>${usuario.apellidos}</td>
          <td>${usuario.email}</td>
          <td>${usuario.username}</td>
          <td>${usuario.telefono}</td>
          <td>${usuario.tipo}</td>
          <td class="acciones">
            <button class="btn-borrar" data-id="${usuario.id}"><i class="fa-solid fa-trash"></i></button>
            <button class="btn-editar" data-id="${usuario.id}"><i class="fa-solid fa-pencil"></i></button>
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

function borrarUsuario(userId) {
  const url = `../server/delete-user.php?userId=${userId}`;
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      getAllUsers();
    })
    .catch((error) => {
      console.error(error);
    });
}

function editarUsuario(userId) {
  window.location.href = `editar-usuario.php?userId=${userId}`;
}

document.addEventListener("DOMContentLoaded", function () {
  getAllUsers();

  const tablaReservasEstado = document.getElementById("tablaReservasEstado");
  tablaReservasEstado.addEventListener("click", (event) => {
    const target = event.target;

    if (target.classList.contains("btn-borrar") || target.closest(".btn-borrar")) {
      const btnBorrar = target.classList.contains("btn-borrar") ? target : target.closest(".btn-borrar");
      const userId = btnBorrar.getAttribute("data-id");
      borrarUsuario(userId);
      console.log(userId);
    } else if (target.classList.contains("btn-editar") || target.closest(".btn-editar")) {
      const btnEditar = target.classList.contains("btn-editar") ? target : target.closest(".btn-editar");
      const userId = btnEditar.getAttribute("data-id");
      editarUsuario(userId);
      console.log(userId);
    }
  });
});
