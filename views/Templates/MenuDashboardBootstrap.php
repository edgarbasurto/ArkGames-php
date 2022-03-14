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
                        <div class="sb-sidenav-menu-heading">Mantenimiento</div>
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                            Productos
                        </a>
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                            Noticias
                        </a>
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            Soporte
                        </a>
                        <a class="nav-link" href="?c=session&a=dash">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                            Contactos
                        </a>
                        <div class="sb-sidenav-menu-heading">Configuraciones</div>
                        <a class="nav-link" href="?c=usuarios">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Usuarios
                        </a>
                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer text-center">
                    <div class="fw-bold">Usuario</div>
                    <div class="small">Perfil</div>
                </div> -->
            </nav>
        </div>
        <div id="layoutSidenav_content">