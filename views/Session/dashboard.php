<?php

require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="" />
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Bienvenido</li>
        </ol>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=productos">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>
                            <p class="card-text">Productos</p>
                        </div>
                    </a>
                </div>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_NOTICIAS)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=session&a=dash">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <p class="card-text">Noticias</p>
                        </div>
                    </a>
                </div>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SOPORTE)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=session&a=dash">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <p class="card-text">Soporte</p>
                        </div>
                    </a>
                </div>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_NOTICIAS)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=session&a=dash">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                            <p class="card-text">Contactos</p>
                        </div>
                    </a>
                </div>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=usuarios">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <p class="card-text">Usuarios</p>
                        </div>
                    </a>
                </div>
            </div>
            ';
            } ?>
        </div>
    </div>
</main>
<?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>
<script>

</script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>