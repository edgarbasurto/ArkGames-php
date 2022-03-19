<?php
require_once DTO_PATH . 'Enumeradores.php';
require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="erlarrea" />
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
<main>
  <div class="container-fluid px-4 my-2">
    <div class="card mb-4 ">
      <div class="card-header font-weight-bold text-primary align-middle">
        <div class="row">
          <div class="col text-first">
            <h4 class="fw-bold" style="margin-top:.5rem">ID#<?php echo $registro->Id . " - " .  $registro->NombreCompleto ?> </h4>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form class="row g-3 needs-validation" action=" <?php echo "?c=usuarios&a=savepwd&id=" . $registro->Id ?>" method="POST" novalidate style="margin: 0px 80px 0px 80px">
          <div class="col-md-12">
            <label for="txtPasswordAnt" class="form-label">Contraseña Anterior</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="txtPasswordAntGroup"><i class="fa-solid fa-key"></i></span>
              <input type="password" maxlength="8" name="PasswordAnt" pattern="(?=.*[-!#$%&/()?¡_])(?=.*[A-Z])(?=.*[a-z]).{8,}" class="form-control" id="txtPasswordAnt" aria-describedby="txtPasswordAntGroup msjValidacion_PasswordAnt" required>
              <div id="msjValidacion_PasswordAnt" class="invalid-feedback">
                Valor incorrecto! </br>Requiere 8 carácteres entre 1 letra minúscula, 1 letra mayúscula, y 1 símbolo.
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <label for="txtPassword1" class="form-label">Contraseña Nueva</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="txtPassword1Group"><i class="fa-solid fa-key"></i></span>
              <input type="password" maxlength="8" name="Password" pattern="(?=.*[-!#$%&/()?¡_])(?=.*[A-Z])(?=.*[a-z]).{8,}" class="form-control" id="txtPassword1" aria-describedby="txtPassword1Group msjValidacion_Password1" required>
              <div id="msjValidacion_Password1" class="invalid-feedback">
                Valor incorrecto! </br>Requiere 8 carácteres entre 1 letra minúscula, 1 letra mayúscula, y 1 símbolo.
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label for="txtPassword2" class="form-label">Verificación</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="txtPassword2Group"><i class="fa-solid fa-unlock-keyhole"></i></span>
              <input type="password" maxlength="8" onkeypress="verficaPassword()" pattern="(?=.*[-!#$%&/()?¡_])(?=.*[A-Z])(?=.*[a-z]).{8,}" class="form-control" id="txtPassword2" aria-describedby="txtPassword2Group msjValidacion_Password2" required>
              <div id="msjValidacion_Password2" class="invalid-feedback">
                Contraseña no coincide.
              </div>
            </div>
          </div>







          <div class="text-end">
            <a href="?c=usuarios" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
            <button type="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk"></i> Actualizar</a>
          </div>
        </form>

      </div>
    </div>

</main>
<?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>
<script>
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy - 3 + '-' + mm + '-' + dd;
  document.getElementById("txtFecha").setAttribute("max", today);

  function verficaPassword() {
    let pwd1 = document.getElementById("txtPassword1").value;
    let pwd2 = document.getElementById("txtPassword2").value;
    let input = document.getElementById("txtPassword2");


    if (pwd1 == "") {
      input.classList.remove("is-valid");
      input.classList.add("is-invalid");
      return;
    }
    if (pwd1 != pwd2) {
      input.classList.remove("is-valid");
      input.classList.add("is-invalid");
      return;
    }
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
  }
</script>
<script>
  (
    function() {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    }


  )()
</script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>