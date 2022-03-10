<?php
require_once '../../config/conexion.php';
require_once '../../controller/SuscripcionController.php';
// Todo esta lógica hara el papel de un FrontController
$controller = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : 'suscripcion';
$controller = ucwords(strtolower($controller)) . 'Controller';

$accion = (!empty($_REQUEST['a'])) ? htmlentities($_REQUEST['a']) : 'index';

require_once '../../controller/' . $controller . '.php';

$cont = new $controller();
$cont->$accion();