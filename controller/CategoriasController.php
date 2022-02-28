<?php
require_once '../../models/dao/CategoriasDAO.php';
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
        return $this->modelo->listar();

        //llamo a la vista
        // require_once '../views/Catalogo/BasurtoEdgar.php';
    }
}
