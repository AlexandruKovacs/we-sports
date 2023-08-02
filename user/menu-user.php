<?php

require_once('../sessions/user-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

</head>

<body class="body-user">
    <?php require_once('../view/sidebar.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Inicio</h3>
        <div class="header-username">
            <a href="profile-user.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-user">
        <section class="item-a">
            <h3>👋 ¡Hola <span class="username-multi"><?php echo $_SESSION['nombre']; ?></span>, disfruta del deporte con WeSports!</h3>
            <p>Ofrecemos un proceso de reserva fácil y conveniente, para que puedas asegurar tu tiempo en la pista y disfrutar de tus actividades deportivas favoritas. Explora nuestras opciones de pistas, verifica la disponibilidad y realiza tu reserva en línea.</p>
        </section>

        <section class="item-b" id="btnReserva">
            <div class="img-reserva"></div>
            <div class="text-reserva">
                <h4>📆 Consulta tus reservas</h4>
                <p>Utiliza nuestro sistema de filtrado de reservas. Podrás ver todas tus reservas según el estado en el que se encuentren.</p>
            </div>
        </section>

        <section class="item-c" id="btnPista">
            <div class="img-pista"></div>
            <div class="text-pista">
                <h4>🎾 Reserva una pista</h4>
                <p>Visita nuestra página de pistas para obtener más información sobre cada una de ellas.</p>
            </div>
        </section>

        <section class="item-d" id="btnPerfil">
            <div class="img-perfil"></div>
            <div class="text-pista">
                <h4>📋 Edita tu perfil</h4>
                <p>Accede a la sección del usuario para poder modificar tus datos o añadir tu número de teléfono.</p>
            </div>
        </section>

    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
</body>

</html>