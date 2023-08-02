<div class="sidebar" id="sidebar">
    <a class="logo no-margin" href="menu-user.php">
        <img src="../img/favicon.ico" alt="Logo" class="logo-sidebar">
        <img src="../img/text-logo.png" alt="Text-Logo" class="text-logo">
    </a>
    <ul>
        <li>
            <a href="../user/menu-user.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'menu-user.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li>
            <a href="../user/pistas.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'pistas.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-basketball"></i>
                <span>Pistas</span>
            </a>
        </li>
        <li>
            <a href="../user/reservas.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'reservas.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Reservas</span>
            </a>
        </li>
        <li>
            <a href="../user/profile-user.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'profile-user.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-user"></i>
                <span>Perfil</span>
            </a>
        </li>
        <li>
            <a href="../user/contact-user.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'contact-user.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-envelope"></i>
                <span>Contacto</span>
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
