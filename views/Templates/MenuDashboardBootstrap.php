<?php

require_once  CONTROLLER_PATH . 'Genericos.php';
$tmp = getSessionActual();
?>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <!-- <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a> -->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="assets/img/logo-icon-text.svg" alt="ArkGames" height="35" class="d-inline-block align-text-top" />
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block  ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>

        <!-- 
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> 
    -->
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header fw-bold"><?php echo $tmp->NombreCompleto; ?></h6>
                    <?php if (TIENE_PERMISO(PERMISOS::PUEDE_CAMBIAR_PASSWORD)) {

                        echo '     
                    <li><a class="dropdown-item" href="index.php?c=usuarios&a=changepwd">Cambiar Contraseña</a></li>
                  ';
                    } ?>

                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="index.php?c=session&a=end">Cerrar Sessión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Administración</div>
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                            Mis Ordenes
                        </a>
                        <a class="nav-link" href="?c=orden">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shop"></i></div>
                            Ventas
                        </a>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS)) {
                            echo ' ';
                        } ?>

                        <div class="sb-sidenav-menu-heading">Mantenimiento</div>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS)) {
                            echo ' <a class="nav-link" href="?c=productos">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-open fa-fw"></i></div>
                            Productos
                        </a>';
                        } ?>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_NOTICIAS)) {
                            echo '<a class="nav-link" href="?c=noticias">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                            Noticias
                        </a>';
                        } ?>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SUSCRIP)) {
                            echo '<a class="nav-link" href="?c=suscripcion">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                            Suscripciones
                        </a>';
                        } ?>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SOPORTE)) {
                            echo '<a class="nav-link" href="?c=soporte">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            Soporte
                        </a>';
                        } ?>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_CONTACTOS)) {
                            echo '<a class="nav-link" href="?c=empleo">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                            Empleo
                        </a>';
                        } ?>
                        <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
                            echo '
                        <div class="sb-sidenav-menu-heading">Configuraciones</div>
                        <a class="nav-link" href="?c=usuarios">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Usuarios
                        </a>';
                        } ?>

                        <div class="sb-sidenav-menu-heading">Página Principal</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Home
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer text-center">
                    <div class="fw-bold">
                        <?php
                        echo $tmp->NombreCompleto;
                        ?>
                    </div>
                    <div class="small"><?php echo $tmp->NombrePerfil; ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">