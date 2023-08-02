<?php

require_once('../sessions/admin-poli-session.php');

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
    <?php require_once('../view/sidebar.poli.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Inicio</h3>
        <div class="header-username">
            <a href="profile-poli.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-user">
        <section class="item-a">
            <h3>👋 ¡Hola <span class="username-multi"><?php echo $_SESSION['nombre']; ?></span>, saca el máximo provecho con WeSports!</h3>
            <p>Ofrecemos un proceso de registro de polideportivos fácil y conveniente, con el fin de dar a conocer tu centro entre nuestros cliente. Añade pistas, completa tu perfil y empieza a maximizar tus beneficios.</p>
        </section>

        <section class="item-c" id="btnPolideportivo">
            <div class="img-polideportivo"></div>
            <div class="text-reserva">
                <h4>🏠 Registra un centro deportivo</h4>
                <p>Utiliza nuestro sistema de registro de polideportivos para empezar a recibir reservas.</p>
            </div>
        </section>

        <section class="item-b" id="btnRegistraPista">
            <div class="img-registra-pista"></div>
            <div class="text-pista">
                <h4>🏀 Añade las pistas de un centro</h4>
                <p>Visita nuestra página de pistas para vincularlas con su correspondiente centro deportivo.</p>
            </div>
        </section>

        <section class="item-d" id="btnVerReservas">
            <div class="img-ver-reservas"></div>
            <div class="text-pista">
                <h4>📅 Ver reservas de los centros</h4>
                <p>Consulta fácilmente todas las reservas que se han realizado en tus centros deportivos.</p>
            </div>
        </section>

    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
</body>

</html>