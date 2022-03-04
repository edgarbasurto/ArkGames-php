<?php
require_once '../../models/dto/Enumeradores.php';
require_once '../../views/Templates/HeadBootstrap.php'
?>
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
                    <h4 class="fw-bold" style="margin-top:.5rem">ID#<?php echo $registro->Id . " - " .  $registro->NombreCompleto ?> </h4>
                </div>

            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" action=" <?php echo "../../views/Usuarios/index.php?c=usuarios&a=save&id=" . $registro->Id ?>" method="POST" novalidate style="margin: 0px 80px 0px 80px">
                    <div class="col-md-5">
                        <label for="txtNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" maxlength="80" name="Nombre" aria-describedby="msjValidacion_Nombre" placeholder="Nombre completo del usuario" value="<?php echo $registro->NombreCompleto ?>" required>
                        <div class="valid-feedback">
                            Datos correctos!
                        </div>
                        <div id="msjValidacion_Nombre" class="invalid-feedback">
                            Debe llenar el campo!.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="txtFecha" class="form-label">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="txtFecha" name="FechaNacimiento" aria-describedby="msjValidacion_Fecha" value="<?php
                                                                                                                                                    $fecha = date("Y-m-d", strtotime($registro->FechaNacimiento));
                                                                                                                                                    echo $fecha;
                                                                                                                                                    ?>" required>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div id="msjValidacion_Fecha" class="invalid-feedback">
                            Fecha incorrecta!.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Género</label></br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroN" <?php if ($registro->Genero == 'N') {
                                                                                                                echo "checked";
                                                                                                            } ?> value="N">
                            <label class="form-check-label" for="radio_GeneroN">Prefiero no decirlo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroM" <?php if ($registro->Genero == 'M') {
                                                                                                                echo "checked";
                                                                                                            } ?> value="M">
                            <label class="form-check-label" for="radio_GeneroM">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroF" <?php if ($registro->Genero == 'F') {
                                                                                                                echo "checked";
                                                                                                            } ?> value="F">
                            <label class="form-check-label" for="radio_GeneroF">Femenino</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="txtEmail" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="txtEmailGroup"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" id="txtEmail" maxlength="80" name="Email" value="<?php echo $registro->Email ?>" aria-describedby="txtEmailGroup msjValidacion_Email" placeholder="Dirección correo electrónico" required>
                            <div class="valid-feedback">
                                Datos correctos!
                            </div>
                            <div id="msjValidacion_Email" class="invalid-feedback">
                                Valor incorrecto! </br> Recuerde el formato <strong> usuario@dominio.com </strong>.
                            </div>
                        </div>
                    </div>



                    <div class="col-md-3">
                        <label for="txtRol" class="form-label">Perfil</label>
                        <select class="form-select" id="txtRol" name="IdRol" required>
                            <?php
                            $Rol = $registro->IdRol;
                            if ($Rol == 1) {
                                echo '<option selected disabled value="">Escoja...</option>';
                            }
                            foreach (TipoRol::toArray() as $value) {
                                if ($value != 1) {
                                    if ($value == $Rol) {
                                        echo '<option selected value="' . $value . '">' . TipoRol::getName($value) . '</option>';
                                    } else {
                                        echo '<option value="' . $value . '">' . TipoRol::getName($value) . '</option>';
                                    }
                                }
                            }  ?>
                        </select>
                        <div id="msjValidacion_Rol" class="invalid-feedback">
                            Escoja un perfil de usuario.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="txtservidor" class="form-label">Servidor</label>
                        <select class="form-select" id="txtservidor" name="Servidor" required>
                            <?php
                            $Servidor = $registro->IdServidor;
                            foreach (Servidores::toArray() as $value) {
                                if ($value != 1) {
                                    if ($value == $Servidor) {
                                        echo '<option selected value="' . $value . '">' . Servidores::getName($value) . '</option>';
                                    } else {
                                        echo '<option value="' . $value . '">' . Servidores::getName($value) . '</option>';
                                    }
                                }
                            }  ?>
                        </select>
                        <div id="msjValidacion_Rol" class="invalid-feedback">
                            Escoja un perfil de usuario.
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="../../views/Usuarios/" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                        <button type="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk"></i> Actualizar</a>
                    </div>
                </form>

            </div>
        </div>

    </main>

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
    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>
</body>

</html>