<header class="header">
    <div class="barra">
        <a class="logo no-margin centrar-texto" href="index.php">
            <img src="img/logo-blue.png" alt="Logo">
        </a>

        <nav class="nav">
            <a href="index.php" class="nav-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">Inicio</a>
            <a href="company.php" class="nav-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'company.php') echo 'active'; ?>">¿Eres una empresa?</a>
            <a href="sports.php" class="nav-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'sports.php') echo 'active'; ?>">Deportes</a>
            <a href="contact.php" class="nav-enlace <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active'; ?>">Contacto</a>
        </nav>

        <div class="menu_buttons">
            <button class="btn btn-black" id="loginUser">Inicia sesión</button>
            <button class="btn btn-grad" id="registerUser">Empieza ya</button>
        </div>
    </div>
</header>
