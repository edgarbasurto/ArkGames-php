<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="ArkGames" />
  <meta name="keywords" content="videojuegos,catalogo,juegos" />
  <meta name="author" content="erlarrea" />
  <link rel="stylesheet" href="../../assets/css/master.css" />
  <link rel="stylesheet" href="../../assets/css/LarreaRafael.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" href="../../assets/img/logo.svg">
  <title>ArkGames</title>
</head>

<body>
  <!-------------------------------------------------MENU---------------------------------------->
  <?php
    include_once '../Templates/navBar.php'
    ?>
        <!------------------------------------------------------------------------------------------>



  <div class="formmain">
    <form id="frmLogIn">
      <div class="contenido">

        <header class="cabecera-form">
          <img src="../../assets/img/logo.svg" alt="ArkGames" />
          <h2>Log In</h2>
          <p>Ingresa usando tu usuario y contraseña</p>
          <p>&nbsp;</p>
        </header>
        <br>
        <div>
          <div class="other">
            <span class="ingreso-item">
              <i class="fa fa-globe"></i>
            </span>
            <select class="form-select" id="regiones" onchange="servidores_ActivarCampos(this);">
              <!--GENERADOS DINAMICANTE-->
            </select>
          </div>

          
          <div class="other" id="divUser">
            <span class="ingreso-item">
              <i class="fa fa-user-circle"></i>
            </span>            
            <input class="form-ingreso"  id="txt-ingreso" type="text" placeholder="Usuario" name="user">
            
          </div>

          <div class="other" id="divEmail" style="visibility: collapse; display:none;">
            <span class="ingreso-item">
              <i class="fa fa-envelope-open"></i>
            </span>
            <input class="form-ingreso" id="email-ingreso"  placeholder="Email" name="email">
          </div>

          <div class="other">
            <span class="ingreso-item">
              <i class="fa fa-key"></i>
            </span>
            <input class="form-ingreso" id="password" type="password" placeholder="Password" name="password">        
          </div>

          <div class="radio-form">
            <label><input type="checkbox" name="ok_cookies" checked> Acepta el uso de cookies.</label>
            <br>
            <label><input type="checkbox" name="ok_sesion"> Recordar sesión?.</label>
          </div>

          <div class="other">
            <button class="log-in" type="submit"> Ingresar </button>
          </div>
        </div>

        <div class="other">
          <button class="btn submits frgt-pass" type="button" onclick="formulario_olvidoContrasenia()">Olvidó la contraseña?</button>
          <button class="btn submits sign-up" type="button" onclick="formulario_redirigir()">Registrarse
            <i class="fa fa-user-plus" aria-hidden="true"></i>
          </button>
        </div>
      </div>

    </form>


  </div>
  <!-------------------------------------------------FOOTER---------------------------------------->
  <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
  <script language="javascript" type="text/javascript" src="../../assets/js/frm_LarreaRafael.js"></script>
</body>
</html>