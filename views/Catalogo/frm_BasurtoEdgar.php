<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Registro de compra" />
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
    <link rel="icon" href="../../assets/img/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Catálogo - ArkGames</title>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>

    <main class="contenedor form">
        <div class="top">
            <h1 class="title">Confirmación de compra</h1>
        </div>
        <form method="post" class="form1" id="frm_compra">
            <h2>Forma de pago</h2>
            <h6>Campos obligatorios *</h6>
            <h3>Información de contacto </h3>
            <div class="r">
                <div>Apellidos: * <input class="contacto-cliente" type="text" id="apellidos"> <br /></div>
                <div>Nombres: * <input class="contacto-cliente" type="text" id="nombres"> <br /></div>
                <div>E.mail: * <input class="contacto-cliente" type="email" id="email"> <br /></div>
                <div>Contraseña: * <input class="contacto-cliente" type="password" id="contrasenia"> <br /></div>

            </div>
            <h3> Método de pago </h3>
            <div class=" from2">
                <input type="radio" name="sex"> Débito
                <input type="radio" name="sex"> Crédito
            </div>
            <div class="c">
                Tipo de tarjeta:
                <select id="tipoTarjeta">
                    <option disabled selected value> -- </option>
                    <option value="Visa">Visa</option>
                    <option value="Mastercard"> Mastercard </option>
                    <option value="American Express"> American Express </option>
                    <option value="Alia"> Alia </option>
                </select><br />
            </div>
            <div class="r">
                <div>Número de tarjeta: * <input type="text" id="numTarjeta"> <br /></div>

                <div class="form-group" id="expiration-date">
                    <label>Fecha de vencimiento:</label>
                    <div style="display: inline;">
                        <select id="mes">
                            <option disabled selected value> -- </option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero </option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div style="display: inline;">
                        <select id="anio">
                            <option disabled selected value> -- </option>
                            <option value="16"> 2021</option>
                            <option value="17"> 2022</option>
                            <option value="18"> 2023</option>
                            <option value="19"> 2024</option>
                            <option value="20"> 2025</option>
                            <option value="21"> 2026</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="c">
                <input class="btnCompra" type="submit" value="Confirmar pago" />
            </div>
        </form>
    </main>


    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->

    <script type="text/javascript" src="../../assets/js/Validacion_frmCompra.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>