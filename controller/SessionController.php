<?php

use phpDocumentor\Reflection\Location;

require_once DAO_PATH . 'UsuarioDAO.php';
class SessionController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioDAO();
    }

    // funciones del controlador
    public function index()
    {
        require_once(VIEW_PATH .  "Session/login.php");
    }

    public function dash()
    {
        if (TIENE_PERMISO(PERMISOS::PUEDE_ACCEDER_MANTENIMIENTO)) {
            require_once(VIEW_PATH .  "Session/dashboard.php");
        } else {
            header('Location:index.php?c=session');
        }
    }

    public function end()
    {
        //para cerrrar session
        session_unset();
        header('Location: index.php');
    }
}
