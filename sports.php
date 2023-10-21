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

    <main class="main-sports">

        <section class="section-deportes">
            <div>
                <h4>Instalaciones deportivas</h4>
                <p>En nuestros centros, ofrecemos una variedad de pistas deportivas de alta calidad para alquilar. Nuestras instalaciones incluyen pistas de tenis, baloncesto, fútbol, etc... Cada pista está diseñada específicamente para garantizar una experiencia óptima en cada deporte. Puedes consultar las dimensiones y el estado de nuestras pistas en la siguiente lista:</p>
                <ul>
                    <li>Pistas de tenis: 23x10 metros, superficie de césped artificial y de tierra batida.</li>
                    <li>Pistas de baloncesto: 28x15 metros, suelo de parquet.</li>
                    <li>Pistas de fútbol: 40x20 metros, césped sintético y césped natural.</li>
                </ul>
            </div>
    
            <div class="img-deportes">
                <div>
                    <img src="img/tennis.webp" alt="">
                    <p>Pista de tenis</p>
                </div>
                <div>
                    <img src="img/basketball.webp" alt="">
                    <p>Pista de baloncesto</p>
                </div>
                <div>
                    <img src="img/football.webp" alt="">
                    <p>Pista de fútbol</p>
                </div>
            </div>
    
            <div class="sports-container">
                <div>
                    <h4>Tarifas y disponibilidad</h4>
                    <p>Nuestras tarifas de alquiler de pistas varían según la duración de la reserva. Puedes consultar nuestras tarifas actualizadas en nuestro sitio web y realizar la reserva en línea. Utiliza nuestro práctico calendario de disponibilidad para elegir la fecha y hora que mejor se adapte a tus necesidades.</p>
                </div>
                <div>
                    <h4>Servicios adicionales</h4>
                    <p>Además de las pistas deportivas, ofrecemos servicios adicionales para hacer de tu experiencia deportiva algo completo. Contamos con vestuarios modernos y bien equipados y duchas con agua caliente.</p>
                </div>
            </div>
    
            <div class="tarifas">
                <img src="img/price.webp" alt="">
            </div>
    
            <div class="normas">
                <h4>Reglas y normas</h4>
                <p>Para garantizar la seguridad y el buen uso de nuestras instalaciones, es importante seguir algunas reglas. Te pedimos que utilices calzado deportivo adecuado, evites el consumo de alcohol y tabaco en las instalaciones, y respetes el tiempo de juego asignado a cada reserva. Consulta nuestras reglas completas en la sección correspondiente de nuestro sitio web.</p>
            </div>
        </section>

    </main>

    <?php require_once('view/footer.view.php'); ?>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
</body>

</html>