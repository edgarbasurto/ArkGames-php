<?php require_once '../../views/Templates/HeadBootstrap.php' ?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<title>Demostración Métodos CRUD - USUARIO</title>
</head>

<body id="bodyTemp">
    <?php require_once '../../views/Templates/navBarBootstrap.php' ?>
    <header>
    </header>
    <main class="main p-5 mx-3">

        <div class="card">
            <div class="card-header row font-weight-bold align-middle">
                <div class="col text-first">
                    <h4 class="fw-bold" style="margin-top:.5rem">Nuevo Usuario </h4>
                </div>

            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" action="../../controller/UsuariosController.php" method="post" novalidate style="margin: 0px 80px 0px 80px">
                    <div class="col-md-4">
                        <label for="txtNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" aria-describedby="msjValidacion_Nombre" placeholder="Nombre completo del usuario" required>
                        <div class="valid-feedback">
                            Datos correctos!
                        </div>
                        <div id="msjValidacion_Nombre" class="invalid-feedback">
                            Debe llenar el campo!.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="txtUsuario" class="form-label">Usuario</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="txtUsuarioGroup">@</span>
                            <input type="text" maxlength="14" title=" dddds" pattern="[A-Za-z]{4-14}" class="form-control" id="txtUsuario" aria-describedby="txtUsuarioGroup msjValidacion_Usuario" placeholder="Nombre del usuario" required>
                            <div class="valid-feedback">
                                Datos correctos!
                            </div>
                            <div id="msjValidacion_Usuario" class="invalid-feedback">
                                Valor incorrecto, recuerde que no puede contener espacios!.
                            </div>
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
                    <div class="text-end">
                        <a href="../../views/Usuarios/" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Crear</a>
                    </div>
                </form>

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
    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>
</body>

</html>