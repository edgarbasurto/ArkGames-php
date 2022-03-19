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
        <div class="row row-cols-1 row-cols-md-2 g-4 tile-container">
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_PRODUCTOS)) {
                echo '<div class="col-xl-3 col-md-6">
               
                    <a class="tile" href="?c=productos">
                    <div class="tile-tittle">Productos</div>
                    <div class="card-body text-center">
                            <div class="tile-icon">
                            <i class="fas fa-box-open fa-fw"></i>
                            </div>                     
                        </div>
                    </a>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_NOTICIAS)) {
                echo '<div class="col-xl-3 col-md-6">
                
                    <a class="tile" href="?c=noticias">
                    <div class="tile-tittle">Noticias</div>
                        <div class="card-body text-center">
                            <div class="tile-icon">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        </div>
                    </a>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SOPORTE)) {
                echo '<div class="col-xl-3 col-md-6">
               
                    <a class="tile" href="?c=soporte">
                    <div class="tile-tittle">Soporte</div>
                        <div class="card-body text-center">
                            <div class="tile-icon">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            
                        </div>
                    </a>
                
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SUSCRIP)) {
                echo '<div class="col-xl-3 col-md-6">
                <div class="card" style="width: 18rem;">
                    <a class="nav-link" href="?c=suscripcion">
                        <div class="card-body text-center">
                            <div>
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <p class="card-text">Suscripciones</p>
                        </div>
                    </a>
                </div>
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_CONTACTOS)) {
                echo '<div class="col-xl-3 col-md-6">
               
                    <a class="tile" href="?c=session&a=dash">
                    <div class="tile-tittle">Contactos</div>
                        <div class="card-body text-center">
                            <div class="tile-icon">
                                <i class="fa-solid fa-address-book"></i>
                            </div>
                            
                        </div>
                    </a>
            
            </div>';
            } ?>
            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_USUARIOS)) {
                echo '<div class="col-xl-3 col-md-6">
                
                    <a class="tile" href="?c=usuarios">
                    <div class="tile-tittle">Usuarios</div>
                        <div class="card-body text-center">
                            <div class="tile-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                           
                        </div>
                    </a>
              
            </div>
            ';
            } ?>

            <?php if (TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_SUSCRIP)) {
                echo '<div class="col-xl-3 col-md-6">
                
                    <a class="tile" href="?c=suscripcion">
                    <div class="tile-tittle">Suscripción</div>
                        <div class="card-body text-center">
                            <div class="tile-icon">
                            <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                           
                        </div>
                    </a>
              
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