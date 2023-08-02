<?php

require_once('../sessions/admin-session.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="../image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="body-user">
    <?php require_once('../view/sidebar.admin.view.php'); ?>

    <div class="header-in">
        <h3 class="title-user">Usuarios</h3>
        <div class="header-username">
            <i class="fa-solid fa-user-circle fa-2xl"></i>
            <p><?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <main class="main-profile">
        <form id="profileForm" class="update-user-form">
            <div class="container-profile">
                <h4 class="title-profile">
                    <i class="fa-solid fa-user fa-2xl icon-user"></i> 
                    Editar usuario
                </h4>
                <p class="text-profile">Modifica los datos relacionados con el perfil seleccionado.</p>
            </div>

            <hr class="line-div">

            <div id="mensajeError" class="mensaje error"></div>
            <div id="mensajeSuccess" class="mensaje success"></div>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre">

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" readonly>

            <label for="username">Nombre de usuario</label>
            <input type="text" id="username" name="username">

            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono">

            <div class="btn-container">
                <button type="submit" class="btn btn-register">Actualizar datos</button>
            </div>
        </form>
    </main>

    <input type="hidden" id="idUser" value="<?php echo $_GET['userId']; ?>">

    <div class="btn-container-reservas">
        <button class="btn btn-back" type="button" onclick="window.location.href = 'usuarios-admin.php'"><i class="fa-solid fa-arrow-left fa-xs"></i>Volver</button>
    </div>

    <script src="../js/consts.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/edit-usuario.js"></script>
</body>

</html>