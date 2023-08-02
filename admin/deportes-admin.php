<?php

require_once('../sessions/admin-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar deportes | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="../image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="body-user">
    <?php require_once('../view/sidebar.admin.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Deportes</h3>
        <div class="header-username">
            <i class="fa-solid fa-user-circle fa-2xl"></i>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-profile">
        <form class="registra-polideportivo">
            <div class="container-profile">
                <h4 class="title-profile">
                    <i class="fa-solid fa-basketball fa-2xl icon-user"></i>
                    Añadir deporte
                </h4>
                <p class="text-profile">Añade un deporte nuevo para futuras reservas.</p>
                <hr class="line-div">
            </div>

            <div id="mensajeError" class="mensaje error"></div>
            <div id="mensajeSuccess" class="mensaje success"></div>

            <div>
                <label for="nombre">Nombre del deporte</label>
                <input type="text" name="nombre">
            </div>
            <div>
                <label for="icono">Icono</label>
                <select name="deportes" id="iconoSelect">
                    <option value=""></option>
                    <option value="fa-futbol">Futbol</option>
                    <option value="fa-basketball">Baloncesto</option>
                    <option value="fa-table-tennis-paddle-ball">Tenis</option>
                    <option value="fa-swimmer">Natación</option>
                    <option value="fa-running">Atletismo</option>
                    <option value="fa-table-tennis-paddle-ball">Pádel</option>
                    <option value="fa-volleyball-ball">Voleibol</option>
                    <option value="fa-hockey-puck">Hockey</option>
                    <option value="fa-baseball">Baseball</option>
                    <option value="fa-football-ball">Fútbol americano</option>
                    <option value="fa-golf-ball">Golf</option>
                    <option value="fa-skating">Patinaje</option>
                    <option value="fa-skiing">Esquí</option>
                    <option value="fa-snowboarding">Snowboard</option>
                    <option value="fa-skating">Patinaje</option>
                    <option value="fa-bowling-ball">Bolos</option>
                </select>
            </div>
            <div>
                <input type="submit" class="btn btn-register" value="Añadir deporte">
            </div>
        </form>

    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/register-deporte.js"></script>
</body>

</html>