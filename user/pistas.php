<?php

require_once('../sessions/user-session.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistas | WeSports</title>
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
    <?php require_once('../view/sidebar.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Pistas</h3>
        <div class="header-username">
            <a href="profile-user.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>
    <main class="main-pistas" id="mainPistas">

        <div class="timeline">
            <div class="outer">

                <div id="polideportivosContainer">
                    <h4 class="title-paso">1º Polideportivos:</h4>
                    <div id="polideportivoContainer" class="polideportivo-container">
                    </div>
                </div>

                <div id="pistasContainer">
                    <h4 class="title-paso">2º Pistas:</h4>
                    <div id="pistaContainer" class="pista-container">
                    </div>
                </div>

                <div id="fechaHoraContainer">
                    <h4 class="title-paso">3º Fecha y hora:</h4>

                    <div id="mensajeError" class="mensaje error"></div>
                    <div id="mensajeSuccess" class="mensaje success"></div>

                    <form id="reservaForm" class="reserva-form">

                        <input type="hidden" id="idUser" value="<?php echo $_SESSION['idUser']; ?>">

                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" min="<?php echo date('Y-m-d'); ?>" required><br>

                        <label for="horaInicio">Hora de inicio:</label>
                        <input type="time" id="horaInicio" step="1800" required><br>

                        <label for="horaFin">Hora de fin:</label>
                        <input type="time" id="horaFin" step="1800" required><br>

                        <p class="info-reserva">*Elige las horas dentro del horario del polideportivo elegido.</p>

                        <input type="submit" class="btn btn-register" value="Comprobar horario">
                    </form>

                    <div id="loader" class="loader"></div>
                </div>

                <div id="resumenContainer">
                    <h4 class="title-paso">Resumen de la reserva:</h4>
                    <div id="resumenReserva" class="resumen-reserva">
                    </div>

                    <button id="reservaButton" class="btn btn-register">Confirmar reserva</button>
                    <div id="loader1" class="loader"></div>
                </div>

            </div>
        </div>

        <div id="finContainer">
            <p id="infoFin"></p>
            <div id="mensajeError" class="mensaje error"></div>
            <div id="mensajeSuccess" class="mensaje success"></div>
            <button class="btn btn-register" id="finReserva">Aceptar</button>
        </div>

    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/get-pistas-disponibles.js"></script>
</body>

</html>