<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="erlarrea" />
<title>Ark Games</title>
</head>

<body id="bodyTemp" class="row justify-content-center align-items-center">

  <main class="col-8">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="text-white" style="background-color:rgba(0,0,0,0.6);;border-radius: 1rem; ">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/img/logo.svg" alt="ArkGames" class="img-fluid p-5 my-5" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="?c=usuarios&a=validar" method="POST">
                  <h2 class="fw-bold mb-0 text-white text-center">Log In</h2>
                  <h5 class="fw-normal mb-4 pb-3 text-center">Ingresa usando tu usuario y contraseña</h5>

                  <div class="form-outline mb-4">
                    <input id="txtingreso" type="text" placeholder="Usuario" name="txtingreso" required class="form-control form-control-lg">
                  </div>

                  <div class="form-outline mb-4">
                    <input id="txtpassword" type="password" placeholder="Password" name="txtpassword" required class="form-control form-control-lg">
                  </div>

                  <div class="pt-1 mb-4 text-end">
                    <a class="btn btn-secondary btn-lg btn-block mx-3" href="index.php"> Cancelar </a>
                    <button class="btn btn-info btn-lg btn-block" type="submit"> Ingresar </button>
                  </div>

                  <?php
                  if (isset($_SESSION['notificar_pwd']) && $_SESSION['notificar_pwd'] == 1) {
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                      </svg>
                      <div>'
                      . $_SESSION['mensaje_pwd'] .
                      '</div>
                    </div>';
                    unset($_SESSION['notificar_pwd'], $_SESSION['mensaje_pwd']);
                  }
                  ?>


                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

</body>

</html>