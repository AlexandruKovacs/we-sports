registerUserForm.addEventListener('submit', function(e) {
    e.preventDefault();

    if (!/^[a-zA-Z0-9._-]{3,20}$/.test(newUsername.value.trim())) {
        showMessage('El usuario debe contener entre 3 y 20 caracteres alfanuméricos.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none'; 
    }

    if (!/^[A-Z][a-z]{1,20}$/.test(newName.value.trim())) {
        showMessage('El nombre debe empezar por mayúscula y contener entre 2 y 20 caracteres alfabéticos.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none'; 
    }

    if (!/^[-A-Za-z\sáéíóúÁÉÍÓÚ]{2,30}$/.test(newSurname.value.trim())) {
        showMessage('Los apellidos deben empezar por mayúscula y contener entre 2 y 30 caracteres alfabéticos.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none';
    }

    if (!checkbox.checked) {
        showMessage('Debes aceptar los Términos y Condiciones.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none';
    }

    if (newUsername.value.trim() === '' || newName.value.trim() === '' || newSurname.value.trim() === '') {
        showMessage('Todos los campos son obligatorios.', success = false);
        return;
    } else {
        localStorage.setItem('username', newUsername.value.trim());
        localStorage.setItem('name', newName.value.trim());
        localStorage.setItem('surname', newSurname.value.trim());

        mensajeError.style.display = 'none';
        window.location.href = 'register-user-1.php';
    }

});