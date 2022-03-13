<?php
require_once DAO_PATH . 'DispositivoDAO.php';
class DispositivosController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new DispositivoDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        return $resultados;
    }
}
