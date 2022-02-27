<?php
require_once '../../models/dao/UsuarioDAO.php';

class UsuarioController
{
    private $modelo;

    public function __construct()
    {
       $this->modelo = new UsuarioDAO();
       if (!isset($_SESSION)) {
        session_start();
    }
    }

    // funciones del controlador
    public function index()
    { 
        return  $this->modelo->listar();  
    }
}
