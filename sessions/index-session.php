<?php

session_start();

if (isset($_SESSION['idUser']) && ($_SESSION['tipo_usuario'] === 'admin')) {
    header('Location: admin/usuarios-admin.php');
} else if (isset($_SESSION['idUser']) && ($_SESSION['tipo_usuario'] === 'admin_polideportivo')) {
    header('Location: admin-poli/menu-poli.php');
} else if (isset($_SESSION['idUser']) && ($_SESSION['tipo_usuario'] === 'cliente')) {
    header('Location: user/menu-user.php');
}

?>