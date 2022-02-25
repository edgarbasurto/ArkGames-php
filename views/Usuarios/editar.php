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
      <main class="contenedor" style="margin: 150px 50px 10px 50px">

          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $registro->NombreCompleto ?></h6>
              </div>
              <div class="card-body">

                  <form class="row g-3">
                      <div class="col-md-4">
                          <label for="validationServer01" class="form-label">First name</label>
                          <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="col-md-4">
                          <label for="validationServer02" class="form-label">Last name</label>
                          <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
                          <div class="valid-feedback">
                              Looks good!
                          </div>
                      </div>
                      <div class="col-md-4">
                          <label for="validationServerUsername" class="form-label">Username</label>
                          <div class="input-group has-validation">
                              <span class="input-group-text" id="inputGroupPrepend3">@</span>
                              <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                  Please choose a username.
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label for="validationServer03" class="form-label">City</label>
                          <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                          <div id="validationServer03Feedback" class="invalid-feedback">
                              Please provide a valid city.
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label for="validationServer04" class="form-label">State</label>
                          <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                              <option selected disabled value="">Choose...</option>
                              <option>...</option>
                          </select>
                          <div id="validationServer04Feedback" class="invalid-feedback">
                              Please select a valid state.
                          </div>
                      </div>
                      <div class="col-md-3">
                          <label for="validationServer05" class="form-label">Zip</label>
                          <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                          <div id="validationServer05Feedback" class="invalid-feedback">
                              Please provide a valid zip.
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-check">
                              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                              <label class="form-check-label" for="invalidCheck3">
                                  Agree to terms and conditions
                              </label>
                              <div id="invalidCheck3Feedback" class="invalid-feedback">
                                  You must agree before submitting.
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit form</button>
                      </div>
                  </form>
              </div>
          </div>

      </main>
      <!-------------------------------------------------Footer---------------------------------------->
      <?php
        include_once '../Templates/footer.php'
        ?>
      <!------------------------------------------------------------------------------------------>
  </body>

  </html>