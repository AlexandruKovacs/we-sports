<?php

session_start();

if (isset($_SESSION['idUser'])) {
    if ($_SESSION['tipo_usuario'] === 'admin') {
        header('Location: ../admin/usuarios-admin.php');
    } else if ($_SESSION['tipo_usuario'] === 'cliente') {
        header('Location: ../user/menu-user.php');
    }
} else {
    header('Location: ../index.php');
}

?>