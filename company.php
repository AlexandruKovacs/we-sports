<?php

require_once('sessions/index-session.php');

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeSports | Alquila y reserva pistas deportivas</title>
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
<body>
    <?php require_once('view/header.view.php'); ?>

    <main>
        <div class="text-container">
            <h1 class="title">¡Descubre una nueva forma de destacar tu polideportivo!</h1>
            <p>No importa si tienes un polideportivo pequeño o uno de gran envergadura, nosotros estamos aquí para ayudarte. Nuestro objetivo es proporcionarte las herramientas necesarias para que puedas destacar entre la competencia y atraer a más clientes.</p>
            <button class="btn btn-body" id="registerAdmin">Trabaja con nosotros</button>
        </div>
        <div class="img-container">
                <img src="img/court.webp" alt="court">
        </div>
    </main>

    <?php require_once('view/footer.view.php'); ?>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>