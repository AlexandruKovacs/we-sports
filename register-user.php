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

        <h4>¡Bienvenido/a! Vamos a crear tu perfil</h4>
        <p>Necesitamos que nos indiques unos datos antes de empezar.</p>

        <div id="mensajeError" class="mensaje error"></div>
        <div id="mensajeSuccess" class="mensaje success"></div>

        <form id="registerUserForm" class="register-user-form">

            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" id="newUsername">

            <label for="name">Nombre</label>
            <input type="text" name="nombre" id="newName">

            <label for="surname">Apellidos</label>
            <input type="text" name="surname" id="newSurname">

            <p>Al completar mis datos acepto la <a href="legal/privacy-policy.php">Política de privacidad</a>.</p>
            <div class="terms-container">
                <input type="checkbox"><p>Acepto los <a href="legal/terms-conditions.php">Términos y Condiciones</a>.</p>
            </div>

            <div class="btn-container">
                <button class="btn btn-back" type="button" id="btnBack"><i class="fa-solid fa-arrow-left fa-xs"></i>Volver</button>
                <button class="btn btn-next">Siguiente paso</button>
            </div>

        </form>

    </main>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/register-user.js"></script>
</body>
</html>