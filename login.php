<?php

require_once('sessions/index-session.php');

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | WeSports</title>
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
<body class="body-login">
    <main class="login-container">

        <div id="mensajeError" class="mensaje error"></div>
        <img src="img/logo-blue.png" alt="Logo">
        <h4 class="welcome">¡Bienvenido/a!</h4>

        <form id="loginForm" class="login-form">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Contraseña</label>
            <div class="input-icon">
                <input type="password" name="password" id="password">
                <i class="fa-regular fa-eye" id="showPassword"></i>
            </div>

            <div class="btn-container">
                <button class="btn btn-login">Iniciar sesión</button>
                <button class="btn btn-register" type="button" id="registerUser">Registrar nueva cuenta</button>
            </div>
        </form>

        <script src="js/consts.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/login.js"></script>
    </main>
</body>
</html>