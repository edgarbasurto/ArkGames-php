<?php

require_once 'config/global.php';
require_once  CONTROLLER_PATH . 'Genericos.php';
class ManagerRoute
{
    public function __construct()
    {
        //establece la session por default 
        getSessionActual();
    }

    public function ruteo()
    {
        // // Todo esta lógica hara el papel de un FrontController
        $controller = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : CONTROLLER_DEFAULT;
        $controller = ucwords(strtolower($controller)) . 'Controller';

        $accion = (!empty($_REQUEST['a'])) ? htmlentities($_REQUEST['a']) : FUNCTION_DEFAULT;

        $ruta = CONTROLLER_PATH . $controller . '.php';

        require_once $ruta;

        $cont = new $controller();
        $cont->$accion();
    }
}
