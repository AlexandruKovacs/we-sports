registerUserForm1.addEventListener('submit', function(e) {
    e.preventDefault();

    if (!/^[A-Za-z0-9._]+@[A-Za-z0-9]+\.[A-Za-z]{2,}$/.test(newEmail.value.trim())) {
        showMessage('El correo debe ser válido.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none'; 
    }

    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(newPassword.value.trim())) {
        showMessage('La contraseña debe tener una letra mayúscula, una letra minúscula, un dígito y una longitud de 8 caracteres.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none';
    }

    if (newPassword.value.trim() !== newPassword2.value.trim()) {
        showMessage('Las contraseñas no coinciden.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none'; 
    }

    if (newEmail.value.trim() === '' || newPassword.value.trim() === '' || newPassword2.value.trim() === '') {
        showMessage('Todos los campos son obligatorios.', success = false);
        return;
    } else {
        mensajeError.style.display = 'none';
    }

    const url = 'server/register-user.php';
    const data = `name=${localStorage.getItem('name')}&surname=${localStorage.getItem('surname')}&username=${localStorage.getItem('username')}&email=${newEmail.value.trim()}&password=${newPassword.value.trim()}&tipoUsuario=${sessionStorage.getItem('tipoUsuario')}`;
  
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    loader.style.display = 'block';
    let response = {};

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            response = JSON.parse(xhr.responseText);
            
            setTimeout(function() {
                if (response.success) {

                    formContainer.style.display = 'none';
                    mensajeSuccess.style.display = 'block';
                    mensajeSuccess.innerHTML = response.message;

                } else {
                    mensajeError.style.display = 'block';
                    mensajeError.innerHTML = response.message;
                    loader.style.display = 'none';
                }
            }, 1000);
        }
    };

    xhr.send(data);
});

showNewPassword.addEventListener('click', function() {
    togglePassword(newPassword, showNewPassword);
});

showNewPassword2.addEventListener('click', function() {
    togglePassword(newPassword2, showNewPassword2);
});