<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="erlarrea" />
<!-- <link rel="stylesheet" href="assets/css/master.css" />
<link rel="stylesheet" href="assets/css/LarreaRafael.css" /> -->
<title>Ark Games</title>

</head>

<body id="bodyTemp">
  <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>
  <main>
    <div class="container py-1 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="assets/img/logo.svg" alt="ArkGames" class="img-fluid p-5 my-5" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form>
                    <h2 class="fw-bold mb-0 text-center">Log In</h2>
                    <h5 class="fw-normal mb-4 pb-3 text-center">Ingresa usando tu usuario y contraseña</h5>

                    <div class="form-outline mb-4">
                      <input id="email-ingreso" placeholder="Email" name="email" class="form-control form-control-lg">
                    </div>

                    <div class="form-outline mb-4">
                      <input id="password" type="password" placeholder="Password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  require_once VIEW_PATH . 'Templates/footerBootstrap.php'
  ?>
</body>

</html>