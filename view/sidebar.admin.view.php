<div class="sidebar" id="sidebar">
    <a class="logo no-margin" href="usuarios-admin.php">
        <img src="../img/favicon.ico" alt="Logo" class="logo-sidebar">
        <img src="../img/text-logo.png" alt="Text-Logo" class="text-logo">
    </a>
    <ul>
        <li>
            <a href="usuarios-admin.php" class="sidebar-enlace <?php if (basename($_SERVER['PHP_SELF']) == 'usuarios-admin.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-users"></i>
                <span>Usuarios</span>
            </a>
        </li>
        <li>
            <a href="polideportivos-admin.php" class="sidebar-enlace <?php if (basename($_SERVER['PHP_SELF']) == 'polideportivos-admin.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-building"></i>
                <span>Polideportivos</span>
            </a>
        </li>
        <li>
            <a href="pistas-admin.php" class="sidebar-enlace <?php if (basename($_SERVER['PHP_SELF']) == 'pistas-admin.php') echo 'sidebar-active'; ?>">
                <i class="fa-sharp fa-solid fa-medal"></i>
                <span>Pistas</span>
            </a>
        </li>
        <li>
            <a href="deportes-admin.php" class="sidebar-enlace <?php if (basename($_SERVER['PHP_SELF']) == 'deportes-admin.php') echo 'sidebar-active'; ?>">
            <i class="fa-solid fa-basketball"></i>
                <span>Deportes</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-bottom">
        <a href="../server/logout-user.php" class="cerrar-sesion">
            <i class="fa-solid fa-power-off"></i>
            <span>Salir</span>
        </a>
    </div>
</div>