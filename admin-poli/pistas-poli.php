<?php

require_once('../sessions/admin-poli-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir pistas | WeSports</title>
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
        <h3 class="title-user">Pistas</h3>
        <div class="header-username">
            <a href="profile-poli.php">
                <i class="fas fa-user-circle fa-2xl"></i>
            </a>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>
    <main class="main-pistas">
        <div>
            <h4>1º Polideportivo </h4>
            <select name="polideportivos" id="polideportivoSelect">
            </select>
        </div>
        <div id="pistasForm">
            <h4>2º Añadir pista</h4>
            <form class="registra-polideportivo">
                <div class="container-profile">
                    <h4 class="title-profile">
                        <i class="fa-solid fa-basketball fa-2xl icon-user"></i>
                        Añadir pista
                    </h4>
                    <p class="text-profile">Añade una pista al polideportivo elegido anteriormente.</p>
                    <hr class="line-div">
                </div>

                <div id="mensajeError" class="mensaje error"></div>
                <div id="mensajeSuccess" class="mensaje success"></div>

                <div>
                    <label for="nombre">Nombre de la pista</label>
                    <input type="text" name="nombre">
                </div>
                <div>
                    <label for="deportes">Deporte</label>
                    <select name="deportes" id="deporteSelect">
                    </select>
                </div>
                <div class="descripcion-pista">
                    <label for="descripcion">Descripión de la pista</label>
                    <textarea name="descripcion" id="descripcion" cols="20" rows="5"></textarea>
                </div>
                <div>
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['idUser']; ?>">
                    <input type="submit" class="btn btn-register" value="Añadir pista">
                </div>
            </form>
        </div>
        <input type="hidden" id="idUser" value="<?php echo $_SESSION['idUser']; ?>">
    </main>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/get-polideportivos-by-id.js"></script>
    <script src="../js/get-deportes.js"></script>
    <script src="../js/register-pista.js"></script>
</body>

</html>