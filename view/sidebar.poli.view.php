<div class="sidebar" id="sidebar">
    <a class="logo no-margin" href="menu-poli.php">
        <img src="../img/favicon.ico" alt="Logo" class="logo-sidebar">
        <img src="../img/text-logo.png" alt="Text-Logo" class="text-logo">
    </a>
    <ul>
        <li>
            <a href="menu-poli.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'menu-poli.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li>
            <a href="polideportivos.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'polideportivos.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-building"></i>
                <span>Polideportivos</span>
            </a>
        </li>
        <li>
            <a href="pistas-poli.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'pistas-poli.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-basketball"></i>
                <span>Pistas</span>
            </a>
        </li>
        <li>
            <a href="reservas-poli.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'reservas-poli.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Reservas</span>
            </a>
        </li>
        <li>
            <a href="pagos-poli.php" class="sidebar-enlace <?php if (basename($_SERVER['PHP_SELF']) == 'pagos-poli.php') echo 'sidebar-active'; ?>">
            <i class="fa-solid fa-cart-shopping"></i>
                <span>Pagos</span>
            </a>
        </li>
        <li>
            <a href="profile-poli.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'profile-poli.php') echo 'sidebar-active'; ?>">
                <i class="fa-solid fa-user"></i>
                <span>Perfil</span>
            </a>
        </li>
        <li>
            <a href="contact-poli.php" class="sidebar-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'contact-poli.php') echo 'sidebar-active'; ?>">
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
