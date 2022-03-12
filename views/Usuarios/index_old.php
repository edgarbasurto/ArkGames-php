<?php

require_once '../../controller/UsuariosController.php';
// Todo esta lógica hara el papel de un FrontController
$controller = (!empty($_REQUEST['c'])) ? htmlentities($_REQUEST['c']) : 'usuarios';
$controller = ucwords(strtolower($controller)) . 'Controller';

$accion = (!empty($_REQUEST['a'])) ? htmlentities($_REQUEST['a']) : 'index';

require_once '../../controller/' . $controller . '.php';

$cont = new $controller();
$cont->$accion();


/*
require_once '../../controller/UsuariosController.php';
$cont = new UsuarioController();
if (isset($_GET['userm'])) {
    $metodo =   $_GET['userm'];

    switch ($metodo) {
        case "shw":
            $id =   $_GET['id'];
            $cont->show($id);
            break;
        case "upd":
            $id =   $_GET['id'];
            $cont->edit($id);
            break;
        case "del":
            $id =   $_GET['id'];
            $cont->del($id);
            break;
        case "sav":
            $id =   $_GET['id'];
            $post = $_POST;
            $cont->save($id, $post);
            break;
        default:
            $cont->index();
            break;
    }
} else {
    $cont->index();
} 
*/