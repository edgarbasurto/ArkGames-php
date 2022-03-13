<?php
require_once DAO_PATH . 'CategoriasDAO.php';
class CategoriasController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new CategoriasDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        return $resultados;
    }
}
