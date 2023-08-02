<?php

require_once('../sessions/admin-poli-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver reservas | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="body-user">
    <?php require_once('../view/sidebar.poli.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Reservas</h3>
        <div class="header-username">
            <a href="profile-poli.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-tabla">
        <div id="vacio">
            <img src="../img/no-data.png" alt="No data" class="no-data">
            <p>No tienes ninguna reserva.</p>
        </div>
        <table id="tablaReservasEstado">
            <thead>
                <tr>
                    <th>Polideportivo</th>
                    <th>Pista</th>
                    <th>Fecha de la reserva</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Estado</th>
                    <th colspan="2">Borrar reserva</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>

    <input type="hidden" value="<?php echo $_SESSION['idUser']; ?>" id="idUser">
    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/get-reservas-by-user.js"></script>
</body>

</html>