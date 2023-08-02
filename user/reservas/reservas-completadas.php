<?php

require_once('../../sessions/user-reservas-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas completadas | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="../../css/normalize.css" as="style">
    <link rel="stylesheet" href="../../css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="../../css/style.css" as="style">
    <link rel="stylesheet" href="../../css/style.css">

    <script src="https://kit.fontawesome.com/25b05177f9.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
</head>

<body class="body-user">
    <?php require_once('../../view/sidebar-reservas.view.php'); ?>

    <input type="hidden" id="idUser" value="<?php echo $_SESSION['idUser']; ?>">
    <input type="hidden" id="estado" value="completada">

    <div class="header-in">
        <h3 class="title-user">Completadas</h3>
        <div class="header-username">
            <a href="../profile-user.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-tabla">
        <div id="vacio">
            <img src="../../img/no-data.png" alt="No data" class="no-data">
            <p>No tienes ninguna reserva completada.</p>
        </div>
        <table id="tablaReservasEstado">
            <thead>
                <tr>
                    <th>Polideportivo</th>
                    <th>Pista</th>
                    <th>Fecha de la reserva</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th colspan="2">Archivar reserva</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>

    <div class="container-register">
        <button class="btn btn-back" type="button" onclick="window.location.href = '../reservas.php'"><i class="fa-solid fa-arrow-left fa-xs"></i>Volver</button>
    </div>

    <script src="../../js/consts.js"></script>
    <script src="../../js/functions.js"></script>
    <script src="../../js/get-reservas-user-estado.js"></script>
</body>

</html>