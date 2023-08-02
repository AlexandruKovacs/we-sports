<?php

session_start();

if (isset($_SESSION['idUser'])) {
    if ($_SESSION['tipo_usuario'] === 'admin_polideportivo') {
        header('Location: ../admin-poli/menu-poli.php');
    } else if ($_SESSION['tipo_usuario'] === 'cliente') {
        header('Location: ../user/menu-user.php');
    }
} else {
    header('Location: ../index.php');
}

?>