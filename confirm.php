<?php

    require_once('sessions/index-session.php');
    require('config/we_sports_connection.php');
    require('server/confirm-account.php');

    $token = $_GET['token'];
    $response = '';

    $sql = "SELECT * FROM usuarios WHERE token = '$token'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $response = confirmAccount($mysqli, $token);
    } else {
        $response = '<div class="mensaje error" style="display: block;"><i class="fa-solid fa-circle-exclamation"></i>Token inválido. No se encontró ninguna cuenta asociada.</div>';
    }

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar cuenta | WeSports</title>
    <meta name="description" content="Reserva y alquiler de pistas deportivas">

    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="https://fonts.cdnfonts.com/css/sf-pro-display" crossorigin="crossorigin" as="font">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <main class="confirm-container">
        <img src="img/logo-blue.png" alt="Logo">
        <?php echo $response; ?>
    </main>

    <script src="js/consts.js"></script>
    <script src="js/functions.js"></script>
</body>

</html>