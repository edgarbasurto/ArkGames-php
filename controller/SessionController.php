<?php
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
        if (!isset($_SESSION)) {
            session_start();
        };
        require_once(VIEW_PATH .  "Session/login.php");
    }

    public function dash()
    {
        if (!isset($_SESSION)) {
            session_start();
        };
        require_once(VIEW_PATH .  "Session/dashboard.php");
    }

    public function end()
    {
        //para cerrrar session
    }
}
