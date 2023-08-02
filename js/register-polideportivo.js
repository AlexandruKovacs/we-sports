$(document).ready(function() {
    $('form.registra-polideportivo').submit(function(event) {
        event.preventDefault();

        // Realiza la validación del formulario antes de enviarlo
        if (validateForm()) {
            // Obtiene los datos del formulario
            var formData = $(this).serialize();

            // Envía la solicitud AJAX a un archivo PHP para procesar el formulario
            $.ajax({
                type: 'POST',
                url: '../server/register-polideportivo.php',
                data: formData,
                success: function(response) {
                    // Maneja la respuesta del servidor
                    if (response.success) {
                        $('form.registra-polideportivo')[0].reset();
                        $('#mensajeError').hide();
                        $('#mensajeSuccess').text(response.message).show();
                    } else {
                        $('#mensajeSuccess').hide();
                        $('#mensajeError').text(response.message).show();
                    }
                },
                error: function() {
                    $('#mensajeSuccess').hide();
                    $('#mensajeError').text('Ha ocurrido un error inesperado.').show();
                }
            });
        }
    });

    function validateForm() {
        var isValid = true;
        var errorMessage = '';
    
        var nombre = $('form.registra-polideportivo input[name="nombre"]').val().trim();
        var direccion = $('form.registra-polideportivo input[name="direccion"]').val().trim();
        var horarioApertura = $('form.registra-polideportivo input[name="horario_apertura"]').val().trim();
        var horarioCierre = $('form.registra-polideportivo input[name="horario_cierre"]').val().trim();
        var ciudad = $('form.registra-polideportivo input[name="ciudad"]').val().trim();
        var provincia = $('form.registra-polideportivo input[name="provincia"]').val().trim();
        var pais = $('form.registra-polideportivo input[name="pais"]').val().trim();
        var telefono = $('form.registra-polideportivo input[name="telefono"]').val().trim();
        var email = $('form.registra-polideportivo input[name="email"]').val().trim();
        var idUsuario = $('form.registra-polideportivo input[name="id_usuario"]').val();
    
        if (nombre === '') {
            errorMessage = 'Por favor, ingresa el nombre del polideportivo.';
            isValid = false;
        } else if (direccion === '') {
            errorMessage = 'Por favor, ingresa la dirección del polideportivo.';
            isValid = false;
        } else if (horarioApertura === '') {
            errorMessage = 'Por favor, ingresa el horario de apertura del polideportivo.';
            isValid = false;
        } else if (!validateTime(horarioApertura)) {
            errorMessage = 'Por favor, ingresa un horario de apertura válido (formato HH:MM).';
            isValid = false;
        } else if (horarioCierre === '') {
            errorMessage = 'Por favor, ingresa el horario de cierre del polideportivo.';
            isValid = false;
        } else if (!validateTime(horarioCierre)) {
            errorMessage = 'Por favor, ingresa un horario de cierre válido (formato HH:MM).';
            isValid = false;
        } else if (compareTimes(horarioApertura, horarioCierre) >= 0) {
            errorMessage = 'El horario de apertura debe ser menor que el horario de cierre.';
            isValid = false;
        } else if (ciudad === '') {
            errorMessage = 'Por favor, ingresa la ciudad del polideportivo.';
            isValid = false;
        } else if (provincia === '') {
            errorMessage = 'Por favor, ingresa la provincia del polideportivo.';
            isValid = false;
        } else if (pais === '') {
            errorMessage = 'Por favor, ingresa el país del polideportivo.';
            isValid = false;
        } else if (telefono === '') {
            errorMessage = 'Por favor, ingresa el teléfono del polideportivo.';
            isValid = false;
        } else if (!validatePhone(telefono)) {
            errorMessage = 'Por favor, ingresa un número de teléfono válido (9 dígitos numéricos).';
            isValid = false;
        } else if (email === '') {
            errorMessage = 'Por favor, ingresa el email del polideportivo.';
            isValid = false;
        } else if (!validateEmail(email)) {
            errorMessage = 'Por favor, ingresa un correo electrónico válido.';
            isValid = false;
        }
    
        if (!isValid) {
            $('#mensajeError').text(errorMessage).show();
        } else {
            $('#mensajeError').hide();
        }
    
        return isValid;
    }
    
    // Validar formato de número de teléfono
    function validatePhone(phone) {
        var phonePattern = /^\d{9}$/; // Formato: 10 dígitos numéricos
        return phonePattern.test(phone);
    }
    
    // Validar formato de correo electrónico
    function validateEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Formato de correo electrónico básico
        return emailPattern.test(email);
    }

    function validateTime(time) {
        var timePattern = /^([01]\d|2[0-3]):([0-5]\d)$/; // Formato: HH:MM (24 horas)
        return timePattern.test(time);
    }

    function compareTimes(time1, time2) {
        var t1 = new Date('1970-01-01 ' + time1);
        var t2 = new Date('1970-01-01 ' + time2);
        return t1 - t2;
    }
    
});