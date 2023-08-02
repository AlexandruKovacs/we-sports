<?php

require_once('sessions/index-session.php');

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeSports | Alquila y reserva pistas deportivas</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <?php require_once('view/header.view.php'); ?>
    <input type="hidden" value="./server/contact-mail.php" id="urlPHP">

    <main class="main-contacto-1">
        <?php require_once('view/contact-form.view.php'); ?>
    </main>

    <?php require_once('view/footer.view.php'); ?>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/contact.js"></script>
</body>
</html>