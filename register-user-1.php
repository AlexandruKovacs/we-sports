<?php

require_once('sessions/index-session.php');

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

</head>

<body class="body-register">
    <main class="register-container">
        <img src="img/logo-blue.png" alt="Logo">

        <div id="mensajeSuccess" class="mensaje success"></div>

        <div id="formContainer">

            <h4>Elige tus credenciales</h4>
            <p>Indícanos tu nombre de usuario y tu contraseña para acceder al sitio.</p>

            <div id="mensajeError" class="mensaje error"></div>

            <form id="registerUserForm1" class="register-user-form">

                <label for="email">Indícanos tu email</label>
                <input type="text" name="email" id="newEmail">

                <label for="password">Contraseña</label>
                <div class="input-icon">
                    <input type="password" name="password" id="newPassword">
                    <i class="fa-regular fa-eye" id="showNewPassword"></i>
                </div>

                <label for="password2">Confirmar contraseña</label>
                <div class="input-icon">
                    <input type="password" name="password2" id="newPassword2">
                    <i class="fa-regular fa-eye" id="showNewPassword2"></i>
                </div>

                <div class="btn-container">
                    <button class="btn-back" type="button" id="btnBack"><i class="fa-solid fa-arrow-left fa-xs"></i>Volver</button>
                    <button class="btn-next" id="submitButton">Finalizar registro</button>
                </div>

                <div id="loader" class="loader"></div>

            </form>
        </div>
    </main>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/register-user-1.js"></script>
</body>

</html>