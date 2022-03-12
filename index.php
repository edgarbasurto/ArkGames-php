<?php
// define la ruta actual en la cual se ejecuta la aplicacion

define('ROOT_PATH', dirname(__FILE__) . '/');

require_once 'controller/ManagerRoute.php';
$front = new ManagerRoute();
$front->ruteo();
