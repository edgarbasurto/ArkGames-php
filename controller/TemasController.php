<?php
require_once '../../models/dao/TemaDAO.php';
class CategoriasController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new TemaDAO();
    }

    // funciones del controlador
    public function index()
    {
        // llamar al modelo
        $resultados = $this->modelo->listar();

        return $resultados;
    }
}
