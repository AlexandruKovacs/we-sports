$(document).ready(function() {
    $.getJSON('../server/get-profile.php', function(response) {
        if (response.success) {
            $('#nombre').val(response.data.nombre);
            $('#apellidos').val(response.data.apellidos);
            $('#email').val(response.data.email);
            $('#username').val(response.data.username);
            $('#telefono').val(response.data.telefono);
        } else {
            console.log(response);
        }
    });

    $('#profileForm').submit(function(e) {
        e.preventDefault();

        let newName = $('#nombre').val();
        let newSurname = $('#apellidos').val();
        let newEmail = $('#email').val();
        let newUsername = $('#username').val();
        let newTelefono = $('#telefono').val();

        if (!/^[A-Z][a-z]{1,19}$/.test(newName)) {
            showMessage('El nombre debe empezar por mayúscula y contener entre 2 y 20 caracteres alfabéticos.', success = false);
            return;
        }

        if (!/^[A-Z][a-z]{1,29}$/.test(newSurname)) {
            showMessage('Los apellidos deben empezar por mayúscula y contener entre 2 y 30 caracteres alfabéticos.', success = false);
            return;
        }

        if (!/^[A-Za-z0-9._]+@[A-Za-z0-9]+\.[A-Za-z]{2,}$/.test(newEmail)) {
            showMessage('El correo debe ser válido.', success = false);
            return;
        }

        if (!/^[a-zA-Z0-9._-]{3,20}$/.test(newUsername)) {
            showMessage('El usuario debe contener entre 3 y 20 caracteres alfanuméricos.', success = false);
            return;
        }

        if (!/^[0-9]{9}$/.test(newTelefono)) {
            showMessage('El teléfono debe ser válido y contener 10 dígitos.', success = false);
            return;
        }

        if (newName.trim() === '' || newSurname.trim() === '' || newUsername.trim() === '' || newEmail.trim() === '' || newTelefono.trim() === '') {
            showMessage('Todos los campos son obligatorios.', success = false);
            return;
        }

        let formData = $(this).serialize();

        $.post('../server/update-profile.php', formData, function(response) {
            if (response.success) {
                showMessage(response.message, success = true);
            } else {
                showMessage(response.message, success = false);
            }
        });
    });
});
