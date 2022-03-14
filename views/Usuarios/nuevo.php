<?php

if (!isset($_SESSION)) {
    session_start();
};

require_once DTO_PATH . 'Enumeradores.php';
require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="erlarrea" />
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
<main>

    <div class="card">
        <div class="card-header row font-weight-bold align-middle">
            <div class="col text-first">
                <h4 class="fw-bold" style="margin-top:.5rem">Nuevo Usuario </h4>
            </div>

        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" action="../../views/Usuarios/index.php?c=usuarios&a=save&id=-1" method="POST" novalidate style="margin: 0px 80px 0px 80px">
                <div class="col-md-5">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="Nombre" maxlength="80" aria-describedby="msjValidacion_Nombre" placeholder="Nombre completo del usuario" required>
                    <div class="valid-feedback">
                        Datos correctos!
                    </div>
                    <div id="msjValidacion_Nombre" class="invalid-feedback">
                        Debe llenar el campo!.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="txtFecha" class="form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="txtFecha" name="FechaNacimiento" aria-describedby="msjValidacion_Fecha" required>
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
                        <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroN" checked value="N">
                        <label class="form-check-label" for="radio_GeneroN">Prefiero no decirlo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroM" value="M">
                        <label class="form-check-label" for="radio_GeneroM">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Genero" id="radio_GeneroF" value="F">
                        <label class="form-check-label" for="radio_GeneroF">Femenino</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="txtUsuario" class="form-label">Usuario</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="txtUsuarioGroup"><i class="fa-solid fa-user"></i></span>
                        <input type="text" maxlength="14" pattern="[A-Za-z0-9_-]{1,14}" name="Usuario" class="form-control" id="txtUsuario" aria-describedby="txtUsuarioGroup msjValidacion_Usuario" placeholder="Nombre del usuario" required>
                        <div class="valid-feedback">
                            Datos correctos!
                        </div>
                        <div id="msjValidacion_Usuario" class="invalid-feedback">
                            Valor incorrecto! </br>Sólo letras y números.
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="txtEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="txtEmailGroup"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" id="txtEmail" name="Email" maxlength="80" aria-describedby="txtEmailGroup msjValidacion_Email" placeholder="Dirección correo electrónico" required>
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
                        <option selected disabled value="">Escoja...</option>
                        <?php
                        foreach (TipoRol::toArray() as $value) {
                            if ($value != 1) {
                                echo '<option value="' . $value . '">' . TipoRol::getName($value) . '</option>';
                            }
                        }  ?>
                    </select>
                    <div id="msjValidacion_Rol" class="invalid-feedback">
                        Escoja un perfil de usuario.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="txtPassword1" class="form-label">Contraseña</label>
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
                <div class="col-12">
                    <div class="form-check">
                        <label class="form-check-label" for="chkTerminos">
                            Acepto los términos y condiciones.
                        </label>
                        <input class="form-check-input" type="checkbox" name="Termninos" value="" id="chkTerminos" aria-describedby="msjchkTerminos" required>

                        <div id="msjchkTerminos" class="invalid-feedback">
                            Debe aceptar antes de enviar.
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