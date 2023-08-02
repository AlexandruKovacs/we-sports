<?php

require_once('../sessions/user-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas | WeSports</title>
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
        <h3 class="title-user">Reservas</h3>
        <div class="header-username">
            <a href="profile-user.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-reserva">
        <div class="opt-reserva" id="reservasActivas">
            <div class="icon-reserva">
                <i class="fa-solid fa-calendar-day fa-xl"></i>
            </div>
            <div class="text-reserva">
                <h4>Activas</h4>
                <p>Consulta tus reservas activas. Disfruta de tu deporte favorito con tus amigos y familiares en nuestras instalaciones deportivas.</p>
            </div>
        </div>
        <div class="opt-reserva" id="reservasCanceladas">
            <div class="icon-reserva">
                <i class="fa-solid fa-calendar-xmark fa-xl"></i>
            </div>
            <div class="text-reserva">
                <h4>Canceladas</h4>
                <p>Tus reservas anteriores han sido canceladas. Puedes volver a programar tus juegos y seguir disfrutando de la competencia.</p>
            </div>
        </div>
        <div class="opt-reserva" id="reservasCompletadas">
            <div class="icon-reserva">
                <i class="fa-solid fa-calendar-check fa-xl"></i>
            </div>
            <div class="text-reserva">
                <h4>Completadas</h4>
                <p>Reservas de pistas deportivas completadas. Esperamos que hayas tenido un gran tiempo practicando tu deporte favorito.</p>
            </div>
        </div>
    </main>

    <div class="container-register">
        <button class="btn btn-register" type="button" id="registerReserva">Crear nueva reserva</button>
    </div>
    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
</body>

</html>