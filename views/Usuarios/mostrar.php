  <!DOCTYPE html>
  <html lang="es">

  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content=" " />
      <meta name="keywords" content=" " />
      <link rel="shortcut icon" href="../../assets/img/logo.svg">

      <link rel="stylesheet" href="../../assets/css/master2.css" />
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <!-- fontawesome iconos -->
      <script src="https://kit.fontawesome.com/2008d37923.js" crossorigin="anonymous"></script>
      <title>Demostración Métodos CRUD - USUARIO</title>

  </head>

  <body>
      <!-------------------------------------------------Menu---------------------------------------->
      <?php
        include_once '../Templates/menu.php'
        ?>
      <!------------------------------------------------------------------------------------------>
      <main class="contenedor" style="margin: 150px 80px 10px 80px">

          <div class="card">
              <div class="card-header row font-weight-bold align-middle">
                  <div class="col text-first">
                      <h4 class="fw-bold" style="margin-top:.5rem">ID#<?php echo $registro->Id . " - " .  $registro->NombreCompleto ?> </h4>
                  </div>
                  <div class="col text-end">
                      <a href="" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash-alt"></i> Eliminar</button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="container" style="margin: 0px 80px 0px 80px">
                      <div class="row">
                          <div class="col">
                              <h5 class="fw-bold">Usuario</h5>
                              <p><?php echo $registro->NickName ?></p>
                          </div>
                          <div class="col">
                              <h5 class="fw-bold">Email</h5>
                              <p><?php echo $registro->Email ?></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <h5 class="fw-bold">Nacimiento</h5>
                              <p><?php
                                    $date  = date_create($registro->FechaNacimiento);
                                    echo date_format($date, "d/m/Y");
                                    ?></p>
                          </div>
                          <div class="col">
                              <h5 class="fw-bold">Genero</h5>
                              <p><?php echo Genero::getName($registro->Genero) ?></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <h5 class="fw-bold">Perfil</h5>
                              <p><?php echo TipoRol::getName($registro->IdRol) ?></p>
                          </div>

                          <div class="col">
                              <h5 class="fw-bold">Servidor</h5>
                              <p><?php echo Servidores::getName($registro->IdServidor) ?></p>
                          </div>
                      </div>
                  </div>
                  <div class="text-end">
                      <a href="../../views/Usuarios/" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                  </div>
              </div>
          </div>

      </main>


      <!-- Modal -->
      <div class="modal fade" id="deleteConfirm" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <i class="fa-solid fa-circle-info"></i>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body fw-bold align-middle text-center">

                      <h3>Desea Eliminar?</h3>
                      <h5>ID#<?php echo $registro->Id . " - " .  $registro->NombreCompleto ?> </h5>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
                      <a href="../../views/Usuarios/index.php?userm=del&id=<?php echo $registro->Id ?>" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i> Si</a>
                  </div>
              </div>
          </div>
      </div>
      <!-------------------------------------------------Footer---------------------------------------->
      <?php
        include_once '../Templates/footer.php'
        ?>
      <!------------------------------------------------------------------------------------------>
  </body>

  </html>