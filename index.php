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
    <?php require_once('server/update-estados.php'); ?>
    <?php require_once('view/header.view.php'); ?>

    <main>
        <div class="img-container">
            <img src="img/main.webp" alt="main">
        </div>
        <div class="text-container">
            <h1 class="title">Prepárate para tomar la pista</h1>
            <p>En nuestros centros deportivos, te ofrecemos la oportunidad de disfrutar de instalaciones modernas y seguras, diseñadas específicamente para brindarte una experiencia deportiva inigualable.</p>
            <button class="btn btn-body" id="registerUser">Empieza ya</button>
        </div>
    </main>

    <div class="info-container">
        <div class="info-text-container">
            <h1 class="title">Te ayudamos a buscar la mejor opción</h1>
            <p>Nuestras pistas están cuidadosamente mantenidas y cuentan con las últimas tecnologías para garantizar un rendimiento óptimo. Ya sea que practiques fútbol, tenis, baloncesto u otros deportes, nuestras pistas están diseñadas para satisfacer las necesidades de los atletas de todos los niveles.</p>
            <button class="btn btn-black" id="registerUser">Empieza ya</button>
        </div>
        <div class="box-container">
            <div class="info-box">
                <p><i class="fa-solid fa-house fa-2xl"></i></p>
                <p>+15</p>
                <p class="info-text">Centros deportivos</p>
            </div>
            <div class="info-box">
                <p><i class="fa-regular fa-face-smile fa-2xl"></i></p>
                <p>+250</p>
                <p class="info-text">Clientes satisfechos</p>
            </div>
            <div class="info-box">
                <p><i class="fa-solid fa-calendar-days fa-2xl"></i></p>
                <p>+3500</p>
                <p class="info-text">Reservas</p>
            </div>
            <div class="info-box">
                <p><i class="fa-solid fa-trophy fa-2xl"></i></p>
                <p>+1200</p>
                <p class="info-text">Actividades organizadas</p>
            </div>
        </div>
    </div>

    <?php require_once('view/footer.view.php'); ?>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>