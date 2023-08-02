<?php

require_once('../sessions/admin-poli-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar polideportivo | WeSports</title>
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
        <h3 class="title-user">Centros</h3>
        <div class="header-username">
            <a href="profile-poli.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-profile">

        <form class="registra-polideportivo">
            <div class="container-profile">
                <h4 class="title-profile">
                    <i class="fa-solid fa-building-circle-check fa-2xl icon-user"></i>
                    Registrar polideportivo
                </h4>
                <p class="text-profile">Registra un nuevo polideportivo introduciendo sus datos más relevantes.</p>
                <hr class="line-div">
            </div>

            <div id="mensajeError" class="mensaje error"></div>
            <div id="mensajeSuccess" class="mensaje success"></div>

            <div>
                <label for="nombre">Nombre del polideportivo</label>
                <input type="text" name="nombre">
            </div>

            <div>
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion">
            </div>

            <div>
                <label for="horario_apertura">Horario de apertura</label>
                <input type="time" name="horario_apertura" step="1800">
            </div>

            <div>
                <label for="horario_cierre">Horario de cierre</label>
                <input type="time" name="horario_cierre" step="1800">
            </div>

            <div>
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad">
            </div>

            <div>
                <label for="provincia">Provincia</label>
                <input type="text" name="provincia">
            </div>

            <div>
                <label for="pais">País</label>
                <input type="text" name="pais">
            </div>

            <div>
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>

            <div>
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['idUser']; ?>">
                <input type="submit" class="btn btn-register" value="Registrar polideportivo">
            </div>
        </form>

    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/register-polideportivo.js"></script>
</body>

</html>